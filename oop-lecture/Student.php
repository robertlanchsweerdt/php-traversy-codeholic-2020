<?php

/**
 * Demonstration of inheritance
 */

 require_once('Person.php');

 class Student extends PersonConst {
    public int $studentId;

    public function __construct($name,$surname,$employed,$studentId){
        parent::__construct($name,$surname, $employed);

        $this->studentId = $studentId;

    }
 }