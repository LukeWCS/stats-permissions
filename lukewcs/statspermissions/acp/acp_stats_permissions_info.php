<?php
/**
* 
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\statspermissions\acp;

class acp_stats_permissions_info
{
	function module()
	{
		return array(
			'filename'	=> '\lukewcs\statspermissions\acp\acp_stats_permissions_module',
			'title'		=> 'STATS_PERMISSIONS_NAV_TITLE',
			'modes'		=> array(
				'settings'	=> array(
					'title'	=> 'STATS_PERMISSIONS_NAV_CONFIG',
					'auth'	=> 'ext_lukewcs/statspermissions && acl_a_board',
					'cat'	=> array('ACP_BOARD_CONFIGURATION')
				),
			),
		);
	}
}
