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
	const PERM_NOTHING			= 0;
	const PERM_STATS			= 1;
	const PERM_NEWEST			= 2;
	const PERM_STATS_NEWEST		= 3;

	protected $config;
	protected $template;
	protected $auth;
	protected $user;
	protected $language;

	public function __construct(
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\auth\auth $auth,
		\phpbb\user $user,
		\phpbb\event\dispatcher_interface $dispatcher,
		$language
	)
	{
		$this->config = $config;
		$this->template = $template;
		$this->auth = $auth;
		$this->user = $user;
		$this->phpbb_dispatcher = $dispatcher;
		$this->language = $language;
	}

	public function set_template_vars(): void
	{
		$force_api_mode = false;

		/**
		* Overriding the variables that regulate the conditions for the Stats Permissions display.
		*
		* @event lukewcs.statspermissions.display_condition
		* @var  bool  force_api_mode  Forces the API mode so that Stats Permissions is not displayed, but only the template variables are generated.
		* @since 1.0.0
		*/
		$vars = ['force_api_mode'];
		extract($this->phpbb_dispatcher->trigger_event('lukewcs.statspermissions.display_condition', compact($vars)));

		$force_api_mode = ($force_api_mode === true);

		// Set display permission variables
		if ($this->config['stats_permissions_admin_mode'])
		{
			$permission_stats = $this->auth->acl_get('a_');
			$permission_newest = $this->auth->acl_get('a_');
		}
		else
		{
			if ($this->config['stats_permissions_use_permissions']) // use phpBB permissions
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
				else if (!empty($this->user->data['is_bot']))	// bot
				{
					$permission_stats = (
						$this->config['stats_permissions_disp_for_bots'] == self::PERM_STATS
						|| $this->config['stats_permissions_disp_for_bots'] == self::PERM_STATS_NEWEST
					);
					$permission_newest = (
						$this->config['stats_permissions_disp_for_bots'] == self::PERM_NEWEST
						|| $this->config['stats_permissions_disp_for_bots'] == self::PERM_STATS_NEWEST
					);
				}
				else	// guest
				{
					$permission_stats = (
						$this->config['stats_permissions_disp_for_guests'] == self::PERM_STATS
						|| $this->config['stats_permissions_disp_for_guests'] == self::PERM_STATS_NEWEST
					);
					$permission_newest = (
						$this->config['stats_permissions_disp_for_guests'] == self::PERM_NEWEST
						|| $this->config['stats_permissions_disp_for_guests'] == self::PERM_STATS_NEWEST
					);
				}
			}
		}

		$this->template->assign_vars([
			'NEWEST_USER_STATSPERM'	=> $this->template->retrieve_var('NEWEST_USER'),
			'NEWEST_USER'			=> false,
			'STATSPERM_STATS'		=> $permission_stats,
			'STATSPERM_NEWEST'		=> $permission_newest,
			'STATSPERM_API_MODE'	=> $force_api_mode,
		]);
	}

	public function add_permissions($event): void
	{
		$permissions = $event['permissions'];
		$lang_show_stats = $this->language->lang('ACL_U_STATS_PERMISSIONS_SHOW_STATS');
		$lang_show_newest = $this->language->lang('ACL_U_STATS_PERMISSIONS_SHOW_NEWEST');
		if (!$this->config['stats_permissions_use_permissions'] || $this->config['stats_permissions_admin_mode'])
		{
			$lang_show_stats = '<span style="opacity: 0.5;">' . $lang_show_stats . '</span>';
			$lang_show_newest = '<span style="opacity: 0.5;">' . $lang_show_newest . '</span>';
		}
		$permissions['u_stats_permissions_show_stats'] = ['lang' => $lang_show_stats, 'cat' => 'misc'];
		$permissions['u_stats_permissions_show_newest'] = ['lang' => $lang_show_newest, 'cat' => 'misc'];
		$event['permissions'] = $permissions;
	}
}
