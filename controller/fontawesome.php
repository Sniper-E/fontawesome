<?php
/**
* @package phpBB Extension - Font Awesome BBCode
* @copyright (c) 2019 Sniper_E - http://sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace sniper\fontawesome\controller;

class fontawesome
{
	/** @var \phpbb\template\template */
	protected $template;

	/** @var \phpbb\user */
	protected $user;

	/** @var \phpbb\auth\auth */
	protected $auth;

	/** @var \phpbb\db\driver\driver_interface */
	protected $db;

	/** @var \phpbb\request\request */
	protected $request;

	/** @var \phpbb\pagination */
	protected $pagination;

	/** @var \phpbb\controller\helper */
	protected $helper;

	/** @var \phpbb\config\config */
	protected $config;

	/**
	* The database tables
	*
	* @var string
	*/
	protected $fontawesome_table;

	/**
	* Constructor
	*
	* @param \phpbb\template\template             $template
	* @param \phpbb\user                          $user
	* @param \phpbb\auth\auth                     $auth
	* @param \phpbb\db\driver\driver_interface    $db
	* @param \phpbb\request\request               $request
	* @param \phpbb\pagination                    $pagination
	* @param \phpbb\controller\helper             $helper
	* @param \phpbb\config\config                 $config
	* @param string                               $fontawesome_table
	*
	*/
	public function __construct(
		\phpbb\template\template $template,
		\phpbb\user $user,
		\phpbb\auth\auth $auth,
		\phpbb\db\driver\driver_interface $db,
		\phpbb\request\request $request,
		\phpbb\pagination $pagination,
		\phpbb\controller\helper $helper,
		\phpbb\config\config $config,
		$fontawesome_table
	)
	{
		$this->template             = $template;
		$this->user                 = $user;
		$this->auth                 = $auth;
		$this->db                   = $db;
		$this->request              = $request;
		$this->pagination           = $pagination;
		$this->helper               = $helper;
		$this->config               = $config;
		$this->fontawesome_table    = $fontawesome_table;
	}

	public function handle_fontawesome()
	{
		// Add lang file
		$this->user->add_lang_ext('sniper/fontawesome', 'common');

		if (!$this->config['fontawesome_allow'])
		{
			throw new \phpbb\exception\http_exception(400, 'FONTAWESOME_DISABLE');
		}

		if (!$this->auth->acl_get('u_use_font_awesome_bbcode'))
		{
			throw new \phpbb\exception\http_exception(403, 'FONTAWESOME_NOACCESS');
		}
		else
		{
			$fileid = $this->request->variable('file', 0);
			$start = $this->request->variable('start', 0);

			// Pagination number from ACP
			$dll = $this->config['fontawesome_value'];

			// Generate pagination
			$sql = 'SELECT COUNT(icon_id) AS total_fontawesomes
				FROM ' . $this->fontawesome_table;
			$result = $this->db->sql_query($sql);
			$total_fontawesomes = $this->db->sql_fetchfield('total_fontawesomes');
			$this->db->sql_freeresult($result);

			$sql = 'SELECT icon_name
				FROM ' . $this->fontawesome_table . '
				ORDER BY icon_name';
			$top_result = $this->db->sql_query_limit($sql, $dll, $start);

			while ($row = $this->db->sql_fetchrow($top_result))
			{
				$this->template->assign_block_vars('fontawesome', array(
					'ICON_NAME' => $row['icon_name'],
				));
			}
			$this->db->sql_freeresult($top_result);
		}

		$pagination_url = $this->helper->route('sniper_fontawesome_controller');

		//Start pagination
		$this->pagination->generate_template_pagination($pagination_url, 'pagination', 'start', $total_fontawesomes, $dll, $start);
		$this->template->assign_vars(array(
			'FONTAWESOME_ICONS'		=> ($total_fontawesomes == 1) ? $this->user->lang['FONTAWESOME_COUNT'] : $this->user->lang('FONTAWESOME_COUNTS', $total_fontawesomes),
			'FONTAWESOME_VERSION'	=> $this->config['fontawesome_version'],
		));

		return $this->helper->render('fontawesome.html', $this->user->lang('FONT_AWESOME_TITLE'));
	}
}
