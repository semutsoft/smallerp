<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_pengaturan extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'perusahaan',
            'colomn'    => array(
            ),
            
        );
    }


    function index()
    {
        return $data;
    }
    
    
}   