<?php
/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\statspermissions\controller;

class acp_stats_permissions_controller
{
	protected $language;
	protected $template;
	protected $request;
	protected $config;
	protected $user;
	protected $ext_manager;
	public $u_action;

	public function __construct(
		\phpbb\language\language $language,
		\phpbb\template\template $template,
		\phpbb\request\request $request,
		\phpbb\config\config $config,
		\phpbb\user $user,
		\phpbb\extension\manager $ext_manager
	)
	{
		$this->language		= $language;
		$this->template		= $template;
		$this->request		= $request;
		$this->config		= $config;
		$this->user			= $user;
		$this->ext_manager	= $ext_manager;
	}

	public function module_settings()
	{
		$this->language->add_lang(['acp_stats_permissions'], 'lukewcs/statspermissions');

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
			trigger_error($this->language->lang('STATS_PERMISSIONS_MSG_SAVED_SETTINGS') . adm_back_link($this->u_action));
		}

		add_form_key('stats_permissions');

		$md_manager = $this->ext_manager->create_extension_metadata_manager('lukewcs/statspermissions');
		$this_meta = $md_manager->get_metadata('all');
		$notes = [];

		$ext_display_name	= $this_meta['extra']['display-name'];
		$ext_ver			= $this_meta['version'];
		$ext_lang_min_ver	= $this_meta['extra']['lang-min-ver'];

		$ext_lang_ver 		= $this->get_lang_ver('STATS_PERMISSIONS_LANG_EXT_VER');
		$lang_outdated_msg	= $this->check_lang_ver($ext_display_name, $ext_lang_ver, $ext_lang_min_ver, 'STATS_PERMISSIONS_MSG_LANGUAGEPACK_OUTDATED');
		if ($lang_outdated_msg)
		{
			$notes[] = $lang_outdated_msg;
		}

		$this->template->assign_vars([
			// heading
			'STATS_PERMISSIONS_EXT_NAME'				=> $ext_display_name,
			'STATS_PERMISSIONS_EXT_VER'					=> $ext_ver,
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

	public function set_page_url(string $u_action): void
	{
		$this->u_action = $u_action;
	}

	// Determine the version of the language pack with fallback to 0.0.0
	private function get_lang_ver(string $lang_ext_ver): string
	{
		return ($this->language->is_set($lang_ext_ver) ? preg_replace('/[^0-9.]/', '', $this->language->lang($lang_ext_ver)) : '0.0.0');
	}

	// Check the language pack version for the minimum version and generate notice if outdated
	private function check_lang_ver(string $ext_name, string $ext_lang_ver, string $ext_lang_min_ver, string $lang_outdated_var): string
	{
		$lang_outdated_msg = '';

		if (phpbb_version_compare($ext_lang_ver, $ext_lang_min_ver, '<'))
		{
			if ($this->language->is_set($lang_outdated_var))
			{
				$lang_outdated_msg = $this->language->lang($lang_outdated_var);
			}
			else // Fallback if the current language package does not yet have the required variable.
			{
				$lang_outdated_msg = 'Note: The language pack for the extension <strong>%1$s</strong> is no longer up-to-date. (installed: %2$s / needed: %3$s)';
			}
			$lang_outdated_msg = sprintf($lang_outdated_msg, $ext_name, $ext_lang_ver, $ext_lang_min_ver);
		}

		return $lang_outdated_msg;
	}
}
