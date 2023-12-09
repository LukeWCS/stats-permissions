<?php
/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
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
// ’ « » “ ” … „ “
//
$lang = array_merge($lang, [
	// config head
	'STATS_PERMISSIONS_CONFIG_TITLE'				=> 'Statistik-Berechtigungen',
	'STATS_PERMISSIONS_CONFIG_DESC' 				=> 'Hier kannst du die Einstellungen für die Erweiterung <strong>%s</strong> ändern.',

	// config section 1
	'STATS_PERMISSIONS_SECTION_PERMISSIONS'			=> 'Berechtigungen',
	'STATS_PERMISSIONS_ADMIN_MODE'					=> 'Administrator-Modus',
	'STATS_PERMISSIONS_ADMIN_MODE_EXP'				=> 'Dieser Modus setzt alle Berechtigungssysteme außer Kraft und nur Benutzer mit administrativen Rechten können die Statistik sehen. Hilfreich wenn die Statistik kurzfristig für andere nicht sichtbar sein soll.',
	'STATS_PERMISSIONS_USE_PERMISSIONS'				=> 'Benutze das Berechtigungssystem von phpBB',
	'STATS_PERMISSIONS_USE_PERMISSIONS_EXP'			=> 'Ermöglicht es, für jede Benutzergruppe getrennt festlegen zu können, welchen Umfang die Statistik haben soll. Die Rechte können wie folgt angepasst werden: „BERECHTIGUNGEN » Gruppenrechte » [Benutzergruppe] » Benutzer-Berechtigungen » Erweiterte Berechtigungen » Diverses“.',
	'STATS_PERMISSIONS_DISP_FOR_GUESTS'				=> 'Anzeige für Gäste',
	'STATS_PERMISSIONS_DISP_FOR_GUESTS_EXP'			=> 'Legt fest, was Gäste sehen können. „Statistik“ zeigt nur die anonymen Zahlen und „Nichts“ schaltet die Anzeige für Gäste komplett aus.',
	'STATS_PERMISSIONS_DISP_FOR_BOTS'				=> 'Anzeige für Bots',
	'STATS_PERMISSIONS_DISP_FOR_BOTS_EXP'			=> 'Legt fest, was Bots sehen können. „Statistik“ zeigt nur die anonymen Zahlen und „Nichts“ schaltet die Anzeige für Bots komplett aus.',
	'STATS_PERMISSIONS_PERM_STATS_NEWEST'			=> 'Statistik und neuestes Mitglied',
	'STATS_PERMISSIONS_PERM_NEWEST'					=> 'Neuestes Mitglied',
	'STATS_PERMISSIONS_PERM_STATS'					=> 'Statistik',
	'STATS_PERMISSIONS_PERM_NOTHING'				=> 'Nichts',

	// config section 2
	'STATS_PERMISSIONS_SECTION_RESET'				=> 'Zurücksetzen',
	'STATS_PERMISSIONS_DEFAULTS'					=> 'Einstellungen zurücksetzen',
	'STATS_PERMISSIONS_DEFAULTS_EXP'				=> 'Setzt alle Einstellungen dieser Seite auf den Installationsstandard zurück.',
	'STATS_PERMISSIONS_BUTTON_DEFAULTS'				=> 'Standard',

	// messages
	'STATS_PERMISSIONS_MSG_SAVED_SETTINGS'			=> 'Statistik-Berechtigungen: Einstellungen erfolgreich gespeichert.',
]);
