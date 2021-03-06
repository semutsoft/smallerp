<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {
    
        function __construct() {
            parent::__construct();
            $this->companyid = 1;
            $this->themes = $this->config->item('themes');
            $this->load->model('Mdl_cabang');
             $this->companyid = $this->session->userdata('client_id');
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('settings/cabang/getlist'),
                'URL_FORM_REDIRECT'                 => site_url('settings/cabang/form'),
                'URL_FORM_SAVE'                     => site_url('settings/cabang/simpan'),
                'URL_FORM_DELETE'                   => site_url('settings/cabang/hapus'),                
                
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-orange bg-orange-active',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                'btn_perusahaan_active'             => 'bg-gray',
                'btn_cabang_active'                 => 'bg-orange-active',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Cabang',
                'TITLE_PAGE_DESC'                   => 'Cabang',
                
                'LIST_TITLE'                        => 'Daftar Cabang',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_cabang->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_cabang->getListFieldsData());
                       
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/datatable_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/datatable_script', $data, true);
                        
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('perusahaan_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/list/list', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
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
            $data = $this->Mdl_cabang->getListData($params);
            echo json_encode($data);
        }
        
        function simpan()
        {
            $params = $this->input->post();
            $this->load->library('form_validation');
            
            $fields = $this->Mdl_cabang->table['colomn'];
            
            foreach ($fields as $row):
                if (!empty($row['form'])){
                    
                    foreach($row['form'] as $form) :
                        if ($form['required']){
                            $this->form_validation->set_rules($form['id'], $form['label'], 'required');
                        }
                    endforeach;
                    
                }
            endforeach;
            
            
            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'status'        => 0,
                    'msg'           => 'Kesalahan Penginputan:: <br>' . strip_tags(json_encode(validation_errors()))
                );
            }
            else
            {
                $data = array(
                    'status'        => 0,
                    'msg'           => 'Gagal'
                );
                    
                
                if (($params['branch_id'] == 0)||(empty($params['branch_id']))){
                    //add new reocrd'
                    if ($this->Mdl_cabang->AddData($params)){
                        $data = array(
                            'status'        => 1,
                            'msg'           => 'Data Baru Berhasil Disimpan'
                        );
                    } else{
                        $data = array(
                            'status'        => 0,
                            'msg'           => 'Data Baru Gagal Disimpan'
                        );
                    };
                    
                } else {
                    //update new reocrd
                    $id = $params['branch_id'];
                    if ($this->Mdl_cabang->EditData($id, $params)){
                        $data = array(
                            'status'        => 1,
                            'msg'           => 'Data Berhasil Diubah'
                        );
                    } else {
                        $data = array(
                            'status'        => 0,
                            'msg'           => 'Data Gagal Diubah'
                        );
                    }
                }
            }
            echo json_encode($data);
        }
        
        
        function hapus()
        {
            $id = $this->input->post('id');
            $stat = $this->Mdl_cabang->DeleteData($id);
            if ($stat){
                $data = array(
                            'status'        => 1,
                            'msg'           => 'Sukses::Data berhasil di hapus'
                );
                        
            } else {
                $data = array(
                            'status'        => 0,
                            'msg'           => 'Gagal::Data tidak berhasil dihapus'
                );
                        
            }
            echo json_encode($data);
        }
        
}
