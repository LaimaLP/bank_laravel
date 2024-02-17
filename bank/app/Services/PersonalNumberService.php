<?php

namespace App\Services;
 class PersonalNumberService{
    private $code;
   
    public function __construct($code)
    {
        $this->code = $code;
    }


    public function validPersonalCode() :bool{
        $code = $this->code;
        if (!is_numeric($code) || strlen($code) != 11) {
            return false;
        }

        $year = substr($code, 1, 2);
        $month = substr($code, 3, 2);
        $day = substr($code, 5, 2);
   
        if (!checkdate($month, $day, $year)) {
            return false;
        }

        return true;

    }
 }