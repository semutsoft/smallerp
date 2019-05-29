<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $this->load->model('Mdl_customer');
            $this->load->model('Mdl_vendor');
            
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('master/mitra/getlist'),
                'URL_FORM_REDIRECT'                 => site_url('master/mitra/form'),
                'URL_FORM_SAVE'                     => site_url('master/mitra/simpan'),
                'URL_FORM_DELETE'                   => site_url('master/mitra/delete'),   
                
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
            
            $data['LIST_FIELDS']        = $this->Mdl_customer->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_customer->getListFieldsData());
                                    
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_mitra_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        
        function getList()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_customer->getListData($params);
            echo json_encode($data);
        }
        
        
        public function vendor()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('master/mitra/getlistvendor'),
                'URL_FORM_REDIRECT'                 => site_url('master/mitra/form_vendor'),
                'URL_FORM_SAVE'                     => site_url('master/mitra/simpan_vendor'),
                'URL_FORM_DELETE'                   => site_url('master/mitra/delete_vendor'),
                
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
        
        function getListVendor()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_vendor->getListData($params);
            echo json_encode($data);
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
