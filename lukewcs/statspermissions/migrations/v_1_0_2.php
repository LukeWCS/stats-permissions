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

namespace lukewcs\statspermissions\migrations;

class v_1_0_2 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\lukewcs\statspermissions\migrations\v_1_0_0'];
	}

	public function update_data()
	{
		return [
			['module.remove', [
				'acp',
				'STATS_PERMISSIONS_NAV_TITLE', [
					'module_basename'	=> '\lukewcs\statspermissions\acp\acp_stats_permissions_module',
					'module_langname'	=> 'STATS_PERMISSIONS_NAV_CONFIG',
					'module_mode'		=> 'overview',
					'module_auth'		=> 'ext_lukewcs/statspermissions && acl_a_board',
				]
			]],
			['module.add', [
				'acp',
				'STATS_PERMISSIONS_NAV_TITLE', [
					'module_basename'	=> '\lukewcs\statspermissions\acp\acp_stats_permissions_module',
					'modes'				=> ['settings'],
				]
			]],
		];
	}
}
