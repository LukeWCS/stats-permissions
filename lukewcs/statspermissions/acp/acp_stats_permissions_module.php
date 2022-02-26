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

class acp_stats_permissions_module
{
	protected $user;
	protected $config;
	protected $request;
	protected $template;
	protected $language;
	protected $md_manager;
	public $u_action;

	public function main()
	{
		global $user, $config, $request, $template, $language, $phpbb_container;

		$this->user = $user;
		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
		$this->language = $language;
		$this->md_manager = $phpbb_container->get('ext.manager')->create_extension_metadata_manager('lukewcs/statspermissions');
		$notes = '';

		$ext_display_name = $this->md_manager->get_metadata('display-name');
		$ext_display_ver = $this->md_manager->get_metadata('version');
		$ext_lang_min_ver = $this->md_manager->get_metadata()['extra']['lang-min-ver'];

		$this->language->add_lang(['acp_stats_permissions'], 'lukewcs/statspermissions');
		$lang_ver = $this->language->is_set('STATS_PERMISSIONS_LANG_EXT_VER') ? $this->language->lang('STATS_PERMISSIONS_LANG_EXT_VER') : '0.0.0';

		$this->tpl_name = 'acp_stats_permissions';
		$this->page_title = $this->user->lang['STATS_PERMISSIONS_NAV_TITLE'] . ' - ' . $this->user->lang['STATS_PERMISSIONS_NAV_CONFIG'];

		add_form_key('stats_permissions');

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('stats_permissions'))
			{
				trigger_error($this->language->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}
			// config section 1
			$this->config->set('stats_permissions_admin_mode'			, $this->request->variable('stats_permissions_admin_mode', 0));
			$this->config->set('stats_permissions_use_permissions'		, $this->request->variable('stats_permissions_use_permissions', 0));
			$this->config->set('stats_permissions_disp_for_guests'		, $this->request->variable('stats_permissions_disp_for_guests', 0));
			$this->config->set('stats_permissions_disp_for_bots'		, $this->request->variable('stats_permissions_disp_for_bots', 0));
			// config end
			trigger_error($this->user->lang['STATS_PERMISSIONS_MSG_SAVED_SETTINGS'] . adm_back_link($this->u_action));
		}

		if (phpbb_version_compare($ext_lang_min_ver, $lang_ver, '>'))
		{
			if ($this->language->is_set('STATS_PERMISSIONS_MSG_LANGUAGEPACK_OUTDATED'))
			{
				$this->add_note($notes, $this->language->lang('STATS_PERMISSIONS_MSG_LANGUAGEPACK_OUTDATED'));
			}
			else // Fallback if the current language package does not yet have the required variable.
			{
				$this->add_note($notes, 'Note: The language pack for this extension is no longer up-to-date.');
			}
		}

		$this->template->assign_vars([
			// heading
			'STATS_PERMISSIONS_EXT_NAME'				=> $ext_display_name,
			'STATS_PERMISSIONS_EXT_VER'					=> $ext_display_ver,
			'STATS_PERMISSIONS_NOTES'					=> $notes,
			// config section 1
			'STATS_PERMISSIONS_ADMIN_MODE'				=> $this->config['stats_permissions_admin_mode'],
			'STATS_PERMISSIONS_USE_PERMISSIONS'			=> $this->config['stats_permissions_use_permissions'],
			'STATS_PERMISSIONS_DISP_FOR_GUESTS'			=> $this->config['stats_permissions_disp_for_guests'],
			'STATS_PERMISSIONS_DISP_FOR_BOTS'			=> $this->config['stats_permissions_disp_for_bots'],
			// form elements
			'U_ACTION'									=> $this->u_action,
		]);
	}

	private function add_note(string &$notes, string $msg)
	{
		$notes .= (($notes != '') ? "\n" : "") . sprintf('<p>%s</p>', $msg);
	}
}
