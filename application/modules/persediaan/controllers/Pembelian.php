<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

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
                
                'TITLE_PAGE'                        => 'Persediaan',
                'TITLE_PAGE_DESC'                   => 'Change your account, users',
                
                'persediaan_active'             => 'active',
                'btn_monitoring_active'         => 'bg-gray',
                'btn_pembelian_active'          => 'bg-orange bg-orange-active',
                'btn_retur_active'              => 'bg-gray',
                'btn_stock_active'              => 'bg-gray',
                'btn_penyesuaian_active'        => 'bg-gray',
                'btn_laporan_active'            => 'bg-gray',
            );
            
            //$data['FORM_FIELDS']        = $this->Mdl_perusahaan->getFormFields();
            
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/form_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/form_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/form_script', $data, true);
            
            
            $data['LEFT_SECTION']       = $this->parser->parse('persediaan_menu_section', $data, true);
            $data['CENTER_SECTION']     = ''; //$this->parser->parse('perusahaan_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
	}
}
