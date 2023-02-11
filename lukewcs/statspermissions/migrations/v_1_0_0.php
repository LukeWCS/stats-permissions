<?php
/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\statspermissions\migrations;

class v_1_0_0 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['stats_permissions_admin_mode']);
	}

	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v32x\v329'];
	}

	public function update_data()
	{
		$data = [];
		$data[] = ['config.add', ['stats_permissions_admin_mode'		, '0']];
		$data[] = ['config.add', ['stats_permissions_use_permissions'	, '0']];
		$data[] = ['config.add', ['stats_permissions_disp_for_guests'	, '1']];
		$data[] = ['config.add', ['stats_permissions_disp_for_bots'		, '0']];
		$data[] = ['permission.add', ['u_stats_permissions_show_stats']];
		$data[] = ['permission.add', ['u_stats_permissions_show_newest']];
		$data[] = ['permission.permission_set', ['ADMINISTRATORS'		, 'u_stats_permissions_show_stats', 'group']];
		$data[] = ['permission.permission_set', ['ADMINISTRATORS'		, 'u_stats_permissions_show_newest', 'group']];
		$data[] = ['permission.permission_set', ['GLOBAL_MODERATORS'	, 'u_stats_permissions_show_stats', 'group']];
		$data[] = ['permission.permission_set', ['GLOBAL_MODERATORS'	, 'u_stats_permissions_show_newest', 'group']];
		$data[] = ['permission.permission_set', ['REGISTERED'			, 'u_stats_permissions_show_stats', 'group']];
		$data[] = ['permission.permission_set', ['REGISTERED'			, 'u_stats_permissions_show_newest', 'group']];
		$data[] = ['permission.permission_set', ['NEWLY_REGISTERED'		, 'u_stats_permissions_show_newest', 'group', false]];
		$data[] = ['permission.permission_set', ['GUESTS'				, 'u_stats_permissions_show_stats', 'group']];
		if ($this->role_exists('ROLE_USER_STANDARD'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_STANDARD'	, 'u_stats_permissions_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_STANDARD'	, 'u_stats_permissions_show_newest', 'role']];
		}
		if ($this->role_exists('ROLE_USER_LIMITED'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_LIMITED'	, 'u_stats_permissions_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_LIMITED'	, 'u_stats_permissions_show_newest', 'role']];
		}
		if ($this->role_exists('ROLE_USER_FULL'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_FULL'		, 'u_stats_permissions_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_FULL'		, 'u_stats_permissions_show_newest', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NOPM'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NOPM'		, 'u_stats_permissions_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_NOPM'		, 'u_stats_permissions_show_newest', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NOAVATAR'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NOAVATAR'	, 'u_stats_permissions_show_stats', 'role']];
			$data[] = ['permission.permission_set', ['ROLE_USER_NOAVATAR'	, 'u_stats_permissions_show_newest', 'role']];
		}
		if ($this->role_exists('ROLE_USER_NEW_MEMBER'))
		{
			$data[] = ['permission.permission_set', ['ROLE_USER_NEW_MEMBER'	, 'u_stats_permissions_show_newest', 'role', false]];
		}
		$data[] = ['module.add', [
			'acp',
			'ACP_CAT_DOT_MODS',
			'STATS_PERMISSIONS_NAV_TITLE'
		]];
		$data[] = ['module.add', [
			'acp',
			'STATS_PERMISSIONS_NAV_TITLE',
			[
				'module_basename'	=> '\lukewcs\statspermissions\acp\acp_stats_permissions_module',
				'module_langname'	=> 'STATS_PERMISSIONS_NAV_CONFIG',
				'module_mode'		=> 'overview',
				'module_auth'		=> 'ext_lukewcs/statspermissions && acl_a_board',
		]]];

		return $data;
	}

	public function revert_data()
	{
		return([
			['permission.remove', ['u_stats_permissions_show_stats']],
			['permission.remove', ['u_stats_permissions_show_newest']],
		]);
	}

	private function role_exists($role)
	{
		$sql = 'SELECT role_id
				FROM ' . ACL_ROLES_TABLE . "
				WHERE role_name = '" . $this->db->sql_escape($role) . "'";
		$result = $this->db->sql_query_limit($sql, 1);
		$role_id = $this->db->sql_fetchfield('role_id');
		$this->db->sql_freeresult($result);

		return $role_id;
	}
}
