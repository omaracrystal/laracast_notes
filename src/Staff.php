<?php

namespace Acme;
use Acme\Users\Person;

class Staff {

	protected $members = [];

	public function __construct($members = [] /* default if no name is put in then it's empty if this isn't there, there will be an error */) {
		$this->members = $members;
	}

	public function add(Person $person){
		$this->members[] = $person;
	}

	public function getMembers() {
		return $this->members;
	}
}
