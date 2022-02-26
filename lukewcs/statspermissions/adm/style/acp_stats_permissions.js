/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

'use strict';

var statspermissionsACP = {
	SetState: function () {
		const enabled = "1.0";
		const disabled = "0.35";

		$('#stats_permissions_opt_use_permissions').css('opacity', (
				$('#stats_permissions_admin_mode_no').prop('checked')
			) ? enabled : disabled
		);
		$('#stats_permissions_opt_disp_for_guests').css('opacity', (
				$('#stats_permissions_admin_mode_no').prop('checked')
				&& $('#stats_permissions_use_permissions_no').prop('checked')
			) ? enabled : disabled
		);
		$('#stats_permissions_opt_disp_for_bots').css('opacity', (
				$('#stats_permissions_admin_mode_no').prop('checked')
				&& $('#stats_permissions_use_permissions_no').prop('checked')
			) ? enabled : disabled
		);
	},
	SetDefaults: function () {
		$('#stats_permissions_admin_mode_no'			).prop('checked'	, true);
		$('#stats_permissions_use_permissions_no'		).prop('checked'	, true);
		$('#stats_permissions_perm_for_guests_stats'	).prop('selected'	, true);
		$('#stats_permissions_perm_for_bots_nothing'	).prop('selected'	, true);
		statspermissionsACP.SetState();
	},
	CustomFormReset: function () {
		$('#stats_permissions_form').trigger('reset');
		statspermissionsACP.SetState();
	}
};

$(window).ready(statspermissionsACP.SetState);
