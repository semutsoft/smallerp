<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_setting_transaksi extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'master_transaksi',
            'colomn'    => array(
                ''
            ),
            
        );
    }


    function index()
    {
        return $data;
    }
    
    
}   