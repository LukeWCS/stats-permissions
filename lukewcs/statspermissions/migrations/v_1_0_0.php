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
		return isset($this->config['stats_permissions_ext_version']) && version_compare($this->config['stats_permissions_ext_version'], '1.0.0', '>=');
	}

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v320\v320');
	}

	public function update_data()
	{
		$data = array();
		// Add configs
		$data[] = array('config.add', array('stats_permissions_admin_mode'			, '0'));
		$data[] = array('config.add', array('stats_permissions_use_permissions'		, '0'));
		$data[] = array('config.add', array('stats_permissions_disp_for_guests'		, '0'));
		$data[] = array('config.add', array('stats_permissions_disp_for_bots'		, '2'));
		// Add permissions
		$data[] = array('permission.add', array('u_stats_permissions_show_stats'));
		$data[] = array('permission.add', array('u_stats_permissions_show_newest'));
		// Set permissions
		$data[] = array('permission.permission_set', array('ADMINISTRATORS'		, 'u_stats_permissions_show_stats', 'group'));
		$data[] = array('permission.permission_set', array('ADMINISTRATORS'		, 'u_stats_permissions_show_newest', 'group'));
		$data[] = array('permission.permission_set', array('GLOBAL_MODERATORS'	, 'u_stats_permissions_show_stats', 'group'));
		$data[] = array('permission.permission_set', array('GLOBAL_MODERATORS'	, 'u_stats_permissions_show_newest', 'group'));
		$data[] = array('permission.permission_set', array('REGISTERED'			, 'u_stats_permissions_show_stats', 'group'));
		$data[] = array('permission.permission_set', array('REGISTERED'			, 'u_stats_permissions_show_newest', 'group'));
		$data[] = array('permission.permission_set', array('NEWLY_REGISTERED'	, 'u_stats_permissions_show_newest', 'group', false));
		$data[] = array('permission.permission_set', array('GUESTS'				, 'u_stats_permissions_show_stats', 'group'));
		// Set permission roles
		if ($this->role_exists('ROLE_USER_STANDARD'))
		{
			$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD'		, 'u_stats_permissions_show_stats', 'role'));
			$data[] = array('permission.permission_set', array('ROLE_USER_STANDARD'		, 'u_stats_permissions_show_newest', 'role'));
		}
		if ($this->role_exists('ROLE_USER_LIMITED'))
		{
			$data[] = array('permission.permission_set', array('ROLE_USER_LIMITED'		, 'u_stats_permissions_show_stats', 'role'));
			$data[] = array('permission.permission_set', array('ROLE_USER_LIMITED'		, 'u_stats_permissions_show_newest', 'role'));
		}
		if ($this->role_exists('ROLE_USER_FULL'))
		{
			$data[] = array('permission.permission_set', array('ROLE_USER_FULL'			, 'u_stats_permissions_show_stats', 'role'));
			$data[] = array('permission.permission_set', array('ROLE_USER_FULL'			, 'u_stats_permissions_show_newest', 'role'));
		}
		if ($this->role_exists('ROLE_USER_NOPM'))
		{
			$data[] = array('permission.permission_set', array('ROLE_USER_NOPM'			, 'u_stats_permissions_show_stats', 'role'));
			$data[] = array('permission.permission_set', array('ROLE_USER_NOPM'			, 'u_stats_permissions_show_newest', 'role'));
		}
		if ($this->role_exists('ROLE_USER_NOAVATAR'))
		{
			$data[] = array('permission.permission_set', array('ROLE_USER_NOAVATAR'		, 'u_stats_permissions_show_stats', 'role'));
			$data[] = array('permission.permission_set', array('ROLE_USER_NOAVATAR'		, 'u_stats_permissions_show_newest', 'role'));
		}
		if ($this->role_exists('ROLE_USER_NEW_MEMBER'))
		{
			$data[] = array('permission.permission_set', array('ROLE_USER_NEW_MEMBER'	, 'u_stats_permissions_show_newest', 'role', false));
		}
		// Add ACP modules
		$data[] = array('module.add', array(
			'acp',
			'ACP_CAT_DOT_MODS',
			'STATS_PERMISSIONS_NAV_TITLE'
		));
		$data[] = array('module.add', array(
			'acp',
			'STATS_PERMISSIONS_NAV_TITLE',
			array(
				'module_basename'	=> '\lukewcs\statspermissions\acp\acp_stats_permissions_module',
				'module_langname'	=> 'STATS_PERMISSIONS_NAV_CONFIG',
				'module_mode'		=> 'overview',
				'module_auth'		=> 'ext_lukewcs/statspermissions && acl_a_board',
		)));
		// Set current version
		$data[] = array('config.add', array('stats_permissions_ext_version'				, '1.0.0'));

		return $data;
	}

	public function revert_data()
	{
		return(array(
			// Remove permissions
			array('permission.remove', array('u_stats_permissions_show_stats')),
			array('permission.remove', array('u_stats_permissions_show_newest')),
		));
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
