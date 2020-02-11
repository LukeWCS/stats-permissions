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
	// @lukewcs.statspermissions.core
	protected $stats_permissions_core;

	public function __construct(
		$stats_permissions_core
	)
	{
		$this->statsperm = $stats_permissions_core;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.page_header_after'		=> 'set_permissions',
			'core.permissions'				=> 'add_permissions',
		);
	}

	public function set_permissions($event)
	{
		$this->statsperm->set_permissions($event);
	}

	public function add_permissions($event)
	{
		$this->statsperm->add_permissions($event);
	}
}
