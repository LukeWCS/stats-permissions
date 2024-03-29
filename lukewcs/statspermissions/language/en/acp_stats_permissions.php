<?php
/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Note: This extension is 100% genuine handcraft and consists of selected
*       natural raw materials. There was no AI involved in making it.
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

$lang = array_merge($lang, [
	// config head
	'STATS_PERMISSIONS_CONFIG_TITLE'				=> 'Stats Permissions',
	'STATS_PERMISSIONS_CONFIG_DESC' 				=> 'Here you can change the settings for the <strong>%s</strong> extension.',

	// config section 1
	'STATS_PERMISSIONS_SECTION_PERMISSIONS'			=> 'Permissions',
	'STATS_PERMISSIONS_ADMIN_MODE'					=> 'Administrator mode',
	'STATS_PERMISSIONS_ADMIN_MODE_EXP'				=> 'This mode overrides all permissions systems and only users with administrative rights can see the statistics. Helpful if the statistics should not be visible to others at short notice.',
	'STATS_PERMISSIONS_USE_PERMISSIONS'				=> 'Use the permission system of phpBB',
	'STATS_PERMISSIONS_USE_PERMISSIONS_EXP'			=> 'Enables you to specify for each user group separately, to what extent the display should be made. The rights can be set as follows: "PERMISSIONS" » Group permissions » [user group] » User permissions » Advanced Permissions » Misc".',
	'STATS_PERMISSIONS_SECTION_SIMPLE_PERMISSIONS'	=> 'Simplified permission system',
	'STATS_PERMISSIONS_SIMPLE_PERMISSIONS_EXP'		=> 'This can be used to specify what guests and bots are allowed to see from the statistics. All other groups always see the statistics in full. If more granular permissions are required, the phpBB permission system must be activated.',
	'STATS_PERMISSIONS_PERM_FOR_GUESTS'				=> 'Display for guests',
	'STATS_PERMISSIONS_PERM_FOR_GUESTS_EXP'			=> 'Determines what guests can see. If all switches are disabled, the statistics display for guests will be completely turned off.',
	'STATS_PERMISSIONS_PERM_FOR_BOTS'				=> 'Display for bots',
	'STATS_PERMISSIONS_PERM_FOR_BOTS_EXP'			=> 'Determines what bots can see. If all switches are disabled, the statistics display for bots will be completely turned off.',
	'STATS_PERMISSIONS_PERM_NEWEST'					=> 'Newest member',
	'STATS_PERMISSIONS_PERM_STATS'					=> 'Statistics',

	// config section 2
	'STATS_PERMISSIONS_SECTION_RESET'				=> 'Reset',
	'STATS_PERMISSIONS_DEFAULTS'					=> 'Reset settings',
	'STATS_PERMISSIONS_DEFAULTS_EXP'				=> 'Resets all settings of this page to the installation standard.',
	'STATS_PERMISSIONS_BUTTON_DEFAULTS'				=> 'Defaults',

	// messages
	'STATS_PERMISSIONS_MSG_SAVED_SETTINGS'			=> 'Stats Permissions: Configuration updated successfully.',
]);
