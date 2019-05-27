<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $this->load->model('Mdl_laporan');
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                
                'TITLE_PAGE'                => 'Akuntansi',
                'TITLE_PAGE_DESC'           => 'Change your account, users',
                
                'akuntansi_active'          => 'active',
                'btn_monitoring_active'     => 'bg-orange bg-orange-active',
                'btn_laporan_active'        => 'bg-gray'
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_laporan->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_laporan->getListFieldsData());
                        
            $data['LEFT_SECTION']       = $this->parser->parse('akuntansi_menu_section', $data, true);
            $data['CENTER_SECTION']     = ''; //$this->parser->parse('jadual_trucking_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        
        
}
