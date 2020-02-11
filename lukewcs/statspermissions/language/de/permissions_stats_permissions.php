<?php
/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Lang_iso   : de
* Lang_ver   : 1.0.0
* Lang_author: LukeWCS
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
	$lang = array();
}

$t1 = $t2 = '';
if (!$GLOBALS['config']['stats_permissions_use_permissions'] || $GLOBALS['config']['stats_permissions_admin_mode'])
{
	$t1 = '<span style="opacity: 0.5;">';
	$t2 = '</span>';
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
// ’ « » “ ” …
//
$lang = array_merge($lang, array(
	'ACL_U_STATS_PERMISSIONS_SHOW_STATS'	=> $t1 . 'Kann Statistik sehen' . $t2,
	'ACL_U_STATS_PERMISSIONS_SHOW_NEWEST'	=> $t1 . 'Kann neuestes Mitglied sehen' . $t2,
));
