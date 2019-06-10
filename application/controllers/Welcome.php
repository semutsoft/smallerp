<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
            print_r($this->session->all_userdata());
            $login_id = $this->session->userdata('user_id');
            $this->load->model('Mdl_employee');
            $employee   = $this->Mdl_employee->getDetail($login_id);
            $this->session->set_userdata('fullname', $employee->employee_name);
            $this->session->set_userdata('avatar', $employee->photo);
            $this->session->set_userdata('position', $employee->employee_position);
            
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'TITLE_PAGE'        => 'Dashboard',
                'TITLE_PAGE_DESC'   => 'Halaman untuk membantu Monitoring',                
            );
            
            $data['CONTENT_SECTION']    ='';
            $data['PLUGINS_CSS']        = '';
            $data['PLUGINS_SCRIPT']     = '';
            $data['ADDON_SCRIPT']       = '';
            
            $this->load->userLayout($data);
	}
}
