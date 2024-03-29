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

namespace lukewcs\statspermissions\acp;

class acp_stats_permissions_info
{
	function module()
	{
		return [
			'filename'	=> '\lukewcs\statspermissions\acp\acp_stats_permissions_module',
			'title'		=> 'STATS_PERMISSIONS_NAV_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'STATS_PERMISSIONS_NAV_CONFIG',
					'auth'	=> 'ext_lukewcs/statspermissions && acl_a_board',
					'cat'	=> ['STATS_PERMISSIONS_NAV_TITLE'],
				],
			],
		];
	}
}
