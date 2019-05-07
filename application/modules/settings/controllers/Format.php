<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Format extends CI_Controller {

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
            $this->load->model('Mdl_kasbank');
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
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-orange bg-orange-active',
                
                'btn_transaksi_active'              => 'bg-orange bg-orange-active',
                'btn_kas_bank_active'               => 'bg-gray',
                'btn_saldo_awal_active'             => 'bg-gray',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Transaksi',
                'TITLE_PAGE_DESC'                   => 'Transaksi',
                
                'LIST_TITLE'                        => 'Daftar Transaksi',
                
            );
            
            //$data['LIST_FIELDS']        = $this->Mdl_pengaturan->getListFields();
            
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/datatable_script', $data, true);
                        
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('format_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
	}
        
        public function kas_bank()
	{
            $data = array(
                'THEMES_PAGE'                       => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('settings/kasbank/getlist'),
                'URL_FORM_REDIRECT'                 => site_url('settings/format/kasbank_form'),
                'URL_FORM_SAVE'                     => site_url('settings/format/kasbank_simpan'),
                'URL_FORM_DELETE'                   => site_url('settings/format/kasbank_delete'),  
                
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-orange bg-orange-active',
                
                'btn_transaksi_active'              => 'bg-gray',
                'btn_kas_bank_active'               => 'bg-orange bg-orange-active',
                'btn_saldo_awal_active'             => 'bg-gray',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Kas Bank',
                'TITLE_PAGE_DESC'                   => 'Kas Bank',
                
                'LIST_TITLE'                        => 'Daftar Kas Bank',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_kasbank->getListFields();
            
            
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('format_menu_section', $data, true);
            $this->load->userListLayout($data);
	}
        
        function kasbank_getList()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_kasbank->getListData($params);
            echo json_encode($data);
        }
        
        public function saldo_awal()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-orange bg-orange-active',
                
                'btn_transaksi_active'              => 'bg-gray',
                'btn_kas_bank_active'               => 'bg-gray',
                'btn_saldo_awal_active'             => 'bg-orange bg-orange-active',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Saldo Awal',
                'TITLE_PAGE_DESC'                   => 'Saldo Awal',
                
                'LIST_TITLE'                        => 'Saldo Awal',
                
            );
            
            //$data['LIST_FIELDS']        = $this->Mdl_pengaturan->getListFields();
            
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/datatable_script', $data, true);
                        
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('format_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
	}
}
