<?php

// NOTE Pour exécuter ce script PHP dans VSCode,
// cliquer sur Run (CTRL+F5), puis choisir 'Run current script in Console'

// NOTE Pour exécuter les tests - qui n'ont pas de contexte 'web' -,
// il est possible de faire comme celà :
$_SERVER['DOCUMENT_ROOT'] = '../../';

require_once($_SERVER['DOCUMENT_ROOT'] . '/lib/user/user.php');

// Liste tous les Utilisateurs
function testReadAll()
{
    Log::msg(PHP_EOL . '### ' . __FUNCTION__);

    $listRole = LibUser::listRole();
    $i = 0;
    foreach ($listRole as $listRole) {

        // Affiche les 'entêtes de colonne' la première fois
        if ($i == 0) {
            $headers = implode(' | ', array_keys($listRole));
            Log::msg($headers);
        }

        // Affiche les valeurs
        $fields = implode(' | ', array_values($listRole));
        Log::msg($fields);

        $i++;
    }
}

function testFind($email, $password)
{
    Log::msg(PHP_EOL . '### ' . __FUNCTION__);

    $user = LibUser::find($email, $password);
    var_dump($user);
}

function testGet($id)
{
    Log::msg(PHP_EOL . '### ' . __FUNCTION__);

    $user = LibUser::get($id);
    var_dump($user);
}

function testCreate($email, $password, $idRole)
{

    Log::msg(PHP_EOL . '### ' . __FUNCTION__);

    $randomEmail = $email . time();
    LibUser::create($randomEmail, $password, $idRole);
}

// Liste tous les Rôles
function testListRole()
{
    Log::msg(PHP_EOL . '### ' . __FUNCTION__);

    $listRole = LibUser::listRole();
    $i = 0;
    foreach ($listRole as $role) {

        // Affiche les 'entêtes de colonne' la première fois
        if ($i == 0) {
            $headers = implode(' | ', array_keys($role));
            Log::msg($headers);
        }

        // Affiche les valeurs
        $fields = implode(' | ', array_values($role));
        Log::msg($fields);

        $i++;
    }
}

// --

// Exécute les tests
testReadAll();
testFind('jonh@free.fr', 'password123');
testFind('unknown', 'password123');
testCreate('email', '123', '10');
testListRole();
testGet(10);
