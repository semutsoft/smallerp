<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

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
            $this->load->model('Mdl_perusahaan');
            $this->companyid = 1;
        } 
        
	public function index()
	{
            $data = array(
                'THEMES_PAGE'       => base_url('/themes/'.$this->themes),
                'SITE_URL'          => site_url(),
                'BASE_URL'          => base_url(),
                'TITLE_PAGE'                        => 'Settings',
                'TITLE_PAGE_DESC'                   => 'Change your account, users',
                
                'FORM_TITLE'                        => 'Profile Perusahaan',
                'FORM_NAME_ID'                      => 'company_form',
                'URL_FORM_SAVE'                     => site_url('settings/perusahaan/simpan'),
                
                'settings_active'           => 'active',
                'btn_data_perusahaan_active'        => 'bg-orange bg-orange-active',
                'btn_data_pengguna_active'          => 'bg-gray',
                'btn_data_transaksi_active'         => 'bg-gray',
                'btn_data_format_active'            => 'bg-gray',
                'btn_perusahaan_active'     => 'bg-orange-active',
                'btn_cabang_active'         => 'bg-gray',
            );
            
            $detail                     = $this->Mdl_perusahaan->getDetail($this->companyid);
            $data['FORM_FIELDS']        = $this->Mdl_perusahaan->getFormFields($detail);
            
            $data['PLUGINS_CSS']        = $this->parser->parse($this->themes.'/layout/common/form_plugins_css', $data, true);
            $data['PLUGINS_SCRIPT']     = $this->parser->parse($this->themes.'/layout/common/form_plugins_script', $data, true);
            $data['ADDON_SCRIPT']       = $this->parser->parse($this->themes.'/layout/common/form_script', $data, true);
            
            
            $data['LEFT_SECTION']       = $this->parser->parse('settings_menu_section', $data, true);
            $data['CENTER_SECTION']     = $this->parser->parse('perusahaan_menu_section', $data, true);
            $data['CENTER_SECTION']     .= $this->parser->parse($this->themes.'/layout/form/form', $data, true);
            $data['CONTENT_SECTION']    = $this->parser->parse($this->themes.'/layout/content/two_side_section', $data, true);
            $this->load->userLayout($data);
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
                    'status'    => 0,
                    'msg'       => strip_tags(json_encode(validation_errors()))
                );
            }
            else
            {
                $stat = $this->Mdl_perusahaan->EditData($this->companyid, $params);
                if ($stat){
                    $data = array(
                        'status'    => 1,
                        'msg'       => 'Success::Data Already Update'
                    );
                } else {
                    $data = array(
                        'status'    => 0,
                        'msg'       => 'Failed::Can not update to database'
                    );
                }
            }
            echo json_encode($data);
        }
}
