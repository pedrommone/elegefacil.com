<?php

/*
* app/validators.php
*/

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[A-Za-z\s]+$/u', $value);
});