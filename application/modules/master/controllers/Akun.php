<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            
        } 
        
	public function currency()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'master_active'                   => 'active',
                'btn_data_akun_active'              => 'bg-orange bg-orange-active',
                'btn_data_mitra_active'             => 'bg-gray',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_currency_active'               => 'bg-orange bg-orange-active',
                'btn_coa_active'                    => 'bg-gray',
                'btn_biaya_active'                  => 'bg-gray',
                'btn_job_active'                    => 'bg-gray',
                
            );
            
            //$data['FORM_FIELDS']        = $this->Mdl_perusahaan->getFormFields();
            
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_akun_menu_section', $data, true);
            
            $this->load->userListLayout($data);
	}
        
        public function coa()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'settings_active'                   => 'active',
                'btn_data_akun_active'              => 'bg-orange bg-orange-active',
                'btn_data_mitra_active'             => 'bg-gray',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_currency_active'               => 'bg-gray',
                'btn_coa_active'                    => 'bg-orange bg-orange-active',
                'btn_biaya_active'                  => 'bg-gray',
                'btn_job_active'                    => 'bg-gray'
            );
            
            //$data['FORM_FIELDS']        = $this->Mdl_perusahaan->getFormFields();
            
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_akun_menu_section', $data, true);
            
            $this->load->userListLayout($data);
	}
        
        public function biaya()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'master_active'                   => 'active',
                'btn_data_akun_active'              => 'bg-orange bg-orange-active',
                'btn_data_mitra_active'             => 'bg-gray',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_currency_active'               => 'bg-gray',
                'btn_coa_active'                    => 'bg-gray',
                'btn_biaya_active'                  => 'bg-orange bg-orange-active',
                'btn_job_active'                    => 'bg-gray'
            );            
            //$data['FORM_FIELDS']        = $this->Mdl_perusahaan->getFormFields();
            
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_akun_menu_section', $data, true);
            
            $this->load->userListLayout($data);
	}
        
        public function job()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'master_active'                   => 'active',
                'btn_data_akun_active'              => 'bg-orange bg-orange-active',
                'btn_data_mitra_active'             => 'bg-gray',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_currency_active'               => 'bg-gray',
                'btn_coa_active'                    => 'bg-gray',
                'btn_biaya_active'                  => 'bg-gray',
                'btn_job_active'                    => 'bg-orange bg-orange-active'
            );
            
            //$data['FORM_FIELDS']        = $this->Mdl_perusahaan->getFormFields();
                        
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_akun_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
}
