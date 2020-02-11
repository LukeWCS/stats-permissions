<?php
/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\statspermissions\core;

class stats_permissions
{
	protected $config;
	protected $template;
	protected $auth;
	protected $user;

	public function __construct(
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\auth\auth $auth,
		\phpbb\user $user
	)
	{
		$this->config = $config;
		$this->template = $template;
		$this->auth = $auth;
		$this->user = $user;
	}

	public function set_permissions($event)
	{
		if ($this->config['stats_permissions_admin_mode'])
		{
			$permission_stats = $this->auth->acl_get('a_');
			$permission_newest = $this->auth->acl_get('a_');
		}
		else
		{
			if ($this->config['stats_permissions_use_permissions'])
			{
				$permission_stats = $this->auth->acl_gets('u_stats_permissions_show_stats');
				$permission_newest = $this->auth->acl_gets('u_stats_permissions_show_newest');
			}
			else
			{
				if ($this->user->data['user_id'] != ANONYMOUS && empty($this->user->data['is_bot']))	// user
				{
					$permission_stats = true;
					$permission_newest = true;
				}
				else if ($this->user->data['is_bot'])	// bot
				{
					$permission_stats = $this->config['stats_permissions_disp_for_bots'] == 0 || $this->config['stats_permissions_disp_for_bots'] == 1;
					$permission_newest = $this->config['stats_permissions_disp_for_bots'] == 1 || $this->config['stats_permissions_disp_for_bots'] == 3;
				}
				else	// guest
				{
					$permission_stats = $this->config['stats_permissions_disp_for_guests'] == 0 || $this->config['stats_permissions_disp_for_guests'] == 1;
					$permission_newest = $this->config['stats_permissions_disp_for_guests'] == 1 || $this->config['stats_permissions_disp_for_guests'] == 3;
				}
			}
		}

		$this->template->assign_vars(array(
			'NEWEST_USER_STATSPERM'	=> $this->template->retrieve_var('NEWEST_USER'),
			'NEWEST_USER'			=> false,
			'STATSPERM_STATS'		=> $permission_stats,
			'STATSPERM_NEWEST'		=> $permission_newest,
		));
	}

	public function add_permissions($event)
	{
		$permissions = $event['permissions'];
		$permissions['u_stats_permissions_show_stats'] = array('lang' => 'ACL_U_STATS_PERMISSIONS_SHOW_STATS', 'cat' => 'misc');
		$permissions['u_stats_permissions_show_newest'] = array('lang' => 'ACL_U_STATS_PERMISSIONS_SHOW_NEWEST', 'cat' => 'misc');
		$event['permissions'] = $permissions;
	}
}
