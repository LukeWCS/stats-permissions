<?php
/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\statspermissions\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $stats_permissions_core;

	public function __construct(
		$stats_permissions_core
	)
	{
		$this->statsperm = $stats_permissions_core;
	}

	public static function getSubscribedEvents()
	{
		return [
			'core.page_header_after'	=> 'set_template_vars',
			'core.permissions'			=> 'add_permissions',
		];
	}

	public function set_template_vars()
	{
		$this->statsperm->set_template_vars();
	}

	public function add_permissions($event)
	{
		$this->statsperm->add_permissions($event);
	}
}
