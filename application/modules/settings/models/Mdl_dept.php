<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_dept extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_company_branch',
        );
    }
}    