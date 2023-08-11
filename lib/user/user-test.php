<?php

$_SERVER['DOCUMENT_ROOT'] = '../../';

var_dump($_SERVER['DOCUMENT_ROOT']);

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

// Crée un utilisateur avec des données random
function testCreate()
{
    Log::msg(PHP_EOL . '### ' . __FUNCTION__);

    $email = 'email.random@gmail.com ' . time();
    LibUser::createUser('Some FirstName', 'Some Name', $email, 'Some Password', 20);
}

// Exécute le test

testCreate();