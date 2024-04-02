<?php
/**
* @package phpBB Extension - Font Awesome BBCode
* @copyright (c) 2019 Sniper_E - https://www.sniper-e.com
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
* @translation fr by ssl - https://caforum.fr/forum/
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
	'FONTAWESOME_HELP'           => '<div class="fahelp">Fa: [fa size=sm,md,lg,xl color=red rotate=90,180,270 flip=vertical,horizontal] [/fa]<br />Color choices: blue, green, red, orange, bluegray, gray, lightgray, black</div>',
	'FONTAWESOME_ALLOW'          => 'Activer le BBCode Font Awesome',
	'FONTAWESOME_ALLOW_EXPLAIN'  => 'Activer/Désactiver Font Awesome BBCode',
	'FONTAWESOME_DENY'           => 'Désactiver le BBCode Font Awesome',
	'FONTAWESOME_ACTIVATE'       => 'Activer',
	'FONTAWESOME_DEACTIVATE'     => 'Désactiver',
	'FONTAWESOME_POPUP'          => 'Fenêtre contextuelle',
	'FONTAWESOME_VERSION'        => 'Font Awesome 4.7.0',
	'FONTAWESOME_ICONS'          => '718 Icônes Impressionnantes',
	'FONTAWESOME_VALUE'          => 'Valeur de pagination',
	'FONTAWESOME_VALUE_EXPLAIN'  => 'Définir le nombre d‘icônes sur chaque page. (718, 359, 240, 180, 144, 120, 103, 90)',
	'FONTAWESOME_COLOR'          => 'Couleur de l‘icône Font Awesome',
	'FONTAWESOME_COLOR_EXPLAIN'  => 'Définir la couleur des icônes publiées dans les forums. ex, i.awesome_icon { VALEUR }',
	'FONTAWESOME_WIDTH'          => 'Largeur de la fenêtre contextuelle',
	'FONTAWESOME_WIDTH_EXPLAIN'  => 'Définir la largeur de la fenêtre contextuelle de choix de l‘icône. (de 350 à 1920)px',
	'FONTAWESOME_HEIGHT'         => 'Hauteur de la fenêtre contextuelle',
	'FONTAWESOME_HEIGHT_EXPLAIN' => 'Définir la hauteur de la fenêtre contextuelle de choix de l‘icône. (de 250 à 1080)px',
	'FONTAWESOME_PER'            => 'icônes par page',
	'FONTAWESOME_PX_WIDTH'       => 'largeur px',
	'FONTAWESOME_PX_HEIGHT'      => 'hauteur px',
	'FONTAWESOME_TEXT'           => 'Afficher les noms des icônes',
	'FONTAWESOME_TEXT_EXPLAIN'   => 'Afficher les noms des icônes dans la fenêtre contextuelle',
	'FONTAWESOME_DENY'           => 'Désactiver le BBCode Font Awesome',
	'FONTAWESOME_SAVED'          => 'Paramètres du BBCode Font Awesome enregistrés.',
	'SUBMIT_CHANGES'             => 'Soumettre des changements',
]);
