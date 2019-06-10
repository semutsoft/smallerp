<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_employee extends Mdl_utama {

    function __construct() {
        parent::__construct();
        $client_id = $this->session->userdata('client_id');
        $this->table = array(
            'name'      => 'mst_employee',
            'idkey'     => 'employee_id',
            'join'      => array(),
            'where'     => array(
                array('company_id', $client_id)
            ),
            'order'     => array(
                array('employee_name', 'asc'),
            )    
        );
    }
    
    
    
}    
