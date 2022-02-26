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
	// language pack author
	'STATS_PERMISSIONS_LANG_DESC'					=> 'English',
	'STATS_PERMISSIONS_LANG_EXT_VER' 				=> '1.0.0-rc1',
	'STATS_PERMISSIONS_LANG_AUTHOR' 				=> 'LukeWCS',

	// config head
	'STATS_PERMISSIONS_CONFIG_TITLE'				=> 'Stats Permissions',
	'STATS_PERMISSIONS_CONFIG_DESC' 				=> 'The settings for the extension “%1$s” (v%2$s) can be changed here.',

	// config section 1
	'STATS_PERMISSIONS_SECTION_PERMISSIONS'			=> 'Permissions',
	'STATS_PERMISSIONS_ADMIN_MODE'					=> 'Administrator mode',
	'STATS_PERMISSIONS_ADMIN_MODE_EXP'				=> 'This mode overrides all permissions systems and only users with administrative rights can see the statistics. Helpful if the statistics should not be visible to others at short notice.',
	'STATS_PERMISSIONS_USE_PERMISSIONS'				=> 'Use the permission system of phpBB',
	'STATS_PERMISSIONS_USE_PERMISSIONS_EXP'			=> 'Enables you to specify for each user group separately, to what extent the display should be made. The rights can be set as follows: "PERMISSIONS" » Group permissions » [user group] » User permissions » Advanced Permissions » Misc".',
	'STATS_PERMISSIONS_DISP_FOR_GUESTS'				=> 'Display for guests',
	'STATS_PERMISSIONS_DISP_FOR_GUESTS_EXP'			=> 'Determines what guests can see. “Statistics” shows only the anonymous numbers and “Nothing” completely turns off the display for guests.',
	'STATS_PERMISSIONS_DISP_FOR_BOTS'				=> 'Display for bots',
	'STATS_PERMISSIONS_DISP_FOR_BOTS_EXP'			=> 'Determines what bots can see. “Statistics” shows only the anonymous numbers and “Nothing” completely turns off the display for bots.',
	'STATS_PERMISSIONS_PERM_STATS_NEWEST'			=> 'Statistics and newest member',
	'STATS_PERMISSIONS_PERM_NEWEST'					=> 'Newest member',
	'STATS_PERMISSIONS_PERM_STATS'					=> 'Statistics',
	'STATS_PERMISSIONS_PERM_NOTHING'				=> 'Nothing',

	// config section 2
	'STATS_PERMISSIONS_SECTION_RESET'				=> 'Reset',
	'STATS_PERMISSIONS_DEFAULTS'					=> 'Reset settings',
	'STATS_PERMISSIONS_DEFAULTS_EXP'				=> 'Resets all settings of this page to the installation standard.',
	'STATS_PERMISSIONS_BUTTON_DEFAULTS'				=> 'Defaults',

	// messages
	'STATS_PERMISSIONS_MSG_SAVED_SETTINGS'			=> 'Stats Permissions: Configuration updated successfully.',
	'STATS_PERMISSIONS_MSG_LANGUAGEPACK_OUTDATED'	=> 'Note: The language pack for this extension is no longer up-to-date.',
]);
