<?php
/**
* @package phpBB Extension - Font Awesome BBCode
* @copyright (c) 2019 Sniper_E - http://sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
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

$lang = array_merge($lang, [
	'FONTAWESOME_TITLE'          => 'FA',
	'FONTAWESOME_HELP'           => '<div class="fahelp">Fa: [fa <span class="fahelp-var">size=</span>2x,3x,4x,5x <span class="fahelp-var">color=</span>blue,green,red,orange,bluegray,gray,lightgray,black,white,rainbow <span class="fahelp-var">float=</span>left,right<br /><span class="fahelp-var">rotate=</span>90,180,270 <span class="fahelp-var">flip=</span>vertical,horizontal <span class="fahelp-var">icon=</span>wobble,fade,rotate,spin,blink,bounce,shake]icon_name[/fa]</div>',
	'FONTAWESOME_ALLOW'          => 'Activate Font Awesome BBCode',
	'FONTAWESOME_ALLOW_EXPLAIN'  => 'Activate/Deactivate Font Awesome BBCode',
	'FONTAWESOME_DENY'           => 'Deactivate Font Awesome BBCode',
	'FONTAWESOME_ACTIVATE'       => 'Activate',
	'FONTAWESOME_DEACTIVATE'     => 'Deactivate',
	'FONTAWESOME_POPUP'          => 'Popup window',
	'FONTAWESOME_VERSION'        => 'Font Awesome 4.7.0',
	'FONTAWESOME_ICONS'          => '718 Awesome Icons',
	'FONTAWESOME_VALUE'          => 'Pagination value',
	'FONTAWESOME_VALUE_EXPLAIN'  => 'Set number of icons per page (718, 359, 240, 180, 144, 120, 103, 90)',
	'FONTAWESOME_COLOR'          => 'Font Awesome icon size',
	'FONTAWESOME_COLOR_EXPLAIN'  => 'Set the default icon size posted in the forums',
	'FONTAWESOME_WIDTH'          => 'Popup window width',
	'FONTAWESOME_WIDTH_EXPLAIN'  => 'Set width of icon popup window (350 to 1920)px',
	'FONTAWESOME_HEIGHT'         => 'Popup window height',
	'FONTAWESOME_HEIGHT_EXPLAIN' => 'Set height of icon popup window (250 to 1080)px',
	'FONTAWESOME_PER'            => 'icons per page',
	'FONTAWESOME_PX_WIDTH'       => 'px width',
	'FONTAWESOME_PX_HEIGHT'      => 'px height',
	'FONTAWESOME_TEXT'           => 'Show icon names',
	'FONTAWESOME_TEXT_EXPLAIN'   => 'Show icon names with icons in popup selections',
	'FONTAWESOME_SAVED'          => 'Font Awesome BBCode settings saved.',
	'SUBMIT_CHANGES'             => 'Submit changes',
]);
