<?php

require 'vendor/autoload.php';
require 'init.php';


$app = new App();

$columns = $app->add('Columns');

$left = $columns->addColumn();

$right = $columns->addColumn();

$right->add(['Message', 'Welcome to the party!', 'info'])->text
->addParagraph('Our party is using bring your own drink policiy so be sure to grab beer or lemonade');
$left->add('Form')->setModel(new Guest($app->db));
