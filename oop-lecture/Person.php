<?php

// create class
class Person {
    /*
        properties with access modifiers

        three types of access modifiers:
        1. public
        2. private
        3. protected: more relevant during inheritance
    */
    public $name;
    public $surname;
    private $age;

    // note 'static' properties belong to the class and 
    // NOT the instance

    public static $counter = 0;
}

// create class with constructor
class PersonConst {
    /*
        properties with access modifiers

        three types of access modifiers:
        1. public
        2. private: use setters and getters for the property
        3. protected: more relevant during inheritance
    */
    public string $name;
    public string $surname;
    private ?int $age;
    protected bool $employed;

        // note 'static' properties belong to the class and 
        // NOT the instance

    public static int $counter = 0;

    /**
     * constructor handles value assignment to each property.
     * the constructor is immediately executed when the 
     * class is created.
     */

    public function __construct($name, $surname, $employed)
    // 'this' corresponds to the instance variable
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->age = null;
        $this->setEmployed($employed);

        // access static properties using double-colon (::)
        // whenever the constructor is instantiated, the counter
        // property is incrementing (++)
        self::$counter++;
    }

    // can also create methods / functions assigned to the class.
    //
    // common to use 'setters' and 'getters' when the property
    // modifier is private (in this case $age is private) to
    // 'set' and 'get' the property's value.  this is because
    // a 'private' property cannot be accessed outside of the class.
    public function setAge($age){
        $this->age = $age;
    }

    // 'getter' function for the private property
    public function getAge(){
        return $this->age;
    }

    public function setEmployed($employed){
        $this->employed = $employed;
    }

    public function getEmployed(){
        return $this->employed;
    }


    // create a public static function
    public static function getCounter(){
        return self::$counter;
    }
}