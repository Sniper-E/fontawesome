<?php
/**
* @package phpBB Extension - Font Awesome BBCode
* @copyright (c) 2019 Sniper_E - http://sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

namespace sniper\fontawesome\acp;

class acp_fontawesome_info
{
	function module()
	{
		return [
			'filename'	=> '\sniper\fontawesome\acp\acp_fontawesome_module',
			'title'		=> 'ACP_FONTAWESOME_TITLE',
			'modes'		=> [
			'settings'	=> ['title' => 'ACP_FONTAWESOME_SETTINGS', 'auth' => 'ext_sniper/fontawesome && acl_a_board', 'cat' => ['ACP_FONTAWESOME_TITLE']],
			],
		];
	}
}
