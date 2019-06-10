<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->email = $this->session->userdata('email');
        
        if (empty($this->email)){
            redirect(site_url('users/login'), 'refresh');
        }
    }
    
    function index()
    {
        $this->session->sess_destroy();
        redirect(site_url(), 'refresh');
    }
}