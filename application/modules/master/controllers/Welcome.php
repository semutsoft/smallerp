<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->themes = $this->config->item('themes');
            $this->load->model('Mdl_currency');
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                
                'URL_GET_DATALIST'                  => site_url('master/welcome/getlist'),
                'URL_FORM_REDIRECT'                 => site_url('master/welcome/form'),
                'URL_FORM_SAVE'                     => site_url('master/welcome/simpan'),
                'URL_FORM_DELETE'                   => site_url('master/welcome/delete'),   
                
                'TITLE_PAGE'                        => 'Persiapan Data',
                'TITLE_PAGE_DESC'                   => 'Prepare your master data before you use',
                
                'master_active'                  => 'active',
                'btn_data_akun_active'              => 'bg-orange bg-orange-active',
                'btn_data_mitra_active'             => 'bg-gray',
                'btn_data_tarif_exim_active'        => 'bg-gray',
                'btn_data_tarif_truck_active'       => 'bg-gray',
                'btn_data_kendaraan_active'         => 'bg-gray',
                'btn_data_lain_active'              => 'bg-gray',
                
                'btn_currency_active'               => 'bg-orange bg-orange-active',
                'btn_coa_active'                    => 'bg-gray',
                'btn_biaya_active'                  => 'bg-gray',
                'btn_job_active'                    => 'bg-gray'
            );
            
            $data['LIST_FIELDS']        = $this->Mdl_currency->getListFields();
            $data['LIST_FIELDS_DATA']   = json_encode($this->Mdl_currency->getListFieldsData());
                        
            $data['LEFT_SECTION']       = $this->parser->parse('master_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('data_akun_menu_section', $data, true);
            $this->load->userListLayout($data);
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
            
            $data['FORM_FIELDS']        = $this->Mdl_currency->getFormFields();
            
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('perusahaan_menu_section', $data, true);
            $this->load->userFormLayout($data);
        }   
        
        function getList()
        {
            $params     = $this->input->post();
            $data = $this->Mdl_currency->getListData($params);
            echo json_encode($data);
        }
        
        function simpan()
        {
            $params = $this->input->post();
            $this->load->library('form_validation');
            
            $fields = $this->Mdl_cabang->table['colomn'];
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
}
