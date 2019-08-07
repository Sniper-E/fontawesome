<?php
/**
* @package phpBB Extension - Font Awesome BBCode
* @copyright (c) 2019 Sniper_E - http://sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace sniper\fontawesome\migrations;

class font_awesome_schema extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['font_awesome_version']) && version_compare($this->config['font_awesome_version'], '1.0.0', '>=');
	}
	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'install_font_awesome_bbcodes'))),
			 // Add config
			 array('config.add', array('use_font_awesome_bbcode', '0')),
			// Permission
			array('permission.add', array('u_use_font_awesome_bbcode', true)),
			// Set Permission
			array('permission.permission_set', array('ADMINISTRATORS', 'u_use_font_awesome_bbcode', 'group', true)),
		);
	}
	public function revert_data()
	{
		return array(
			array('custom', array(array(&$this, 'font_awesome_bbcodes_behind'))),
		);
	}
	/**
	 * notebbcodes left behind, hides the bbcode buttons on posting
	 *
	 * @param array $bbcode_tags Array of noteBBCodes tags to hide
	 * @return null
	 * @access public
	 */
	public function font_awesome_bbcodes_behind($bbcode_tags)
	{
	/**
	 * @var array An array of notebbcodes (tags) to be left behind
	 */
	$bbcode_tags = array('fa');
	// set to null the display on posting
	$sql = 'UPDATE ' . BBCODES_TABLE . '
		SET display_on_posting = 0
		WHERE ' . $this->db->sql_in_set('bbcode_tag', $bbcode_tags);
		$this->db->sql_query($sql);
	}
	/**
	 * Installs BBCodes, used by migrations to perform add/updates
	 *
	 * @param array $bbcode_data Array of BBCode data to install
	 * @return null
	 * @access public
	 */
	public function install_font_awesome_bbcodes($bbcode_data)
	{
		// Load the acp_bbcode class
		if (!class_exists('acp_bbcodes'))
		{
			include($this->phpbb_root_path . 'includes/acp/acp_bbcodes.' . $this->php_ext);
		}
		$bbcode_tool = new \acp_bbcodes();
		/**
		 * @var array An array of bbcodes data to install
		 */
		$bbcode_data = array(
			'fa' => array(
				'bbcode_match'       => '[fa={IDENTIFIER1;optional}]{IDENTIFIER2;optional}[/fa]',
				'bbcode_tpl'         => '<xsl:choose>
	<xsl:when test="@fa">
		<i class="icon fa-{IDENTIFIER2} fa-fw awesome_icon" title="fa-{IDENTIFIER2}" style="font-size: {IDENTIFIER1}px;color: {IDENTIFIER1}" aria-hidden="true"></i><span class="sr-only">fa-{IDENTIFIER2}</span>
	</xsl:when>
	<xsl:otherwise>
		<i class="icon fa-{IDENTIFIER2} fa-fw awesome_icon" title="fa-{IDENTIFIER2}" aria-hidden="true"></i><span class="sr-only">fa-{IDENTIFIER2}</span>
	</xsl:otherwise>
</xsl:choose>',
				'bbcode_helpline'    => 'Font Awesome: [fa]glass[/fa] or size it [fa=45]coffee[/fa] or color it [fa=red]heart[/fa]',
				'display_on_posting' => 0,
			),
		);
		foreach ($bbcode_data as $bbcode_name => $bbcode_array)
		{
			// Build the BBCodes
			$data = $bbcode_tool->build_regexp($bbcode_array['bbcode_match'], $bbcode_array['bbcode_tpl'], $bbcode_array['bbcode_helpline']);
			$bbcode_array += array(
				'bbcode_tag'          => $data['bbcode_tag'],
				'first_pass_match'    => $data['first_pass_match'],
				'first_pass_replace'  => $data['first_pass_replace'],
				'second_pass_match'   => $data['second_pass_match'],
				'second_pass_replace' => $data['second_pass_replace']
			);
			$sql = 'SELECT bbcode_id
				FROM ' . BBCODES_TABLE . "
				WHERE LOWER(bbcode_tag) = '" . strtolower($bbcode_name) . "'
				OR LOWER(bbcode_tag) = '" . strtolower($bbcode_array['bbcode_tag']) . "'";
			$result = $this->db->sql_query($sql);
			$row_exists = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);
			if ($row_exists)
			{
				// Update existing BBCode
				$bbcode_id = $row_exists['bbcode_id'];
				$sql = 'UPDATE ' . BBCODES_TABLE . '
					SET ' . $this->db->sql_build_array('UPDATE', $bbcode_array) . '
					WHERE bbcode_id = ' . $bbcode_id;
				$this->db->sql_query($sql);
			}
			else
			{
				// Create new BBCode
				$sql = 'SELECT MAX(bbcode_id) AS max_bbcode_id
					FROM ' . BBCODES_TABLE;
				$result = $this->db->sql_query($sql);
				$max_bbcode_id = $this->db->sql_fetchfield('max_bbcode_id');
				$this->db->sql_freeresult($result);
				if ($max_bbcode_id)
				{
					$bbcode_id = $max_bbcode_id + 1;
					// Make sure it is greater than the core BBCode ids...
					if ($bbcode_id <= NUM_CORE_BBCODES)
					{
						$bbcode_id = NUM_CORE_BBCODES + 1;
					}
				}
				else
				{
					$bbcode_id = NUM_CORE_BBCODES + 1;
				}
				if ($bbcode_id <= BBCODE_LIMIT)
				{
					$bbcode_array['bbcode_id'] = (int) $bbcode_id;
					$bbcode_array['display_on_posting'] = ((int) $bbcode_array['display_on_posting']);
					$this->db->sql_query('INSERT INTO ' . BBCODES_TABLE . ' ' . $this->db->sql_build_array('INSERT', $bbcode_array));
				}
			}
		}
	}
}
