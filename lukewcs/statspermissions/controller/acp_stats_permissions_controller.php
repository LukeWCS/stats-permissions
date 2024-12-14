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

namespace lukewcs\statspermissions\controller;

class acp_stats_permissions_controller
{
	protected object $config;
	protected object $template;
	protected object $language;
	protected object $request;
	protected object $ext_manager;

	protected array  $metadata;
	public    string $u_action;

	public function __construct(
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\language\language $language,
		\phpbb\request\request $request,
		\phpbb\extension\manager $ext_manager
	)
	{
		$this->config		= $config;
		$this->template		= $template;
		$this->language		= $language;
		$this->request		= $request;
		$this->ext_manager	= $ext_manager;

		$this->metadata		= $this->ext_manager->create_extension_metadata_manager('lukewcs/statspermissions')->get_metadata('all');
	}

	public function module_settings(): void
	{
		$notes = [];

		$this->language->add_lang(['acp_stats_permissions', 'acp_stats_permissions_lang_author'], 'lukewcs/statspermissions');
		$this->set_meta_template_vars('STATS_PERMISSIONS', 'LukeWCS');

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('stats_permissions'))
			{
				trigger_error($this->language->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}
			// config section 1
			$this->config->set('stats_permissions_admin_mode'			, $this->request->variable('stats_permissions_admin_mode', 0));
			$this->config->set('stats_permissions_use_permissions'		, $this->request->variable('stats_permissions_use_permissions', 0));

			$perm_for_guests =	$this->request->variable('stats_permissions_perm_for_guests_stats', 0)	? 1 : 0;
			$perm_for_guests +=	$this->request->variable('stats_permissions_perm_for_guests_newest', 0)	? 2 : 0;
			$this->config->set('stats_permissions_perm_for_guests'		, $perm_for_guests);

			$perm_for_bots =	$this->request->variable('stats_permissions_perm_for_bots_stats', 0)	? 1 : 0;
			$perm_for_bots +=	$this->request->variable('stats_permissions_perm_for_bots_newest', 0)	? 2 : 0;
			$this->config->set('stats_permissions_perm_for_bots'		, $perm_for_bots);

			// config end
			trigger_error($this->language->lang('STATS_PERMISSIONS_MSG_SAVED_SETTINGS') . adm_back_link($this->u_action));
		}

		$lang_outdated_msg	= $this->lang_ver_check_msg('STATS_PERMISSIONS_LANG_VER', 'STATS_PERMISSIONS_MSG_LANGUAGEPACK_OUTDATED');
		if ($lang_outdated_msg)
		{
			$notes[] = $lang_outdated_msg;
		}

		$this->template->assign_vars([
			'STATS_PERMISSIONS_NOTES'			=> $notes,

			'STATS_PERMISSIONS_ADMIN_MODE'		=> (bool) $this->config['stats_permissions_admin_mode'],
			'STATS_PERMISSIONS_USE_PERMISSIONS'	=> (bool) $this->config['stats_permissions_use_permissions'],
			'STATS_PERMISSIONS_PERM_FOR_GUESTS'	=> (int) $this->config['stats_permissions_perm_for_guests'],
			'STATS_PERMISSIONS_PERM_FOR_BOTS'	=> (int) $this->config['stats_permissions_perm_for_bots'],

			'U_ACTION'							=> $this->u_action,
		]);

		add_form_key('stats_permissions');
	}

	public function set_page_url(string $u_action): void
	{
		$this->u_action = $u_action;
	}

	/*
		Determine the version of the language pack with fallback to 0.0.0
	*/
	private function get_lang_ver(string $lang_ext_ver): string
	{
		preg_match('/^([0-9]+\.[0-9]+\.[0-9]+.*)/', $this->language->lang($lang_ext_ver), $matches);
		return ($matches[1] ?? '0.0.0');
	}

	/*
		Check the language pack version for the minimum version and generate notice if outdated
	*/
	private function lang_ver_check_msg(string $lang_version_var, string $lang_outdated_var): string
	{
		$lang_outdated_msg = '';
		$ext_lang_ver = $this->get_lang_ver($lang_version_var);
		$ext_lang_min_ver = $this->metadata['extra']['lang-min-ver'];

		if (phpbb_version_compare($ext_lang_ver, $ext_lang_min_ver, '<'))
		{
			if ($this->language->is_set($lang_outdated_var))
			{
				$lang_outdated_msg = $this->language->lang($lang_outdated_var);
			}
			else /* Fallback if the current language package does not yet have the required variable. */
			{
				$lang_outdated_msg = 'Note: The language pack for the extension <strong>%1$s</strong> is no longer up-to-date. (installed: %2$s / needed: %3$s)';
			}
			$lang_outdated_msg = sprintf($lang_outdated_msg, $this->metadata['extra']['display-name'], $ext_lang_ver, $ext_lang_min_ver);
		}

		return $lang_outdated_msg;
	}

	private function set_meta_template_vars(string $tpl_prefix, string $copyright): void
	{
		$template_vars = [
			'ext_name'		=> $this->metadata['extra']['display-name'],
			'ext_ver'		=> $this->language->lang($tpl_prefix . '_VERSION_STRING', $this->metadata['version']),
			'ext_copyright'	=> $copyright,
			'class'			=> strtolower($tpl_prefix) . '_footer',
		];
		$template_vars += $this->language->is_set($tpl_prefix . '_LANG_VER') ? [
			'lang_desc'		=> $this->language->lang($tpl_prefix . '_LANG_DESC'),
			'lang_ver'		=> $this->language->lang($tpl_prefix . '_VERSION_STRING', $this->language->lang($tpl_prefix . '_LANG_VER')),
			'lang_author'	=> $this->language->lang($tpl_prefix . '_LANG_AUTHOR'),
		] : [];

		$this->template->assign_vars([$tpl_prefix . '_METADATA' => $template_vars]);
	}
}
