<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_users extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'users',
            'colomn'    => array(
                
            )
        );
    }

}    