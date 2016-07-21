<?php

namespace Acme;
use Acme\Users\Person;

class Business {

	public function __construct(Staff $staff) { /* Business **DEPENDS** on a staff in order to run */
		$this->staff =$staff;
	}

	public function hire(Person $person) {
		//add $person to the staff collection (this is a *MESSAGE*)
		$this->staff->add($person);
	}

	public function getStaffMembers() {
		/* MESSAGE */
		return $this->staff->getMembers();
	}
}
