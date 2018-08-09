<?php

require 'vendor/autoload.php';
require 'init.php';


$app = new App();

$columns = $app->add('Columns');

$left = $columns->addColumn();

$right = $columns->addColumn();

$right->add(['Message', 'Welcome to the party!', 'info'])->text
->addParagraph('Our party is using bring your own drink policiy so be sure to grab beer or lemonade');

$form = $left->add('Form');
$form->setModel(new Guest($app->db));
$form->onSubmit(function($form){

    $form->model->save();

        $sid = "AC6e6836737bd65077a44cdc50b4a155ea"; // Your Account SID from www.twilio.com/console
        $token = "744a30f455693a1950012ec95e0b1bf0"; // Your Auth Token from www.twilio.com/console

        $client = new Twilio\Rest\Client($sid, $token);
        $message = $client->messages->create(
        '+359893384309', // Text this number
        array(
            'from' => '+12403173840', // From a valid Twilio number
            'body' => 'Guest ' . $form->model['name']. ' will be coming'
        )
        );



        return $form->success('Thank you we will wait for you ' .$form->model['name']);

});

