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

/**
* @package acp
*/
class acp_stats_permissions_module
{
	var $u_action;

	public function main($id, $mode)
	{
		global $user, $config, $request, $template;
		$this->user = $user;
		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
	
		add_form_key('stats_permissions');
		$this->tpl_name = 'acp_stats_permissions';
		$this->page_title = $this->user->lang['STATS_PERMISSIONS_NAV_TITLE'] . ' - ' . $this->user->lang['STATS_PERMISSIONS_NAV_CONFIG'];
		$submit = $this->request->is_set_post('submit');

		if ($submit)
		{
			if (!check_form_key('stats_permissions'))
			{
				trigger_error('FORM_INVALID');
			}
			$this->config->set('stats_permissions_admin_mode'			, $this->request->variable('stats_permissions_admin_mode', 0));
			$this->config->set('stats_permissions_use_permissions'		, $this->request->variable('stats_permissions_use_permissions', 0));
			$this->config->set('stats_permissions_disp_for_guests'		, $this->request->variable('stats_permissions_disp_for_guests', 0));

			trigger_error($this->user->lang['STATS_PERMISSIONS_MSG_SAVED_SETTINGS'] . adm_back_link($this->u_action));
		}

		$this->template->assign_vars(array(
			'STATS_PERMISSIONS_CONFIG_TITLE_TEXT'		=> sprintf($this->user->lang['STATS_PERMISSIONS_CONFIG_TITLE'], 'Stats Permissions'),
			'STATS_PERMISSIONS_ADMIN_MODE'				=> $this->config['stats_permissions_admin_mode'],
			'STATS_PERMISSIONS_USE_PERMISSIONS'			=> $this->config['stats_permissions_use_permissions'],
			'STATS_PERMISSIONS_DISP_FOR_GUESTS'			=> $this->config['stats_permissions_disp_for_guests'],
			'U_ACTION'						=> $this->u_action,
		));
	}
}
