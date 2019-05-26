<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $email = $this->session->userdata('email');
            if (!empty($email)){
                redirect(site_url(), 'refresh');
            }
        } 
        
	public function index()
	{
            print_r($this->session->all_userdata());
            $data = array(
                'WEB_TITLE'         => 'SeMUTSOft::Forwarding and Trcuking System ',
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'URL_CHECKLOGIN'    => site_url('users/login/checklogin'),
                'URL_RESETPASSWORD' => site_url('users/reset'),
                'URL_REGISTER'      => site_url('users/register'),
            );
            $this->parser->parse($this->themes.'/layout/form/login', $data);
	}
        
        function checklogin()
        {
            $params = $this->input->post();
            
            $data = array(
                'status'    => 0,
                'msg'       => ''
            );
            
            if (!empty($params)){
                $this->load->model('Mdl_client');
                $result = $this->Mdl_client->checklogin($params);
                if ($result['status']){
                    $data = array(
                        'status'    => 1,
                        'msg'       => 'Success:: Please Wait...!!!',
                        'log_query' => $result['log_query']
                    );
                } else {
                    $data = array(
                        'status'    => 0,
                        'msg'       => 'Failed:: Account Not Found...!!!',
                        'log_query' => $result['log_query']
                    );
                }
            } else {
                $data = array(
                        'status'    => 0,
                        'msg'       => 'Error:: Form can not empty...!!!',
                        'log_query' => ''
                );
            }
            
            echo json_encode($data);
        }
}
