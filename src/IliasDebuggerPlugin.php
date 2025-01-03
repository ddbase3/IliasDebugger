<?php declare(strict_types=1);

namespace IliasDebugger;

use Api\IPlugin;
use Api\ICheck;
use Base3\ServiceLocator;

class IliasDebuggerPlugin implements IPlugin, ICheck {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "iliasdebuggerplugin";
	}

	// Implementation of IPlugin

	public function init() {

		$this->servicelocator

			->set($this->getName(), $this, ServiceLocator::SHARED);
	}

	// Implementation of ICheck

	public function checkDependencies() {
		return array(
			"debuggerplugin_installed" => $this->servicelocator->get('debuggerplugin') ? "Ok" : "debuggerplugin not installed"
		);
	}

}

