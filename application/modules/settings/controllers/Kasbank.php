<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasbank extends CI_Controller {
    
        function __construct() {
            parent::__construct();
            $this->companyid = 1;
            $this->themes = $this->config->item('themes');
            $this->load->model('Mdl_kasbank');
        } 
        
        
        function form($id=0)
        {
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(), 
                'FORM_TITLE'                        => 'Cabang',
                'FORM_NAME_ID'                      => 'form-cabang-id',
                'URL_FORM_SAVE'                     => site_url('settings/cabang/simpan'),
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-orange bg-orange-active',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                'btn_perusahaan_active'             => 'bg-gray',
                'btn_cabang_active'                 => 'bg-orange-active',                
                'TITLE_PAGE'                        => 'Cabang',
                'TITLE_PAGE_DESC'                   => 'Cabang',                
                'LIST_TITLE'                        => 'Daftar Cabang',
            );
            
            if ($id > 0){
                $detail                     = $this->Mdl_cabang->getDetail($id);
            } else {
                $detail = array();
            }
            $data['FORM_FIELDS']        = $this->Mdl_cabang->getFormFields($detail);
            
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/form_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/form_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/form_script', $data, true);
                        
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('perusahaan_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
        }
        
        
        function getList()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_kasbank->getListData($params);
            echo json_encode($data);
        
        }
        
        
        function kasbank_getList()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_kasbank->getListData($params);
            echo json_encode($data);
        
        }
}        