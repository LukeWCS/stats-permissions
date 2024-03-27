<?php
/**
*
* LF who was here 2 - based on "NV who was here". An extension for the phpBB Forum Software package.
*
* @copyright (c) 2018, LukeWCS, https://www.wcsaga.org/
* @copyright (c) 2015, Anvar, http://phpbbguru.net
* @copyright (c) 2013, nickvergessen, http://www.flying-bits.org/
* @license GNU General Public License, version 2 (GPL-2.0)
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
