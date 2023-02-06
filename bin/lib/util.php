<?php

namespace lib\util;

class util{
    private $characters;

    function __construct(){
        $this->characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*(){}:"?><,./;[]';

    }

    function __destruct(){

    }


    public function generateRandomString($length) {
        $charactersLength = strlen($this->characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $this->characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function getRandomNumber($min, $max) { // generating random number between min and max
        return mt_rand($min, $max);
    }

    function isValidEmail($email) { // check if email is valid
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }


}