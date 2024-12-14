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

class acp_stats_permissions_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	public function main()
	{
		global $phpbb_container;

		$language = $phpbb_container->get('language');

		$this->page_title = $language->lang('STATS_PERMISSIONS_NAV_TITLE') . ' - ' . $language->lang('STATS_PERMISSIONS_NAV_CONFIG');
		$acp_controller = $phpbb_container->get('lukewcs.statspermissions.controller.acp');

		$this->tpl_name = 'acp_stats_permissions_settings';
		$acp_controller->set_page_url($this->u_action);
		$acp_controller->module_settings();
	}
}
