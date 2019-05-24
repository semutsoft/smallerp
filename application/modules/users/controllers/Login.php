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
        } 
        
	public function index()
	{
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
            
            if (!empty($params)){
                $this->load->model('Mdl_client');
                $status = $this->Mdl_client->checklogin($params);
                if ($status){
                    redirect(site_url(), 'refresh');
                } else {
                    redirect(site_url('users/login'), 'refresh');
                }
            } else {
                redirect(site_url('users/login'), 'refresh');
            }
        }
}
