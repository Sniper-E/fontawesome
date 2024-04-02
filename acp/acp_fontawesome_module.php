<?php
/**
* @package phpBB Extension - Font Awesome BBCode
* @copyright (c) 2019 Sniper_E - http://sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace sniper\fontawesome\acp;

class acp_fontawesome_module
{
	public $u_action;

	function main($id, $mode)
	{
		global $phpbb_container, $user;

		// Add the ACP lang file
		$user->add_lang_ext('sniper/fontawesome', 'acp_fontawesome');

		// Get an instance of the admin controller
		$admin_controller = $phpbb_container->get('sniper.fontawesome.admin.controller');

		// Make the $u_action url available in the admin controller
		$admin_controller->set_page_url($this->u_action);

		switch ($mode)
		{
			case 'settings':
				// Load a template from adm/style for our ACP page
				$this->tpl_name = 'acp_fontawesome';
				// Set the page title for our ACP page
				$this->page_title = $user->lang('ACP_FONTAWESOME_SETTINGS');
				// Load the display options in the admin controller
				$admin_controller->display_options();
			break;
		}
	}
}
