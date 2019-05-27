<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            
            $this->load->model('Mdl_truck');
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                
                'TITLE_PAGE'                        => 'Jadual Trucking',
                'TITLE_PAGE_DESC'                   => 'Change your account, users',
                
                'jadual_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-orange bg-orange-active',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                'btn_perusahaan_active'     => 'bg-orange-active',
                'btn_cabang_active'         => 'bg-gray',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_truck->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_truck->getListFieldsData());
                        
            $data['LEFT_SECTION']       = $this->parser->parse('trucking_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('jadual_trucking_section', $data, true);
            $this->load->userListLayout($data);
	}
}
