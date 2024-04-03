<?php

namespace IliasDebugger;

use Api\IPlugin;
use Api\ICheck;

class IliasDebuggerPlugin implements IPlugin, ICheck {

	private $servicelocator;

	public function __construct() {
		$this->servicelocator = \Base3\ServiceLocator::getInstance();
	}

	// Implementation of IBase

	public function getName() {
		return "iliasdebuggerplugin";
	}

	// Implementation of IPlugin

	public function init() {

		$this->servicelocator
			->set($this->getName(), $this, true)
			;

	}

	// Implementation of ICheck

	public function checkDependencies() {
		return array(
			"debuggerplugin_installed" => $this->servicelocator->get('debuggerplugin') ? "Ok" : "debuggerplugin not installed"
		);
	}

}

