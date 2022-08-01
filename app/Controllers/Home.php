<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }


    public function email(){


            $email = \Config\Services::email();

            $email->setFrom('antoniodaleofx@gmail.com', 'Antonio Daleo');
            $email->setTo('yekem70704@opude.com');
            $email->setCC('antoniodaleo@outlook.com');
            $email->setBCC('them@their-example.com');

            $email->setSubject('Email Test');
            $email->setMessage('Testing the email class.');

            if($email->send()){
                echo 'Email invalido'; 
            }else{
                echo $email->printDebugger(); 
            }

           // $email->send();
    }

}
