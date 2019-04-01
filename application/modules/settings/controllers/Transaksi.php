<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $this->load->model('Mdl_pengaturan');
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-orange bg-orange-active',
                'btn_data_format_active'            => 'bg-gray',
                
                'btn_akses_transaksi_active'        => 'bg-orange bg-orange-active',
                'btn_design_cetakan_active'         => 'bg-gray',
                'btn_dashboard_active'              => 'bg-gray',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Transaksi',
                'TITLE_PAGE_DESC'                   => 'Transaksi',
                
                'LIST_TITLE'                        => 'Daftar Transaksi'
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_pengaturan->getListFields();
            
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/datatable_script', $data, true);
                        
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('transaksi_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
	}
        
        
        
        public function design()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-orange bg-orange-active',
                'btn_data_format_active'            => 'bg-gray',
                'btn_akses_transaksi_active'        => 'bg-gray',
                'btn_design_cetakan_active'         => 'bg-orange bg-orange-active',
                'btn_dashboard_active'              => 'bg-gray',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Design Cetakan',
                'TITLE_PAGE_DESC'                   => 'Design Cetakan',
                
                'LIST_TITLE'                        => 'Daftar Design Cetakan',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_pengaturan->getListFields();
            
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/datatable_script', $data, true);
                        
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('transaksi_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
	}
        
        
        public function dashboard()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-orange bg-orange-active',
                'btn_data_format_active'            => 'bg-gray',
                'btn_akses_transaksi_active'        => 'bg-gray',
                'btn_design_cetakan_active'         => 'bg-gray',
                'btn_dashboard_active'              => 'bg-orange bg-orange-active',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Dashboard Cetakan',
                'TITLE_PAGE_DESC'                   => 'Dashboard Cetakan',
                
                'LIST_TITLE'                        => '',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_pengaturan->getListFields();
            
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/datatable_script', $data, true);
                        
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('transaksi_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
	}
}
