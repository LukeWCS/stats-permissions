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

class v_1_2_0 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\lukewcs\statspermissions\migrations\v_1_0_2'];
	}

	public function update_data()
	{
		return [
			['config.add'		, ['stats_permissions_perm_for_guests'	, $this->config['stats_permissions_disp_for_guests']]],
			['config.add'		, ['stats_permissions_perm_for_bots'	, $this->config['stats_permissions_disp_for_bots']]],
			['config.remove'	, ['stats_permissions_disp_for_guests']],
			['config.remove'	, ['stats_permissions_disp_for_bots']],
		];
	}
}
