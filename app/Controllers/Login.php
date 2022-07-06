<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function novo()
    {

        $data = [
            'titulo' => 'Lealize o login',
        ]; 

        return view('Login/novo', $data);
    }
}
