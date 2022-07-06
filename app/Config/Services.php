<?php

namespace Config;

use CodeIgniter\Config\BaseService;

class Services extends BaseService
{
    
      public static function autenticacao($getShared = true){

        if ($getShared) {
            return static::getSharedInstance('Autenticacao');
        }
     
          return new \App\Libraries\Autenticacao; 
      }
     
}
