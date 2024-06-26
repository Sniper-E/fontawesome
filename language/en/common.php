<?php
/**
* @package phpBB Extension - Font Awesome BBCode
* @copyright (c) 2019 Sniper_E - http://sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'FONT_AWESOME_CEDIT'   => 'Font Awesome bbCode',
	'FONT_AWESOME_TITLE'   => 'Font Awesome Icons',
	'FONTAWESOME_NOACCESS' => 'You don’t have access to this section',
	'FONTAWESOME_DISABLE'  => 'Font Awesome BBCode disabled',
	'FONTAWESOME_COUNT'    => 'One icon',
	'FONTAWESOME_COUNTS'   => '<b>%d Awesome Icons</b>',
	'FONT_AWESOME_HINT'    => 'Window will close on selection.',
	'FONT_AWESOME_FA'      => 'Fa',
	'FONT_AWESOME_HELP'    => 'Fa: [fa size=2x,3x,4x,5x color=blue,green,red,orange,bluegray,gray,lightgray,black,white,rainbow float=left,right rotate=90,180,270 flip=vertical,horizontal icon=wobble,fade,rotate,spin,blink,bounce,shake]icon_name[/fa]',
	'FONT_AWESOME_ICONS'   => 'Icons per page',
	'FONT_AWESOME_POPUP'   => 'Popup size',
	'FONTAWESOME_PX'       => 'px',
));
