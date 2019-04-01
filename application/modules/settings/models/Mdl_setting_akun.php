<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_setting_akun extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'settingz',
            'colomn'    => array(),
        );
    }
    
    
}    

