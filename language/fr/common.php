<?php
/**
* @package phpBB Extension - Font Awesome BBCode
* @copyright (c) 2019 Sniper_E - https://www.sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @translation fr by ssl - https://caforum.fr/forum/
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
	'FONT_AWESOME_TITLE'   => 'Icônes Font Awesome',
	'FONTAWESOME_TITLE'    => '<img src="https://img.shields.io/badge/Font Awesome BBCode-Version 1.0.6-green.svg?style=plastic" style="margin-left: 20px" />',
	'FONTAWESOME_NOACCESS' => 'Vous n‘avez pas accès à cette section',
	'FONTAWESOME_DISABLE'  => 'BBCode Font awesome désactivé',
	'FONTAWESOME_COUNT'    => 'Une icône',
	'FONTAWESOME_COUNTS'   => '<b>%d Icônes Impressionnantes</b>',
	'FONT_AWESOME_HINT'    => 'La fenêtre se fermera à la sélection. <img src="https://img.shields.io/badge/Font Awesome 4.7.0-718 Icônes Impressionnantes-red.svg?style=plastic" />',
	'FONT_AWESOME_FA'      => 'Fa',
	'FONT_AWESOME_HELP'    => 'Fa: [fa size=sm,md,lg,xl color=red rotate=90,180,270 flip=vertical,horizontal]icon[/fa] Color choices: blue, green, red, orange, bluegray, gray, lightgray, black',
	'FONT_AWESOME_ICONS'   => 'Icônes par page',
	'FONT_AWESOME_POPUP'   => 'Taille de la fenêtre contextuelle',
	'FONTAWESOME_PX'       => 'px',
));
