<?php


require 'init.php';


$app = new App(true);

$app->add('\atk4\schema\MigratorConsole')
    ->migrateModels([
        new \atk4\login\Model\User($app->db), 
        
    ]);




$app->add('CRUD')->setModel(new \atk4\login\Model\User($app->db));
