<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
            parent::__construct();
            $this->companyid = 1;
            $this->themes = $this->config->item('themes');
            $this->load->Model('Mdl_users');
            $this->load->Model('Mdl_employee');
            $this->load->Model('Mdl_dept');
            $this->load->Model('Mdl_position');
        }   
            
            
	public function index()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('settings/users/getlist'),
                'URL_FORM_REDIRECT'                 => site_url('settings/users/form'),
                'URL_FORM_SAVE'                     => site_url('settings/users/simpan'),
                'URL_FORM_DELETE'                   => site_url('settings/users/delete'),     
                
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-orange bg-orange-active',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                
                'btn_pengguna_active'               => 'bg-orange-active',
                'btn_karyawan_active'               => 'bg-gray',                
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Pengguna',
                'TITLE_PAGE_DESC'                   => 'Pengguna',                
                'LIST_TITLE'                        => 'Daftar Pengguna',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_users->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_users->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('pengguna_menu_section', $data, true);
            
            $this->load->userListLayout($data);
	}
        
        function getList()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_users->getListData($params);
            echo json_encode($data);
        }
        
        function form($id=0)
        {
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'FORM_TITLE'        => 'Pengguna',
                'TITLE_PAGE'        => 'Pengguna',
                'TITLE_PAGE_DESC'   => 'Form Data Pengguna',
                'FORM_NAME_ID'                      => 'form-user-id',
                'URL_FORM_SAVE'                     => site_url('settings/users/simpan'),
                   
                'settings_active'                   => 'active',
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-orange bg-orange-active',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                'btn_perusahaan_active'             => 'bg-gray',
                'btn_cabang_active'                 => 'bg-orange-active',                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Pengguna',
                'TITLE_PAGE_DESC'                   => 'Pengguna',                
                'LIST_TITLE'                        => 'Daftar Pengguna',
            );
            
            if ($id > 0){
                $detail                     = $this->Mdl_users->getDetail($id);
            } else {
                $detail = array();
            }
            
            $data['FORM_FIELDS']        = $this->Mdl_users->getFormFields($detail);
            
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('pengguna_menu_section', $data, true);
                    
            $this->load->userFormLayout($data);
        }
        
        
        function simpan()
        {
            $params = $this->input->post();
            $this->load->library('form_validation');
            
            $fields = $this->Mdl_users->table['colomn'];
            foreach ($fields as $row):
                $this->form_validation->set_rules($row['id'], $row['label'], 'required');
            endforeach;
            
            
            if ($this->form_validation->run() == FALSE)
            {
                $data = array(
                    'status'        => 0,
                    'msg'           => 'Kesalahan Penginputan:: ' . json_encode(validation_errors())
                );
            }
            else
            {
                $data = array(
                    'status'        => 0,
                    'msg'           => 'Gagal'
                );
                    
                
                if (($params['user_id'] == 0)||(empty($params['user_id']))){
                    //add new reocrd'
                    if ($this->Mdl_users->AddData($params)){
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
                    $id = $params['user_id'];
                    if ($this->Mdl_users->EditData($id, $params)){
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
        
        
        public function employee()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('settings/users/getlistemployee'),
                'URL_FORM_REDIRECT'                 => site_url('settings/users/formemployee'),
                'URL_FORM_SAVE'                     => site_url('settings/users/simpanemployee'),
                'URL_FORM_DELETE'                   => site_url('settings/users/deleteemployee'),     
                
                'settings_active'                   => 'active',
                
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-orange bg-orange-active',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                
                'btn_pengguna_active'               => 'bg-gray',
                'btn_karyawan_active'               => 'bg-orange-active',                
                'btn_dept_active'                   => 'bg-gray',
                'btn_position_active'               => 'bg-gray',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Karyawan',
                'TITLE_PAGE_DESC'                   => 'Karyawan',                
                'LIST_TITLE'                        => 'Daftar Karyawan',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_employee->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_employee->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('pengguna_menu_section', $data, true);
            
            $this->load->userListLayout($data);
	}
        
        function getListEmployee()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_employee->getListData($params);
            echo json_encode($data);
        }
        
        public function dept()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('settings/users/getlistemployee'),
                'URL_FORM_REDIRECT'                 => site_url('settings/users/formemployee'),
                'URL_FORM_SAVE'                     => site_url('settings/users/simpanemployee'),
                'URL_FORM_DELETE'                   => site_url('settings/users/deleteemployee'),     
                
                'settings_active'                   => 'active',
                
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-orange bg-orange-active',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                
                'btn_pengguna_active'               => 'bg-gray',
                'btn_karyawan_active'               => 'bg-gray',                
                'btn_dept_active'                   => 'bg-orange-active',
                'btn_position_active'               => 'bg-gray',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Karyawan',
                'TITLE_PAGE_DESC'                   => 'Karyawan',                
                'LIST_TITLE'                        => 'Daftar Karyawan',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_dept->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_dept->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('pengguna_menu_section', $data, true);
            
            $this->load->userListLayout($data);
	}
        
        function getListDept()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_dept->getListData($params);
            echo json_encode($data);
        }
        
        public function position()
	{
            $data = array(
                'THEMES_PAGE'   => base_url('/themes/'.$this->themes),
                'SITE_URL'                          => site_url(),
                'BASE_URL'                          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('settings/users/getlistemployee'),
                'URL_FORM_REDIRECT'                 => site_url('settings/users/formemployee'),
                'URL_FORM_SAVE'                     => site_url('settings/users/simpanemployee'),
                'URL_FORM_DELETE'                   => site_url('settings/users/deleteemployee'),     
                
                'settings_active'                   => 'active',
                
                'btn_data_perusahaan_active'        => 'bg-gray',
                'btn_data_pengguna_active'          => 'bg-orange bg-orange-active',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                
                'btn_pengguna_active'               => 'bg-gray',
                'btn_karyawan_active'               => 'bg-gray',     
                'btn_dept_active'                   => 'bg-gray',
                'btn_position_active'               => 'bg-orange-active',
                
                'WEB_TITLE'                         => 'Small ERP :: SeMUTSoft @ 2019',
                'TITLE_PAGE'                        => 'Karyawan',
                'TITLE_PAGE_DESC'                   => 'Karyawan',                
                'LIST_TITLE'                        => 'Daftar Karyawan',
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_position->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_position->getListFieldsData());
            
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('pengguna_menu_section', $data, true);
            
            $this->load->userListLayout($data);
	}
        
        function getListPosition()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_position->getListData($params);
            echo json_encode($data);
        }
}
