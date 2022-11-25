/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

statspermissionsACP = {};

statspermissionsACP.constants = Object.freeze({
	PermNothing		: 0,
	PermStats		: 1,
	PermUsers		: 2,
	PermStatsUsers	: 3,

	OpacityEnabled	: '1.0',
	OpacityDisabled	: '0.35',
});

statspermissionsACP.setState = function () {
	'use strict';

	var c = statspermissionsACP.constants;

	$('#stats_permissions_opt_use_permissions').css('opacity', (
			$('input[name="stats_permissions_admin_mode"]').prop('checked') == false
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#stats_permissions_opt_disp_for_guests').css('opacity', (
			$('input[name="stats_permissions_admin_mode"]').prop('checked') == false
			&& $('input[name="stats_permissions_use_permissions"]').prop('checked') == false
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
	$('#stats_permissions_opt_disp_for_bots').css('opacity', (
			$('input[name="stats_permissions_admin_mode"]').prop('checked') == false
			&& $('input[name="stats_permissions_use_permissions"]').prop('checked') == false
		) ? c.OpacityEnabled : c.OpacityDisabled
	);
};

statspermissionsACP.setDefaults = function () {
	'use strict';

	var c = statspermissionsACP.constants;

	$('input[name="stats_permissions_admin_mode"]'			).prop('checked'	, false);
	$('input[name="stats_permissions_use_permissions"]'		).prop('checked'	, false);
	$('select[name="stats_permissions_disp_for_guests"]'	).prop('value'		, c.PermStats);
	$('select[name="stats_permissions_disp_for_bots"]'		).prop('value'		, c.PermNothing);

	statspermissionsACP.setState();
};

statspermissionsACP.customFormReset = function () {
	'use strict';

	$('#stats_permissions_form').trigger('reset');
	statspermissionsACP.setState();
};

$(window).ready(function() {
	'use strict';

	statspermissionsACP.setState();

	$('input[name="stats_permissions_admin_mode"]'		).on('change'	, statspermissionsACP.setState);
	$('input[name="stats_permissions_use_permissions"]'	).on('change'	, statspermissionsACP.setState);
	$('input[name="stats_permissions_defaults"]'		).on('click'	, statspermissionsACP.setDefaults);
	$('input[name="form_reset"]'						).on('click'	, statspermissionsACP.customFormReset);
});
