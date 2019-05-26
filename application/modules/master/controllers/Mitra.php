<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $this->load->model('Mdl_vendor');
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'LIST_TITLE'                        => 'Kustomer',
                'master_active'                     => 'active',
                'btn_data_akun_active'              => 'bg-gray',
                'btn_data_mitra_active'             => 'bg-orange bg-orange-active',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_customer_active'               => 'bg-orange bg-orange-active',
                'btn_vendor_active'                 => 'bg-gray',
                'btn_employee_active'               => 'bg-gray',
                'btn_dept_active'                   => 'bg-gray',
                'btn_ship_active'                   => 'bg-gray',
                'btn_harbour_active'                => 'bg-gray',
                
                'TITLE_PAGE'                        => 'Kustomer',
                'TITLE_PAGE_DESC'                   => 'Kustomer',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_vendor->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_vendor->getListFieldsData());
                                    
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_mitra_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        public function vendor()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'LIST_TITLE'                        => 'Vendor',
                'master_active'                     => 'active',
                'btn_data_akun_active'              => 'bg-gray',
                'btn_data_mitra_active'             => 'bg-orange bg-orange-active',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_customer_active'               => 'bg-gray',
                'btn_vendor_active'                 => 'bg-orange bg-orange-active',
                'btn_employee_active'               => 'bg-gray',
                'btn_dept_active'                   => 'bg-gray',
                'btn_ship_active'                   => 'bg-gray',
                'btn_harbour_active'                => 'bg-gray',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_vendor->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_vendor->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_mitra_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        public function employee()
	{
            $this->load->model('Mdl_employee');
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'LIST_TITLE'                        => 'Karyawan',
            
                'master_active'                     => 'active',
                'btn_data_akun_active'              => 'bg-gray',
                'btn_data_mitra_active'             => 'bg-orange bg-orange-active',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_customer_active'               => 'bg-gray',
                'btn_vendor_active'                 => 'bg-gray',
                'btn_employee_active'               => 'bg-orange bg-orange-active',
                'btn_dept_active'                   => 'bg-gray',
                'btn_ship_active'                   => 'bg-gray',
                'btn_harbour_active'                => 'bg-gray',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_employee->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_employee->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_mitra_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        
        public function dept()
	{
            $this->load->model('Mdl_dept');
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'LIST_TITLE'                        => 'Bagian/Divisi/Dept',
            
                'master_active'                     => 'active',
                'btn_data_akun_active'              => 'bg-gray',
                'btn_data_mitra_active'             => 'bg-orange bg-orange-active',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_customer_active'               => 'bg-gray',
                'btn_vendor_active'                 => 'bg-gray',
                'btn_employee_active'               => 'bg-gray',
                'btn_dept_active'                   => 'bg-orange bg-orange-active',
                'btn_ship_active'                   => 'bg-gray',
                'btn_harbour_active'                => 'bg-gray',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_dept->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_dept->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_mitra_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        public function ship()
	{
            $this->load->model('Mdl_boat');
            
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'LIST_TITLE'                        => 'Kapal',
                'master_active'                     => 'active',
                'btn_data_akun_active'              => 'bg-gray',
                'btn_data_mitra_active'             => 'bg-orange bg-orange-active',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_customer_active'               => 'bg-gray',
                'btn_vendor_active'                 => 'bg-gray',
                'btn_employee_active'               => 'bg-gray',
                'btn_dept_active'                   => 'bg-gray',
                'btn_ship_active'                   => 'bg-orange bg-orange-active',
                'btn_harbour_active'                => 'bg-gray',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_boat->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_boat->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_mitra_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        public function harbour()
	{
            $this->load->model('Mdl_harbour');
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'LIST_TITLE'                        => 'Pelabuhan',
            
                'master_active'                     => 'active',
                'btn_data_akun_active'              => 'bg-gray',
                'btn_data_mitra_active'             => 'bg-orange bg-orange-active',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_customer_active'               => 'bg-gray',
                'btn_vendor_active'                 => 'bg-gray',
                'btn_employee_active'               => 'bg-gray',
                'btn_dept_active'                   => 'bg-gray',
                'btn_ship_active'                   => 'bg-gray',
                'btn_harbour_active'                => 'bg-orange bg-orange-active',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_harbour->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_harbour->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_mitra_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
}
