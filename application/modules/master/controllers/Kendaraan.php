<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $this->load->model('Mdl_truck');
            
        } 
        
	public function index()
	{
            $this->load->model('Mdl_tarrif');
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('master/kendaraan/getlist'),
                'URL_FORM_REDIRECT'                 => site_url('master/kendaraan/form'),
                'URL_FORM_SAVE'                     => site_url('master/kendaraan/simpan'),
                'URL_FORM_DELETE'                   => site_url('master/kendaraan/delete'),
                
                'settings_active'                   => 'active',
                'btn_data_akun_active'              => 'bg-gray',
                'btn_data_mitra_active'             => 'bg-gray',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-orange bg-orange-active',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_kendaraan_active'              => 'bg-orange bg-orange-active',
                'btn_chasis_active'                 => 'bg-gray',
                'btn_servis_active'                 => 'bg-gray',
                
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_truck->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_truck->getListFieldsData());
                                    
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('kendaraan_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        public function chasis()
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
                'btn_data_kendaraan_active'         => 'bg-orange bg-orange-active',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_kendaraan_active'              => 'bg-gray',
                'btn_chasis_active'                 => 'bg-orange bg-orange-active',
                'btn_servis_active'                 => 'bg-gray',
                
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_tarrif->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_tarrif->getListFieldsData());
                                    
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('kendaraan_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        public function servis()
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
                'btn_data_kendaraan_active'         => 'bg-orange bg-orange-active',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_kendaraan_active'              => 'bg-gray',
                'btn_chasis_active'                 => 'bg-gray',
                'btn_servis_active'                 => 'bg-orange bg-orange-active',
                
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_tarrif->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_tarrif->getListFieldsData());
                                    
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('kendaraan_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
}
