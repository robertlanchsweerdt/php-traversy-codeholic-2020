<?php

require_once('Person.php');
require_once('Student.php');

// create instance
$person = new Person();

// assign value to the class property
// this is not efficient way to assign values
$person->name = 'Ted';
$person->surname = "Ruffles";

echo '<pre>';
var_dump($person);
echo '</pre>';

// normal to pass values to the class
// where the constructor handles value assignment
$p2 = new PersonConst('Mike','Rowe', true);

// use 'setter' to set the private property's value ($age)
$p2->setAge(33);

echo '<pre>';
var_dump($p2);
echo '</pre>';

// use 'getter' to display private property value ($age)
echo $p2->getAge() . '</br>';

// access the public static function (counter)
// using double-colon to access the static property for the class
// remember, static belongs to the Class and not the instance
echo PersonConst::getCounter();

// instantiating the inheritance class Student
$student = new Student("Marty","Vaughn",true,1234);
$student->setAge(18);

echo '<pre>';
var_dump($student);
echo '</pre>';

echo $student->getEmployed();