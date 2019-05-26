<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lain extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
        } 
        
	public function index()
	{
            $this->load->model('Mdl_tarrif');
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'settings_active'                   => 'active',
                'btn_data_akun_active'              => 'bg-gray',
                'btn_data_mitra_active'             => 'bg-gray',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-orange bg-orange-active',
                
                'btn_vendor_active'                 => 'bg-gray',
                'btn_internal_active'               => 'bg-orange bg-orange-active',                
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_tarrif->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_tarrif->getListFieldsData());
                                    
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('lain_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
}
