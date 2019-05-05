<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_vendor extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_vendor',
            'colomn'    => array(
                'coa_no'       => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(
                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                
                'id_sup' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        
                    array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kd_sup' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        
                    array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'nm_sup' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        
                    array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'nm_sup1' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        
                    array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'nm_sup2' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'no_ap' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'nm_ap' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'tg_mas' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'id_s' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'id_t' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'id_f' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'id_k' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))),
                'alamat' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'al_pjk' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'al_kir' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'prop' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'kota' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'kd_pos' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'telp' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'hp' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'kontak' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'fax' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'web' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'email' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'kd_apgro' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'nm_apgro' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'kd_area' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'nm_area' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'hut_awa' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'cr_jou' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'db_jou' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))),
                'hut_rp' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'tk' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'tempo' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'cr_lim' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'sisa_lim' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'st_akt' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'cbank' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'nm_gir' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'rek' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'atas' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'npwp' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'pkp' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'tg_pkp' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'ppn' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'inc_ppn' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'pph23' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'cur_code' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'cur_rate' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'tax_rate' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'kd_hc' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'nm_hc' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'hc' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        
                    array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))),
                'kd_dv' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'nm_dv' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'dv' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'status' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'id_use' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'kd_use2' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'kd_use' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'st_ohr' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'st_oht' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'time_entry' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))) ,
                'last_update' => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kelompok'=> array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(
                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10')))

            ),
            'idkey'     => 'coa_no',
            'join'      => array(),
            'where'     => array(),
            'order'     => array('coa_no', 'asc'),
        );
    }
    
    function getListData($params)
    {
        $data_array = $this->getList($params);
        
        if ($data_array['filter'] == 0){
                $list_array = array();
            } else {
                $list_array = $data_array['results'];
        }
        
        $list = array();
        if ($data_array['filter'] > 0 ){
            $no = 1;
            foreach($data_array['results'] as $row):
                $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->coa_no.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->coa_no.'"> <i class="fa fa-trash"></i>  Hapus</button>';
                if ($row->type == 1){
                    $type = 'AKTIF';
                } else {
                    $type = 'TIDAK AKTIF';
                }
                
                $list[] = array(
                    'no'            => $no,
                    'coa_no'        => $row->coa_no,
                    'coa_name'      => $row->coa_name,
                    'type'          => $type,
                    'actions'       => $button
                );
                $no++;
            endforeach;
        }
        
        $data = array(
                //'msg'               => $data_array['msg'],
                "draw"              => $params['draw'],
                "recordsTotal"      => $data_array['total'],
                "recordsFiltered"   => $data_array['filter'],
                "data"              => $list
        );
        return $data;
    }
}

