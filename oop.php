<?php

/* LEARN OOP */

/* -------------------------------------------------------------------------------------------------------------------*/

class Task {
	public $description;

	public $completed = false;

	public function __contruct() {
		$this->description= $description;
	}

	public function complete() {
		$this->completed = true;
	}
}




/*

https://laracasts.com/series/object-oriented-bootcamp-in-php/episodes/1

property vs variable within class
new instances:
	$task = new Task(“Learn OOP");
methods vs functions
	methods are called within a class
Terms:  http://inchoo.net/dev-talk/understanding-phps-oop-basic-terms-explained/
	Class
	Method
	Instance
	Inheritance
	Abstraction
	Singleton
	Decomposition
	Capsulation
	Messaging
	Polymorphism
*/






/* ------------------------------------------------------------------------------------------------------------------ */
/* Getters and Setters */


/*
class Person {

	private $name;

	private $age;

	// CONSTRUCTOR
	public function __construct($name) {
		$this->name = $name;
	}

	// GETTER
	public function getAge() {
		return $this->age;
	}

	// SETTER
	public function setAge($age) {
		if ($age < 18) {
			throw new Exception('Person is not old enough.');
		} else {
			$this->age = $age;
		}
	}
}

$john = new Person('John Doe');

$john->setAge(30);

/* $john->age = 3; >> when age is below 18 and set to public this is a problem because we need to throw the Exception ... meaning it's accessible to be changed outside of the function... We fix this with Encapsulation change to:
		* private: you cannot extent the class
        * protected: you can extend the class */

/*

var_dump($john->getAge());




/* -------------------------------------------------------------------------------------------------------------------*/
/* INHERITANCE */
class Mother {
	public function getEyeCount() {
		return 2;
	}
}

class Child extends Mother {

}




/* -------------------------------------------------------------------------------------------------------------------*/
/* Abstract classes */

abstract class Shape {
	protected $color;

	public function __contruct($color = 'red'/* default */) {
		$this -> color = $color;
	}

	public function getColor() {
		return $this -> $color;
	}


	/* Abstact Method */
	abstract protected function getArea(); /* since there are different formulas for each shape to calc area, this is an empty method. When you try to instantiate a new shape this will method will need to be defined within it's shape class. */

}

class Square extends Shape {
	protected $length = 4;

	public function getArea() {
		return pow($this->length,2); /* pow= power of 2 */
	}
}

 /* class Circle extends Shape {

} */

/* class Triangle extends Shape {

} */

/* To then call for the area of a specific shape (since it's an extention of the Class Shape... the short code is to wrap it with > ( ) */

// (new Circle)->getArea();


/* FAVOR COMPOSITION OVER INHERITANCE */





/* -------------------------------------------------------------------------------------------------------------------*/

/* Messages - are how classes communicate with each other (calling methods within other classes)
 a suite of classes are in their seperate files Person.php, Business.php, Staff.php */

/* PASTE ALL CLASSES HERE FOR CODE BELOW TO WORK - SEE NEXT LESSON IN ORDER TO CALL THE SEPERATE FILES */

/*

$jeffrey = new Person('Jeffery Way');

$staff = new Staff;

$laracasts = new Business($staff);

$larcasts->hire($jeffrey);
// OR ideally:
$staff = new Staff([$jeffrey]);

var_dump($laracasts->getStaffMembers());

 */

/* -------------------------------------------------------------------------------------------------------------------*/

/* NAMESPACING AND AUTOLOADING (use composer to load dependances to autoload component
	* ideally you would want a seperate file per class
	* ABOVE THE CODE WILL NOT WORK UNLESS THE CLASSES ARE PASTED THERE - TO AVOID THAT WE WILL DO THIS:
    * create composer.json (for now I have a dummy business name as the key word for psr-4 (standard of how files would be loaded)
    * from terminal $ composer install
    * include namespace in all class files (this can be done with by running the following:)
        * from terminal $ composer dump-autoload
	* declare namespacing within each class file - will help with organizing and labeling classes
            * namespace Acme;
    * include autoloader.php and this file within index.php
*/
use Acme\Users\Person;
use Acme\Staff;
use Acme\Business;

$jeffrey = new Person('Jeffery Way');

$staff = new Staff([$jeffrey]);

$laracasts = new Business($staff);

$laracasts->hire(new Person('Jane Doe'));

var_dump($laracasts->getStaffMembers());





/* -------------------------------------------------------------------------------------------------------------------*/




/* Static and Constants vs (Dynamic)
// both are shared and gets rid of incapsulation differences are:
	static -- can be changed
	const -- cannot be changed
*/
class Math {
	public static function add() {
		return array_sum(func_get_args());
	}
}

echo Math::add(1,2,3); //global function ... static makes something global - but can quickly become a problem if the static method or property calls other classes - makes it difficult to test


/* WRONG
class Person {
	public static $age =1;

	public function haveBirthday() {
		static::$age += 1;
}

$joe = new Person;
$joe->haveBirthday();

jane = new Person;
jane->haveBirthday();

echo Person::$age; // :: is scope resolution operator

*/
