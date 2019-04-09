<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            //$this->load->model('Mdl_perusahaan');
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'job_active'                   => 'active',
                
                'btn_monitoring_active'     => 'bg-orange bg-orange-active',
                'btn_quotation_active'      => 'bg-gray',
                'btn_order_active'          => 'bg-gray',
                'btn_loading_active'        => 'bg-gray',
                'btn_laporan_active'        => 'bg-gray',
                
                'TITLE_PAGE'                        => 'Job',
                'TITLE_PAGE_DESC'                   => 'Job',
                
            );
            
            //$data['FORM_FIELDS']        = $this->Mdl_perusahaan->getFormFields();
            
            
            $data['LEFT_SECTION']       = $this->parser->parse('job_menu_section', $data, true);
            $data['CENTER_SECTION']     = ''; //$this->parser->parse('perusahaan_menu_section', $data, true);
            
            $this->load->userListLayout($data);
	}
}
