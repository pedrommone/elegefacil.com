<?php

/*
* app/validators.php
*/

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[a-zA-Z]+$/u', $value);
});