<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_coa extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_coa',
            'colomn'    => array(
                'coa_no'       => array('id'=>'coa_no', 'label'=>'COA', 'key'=>true, 'visible'=>true, 'form'=>array(
                                        array('id'=>'coa_no', 'label'=>'COA', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'coa_name'     => array('id'=>'coa_name', 'label'=>'Name', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'coa_name', 'label'=>'Name', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'type'          => array('id'=>'type', 'label'=>'Status', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'type', 'label'=>'Status', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                
            ),
            'idkey'     => 'coa_no',
            'join'      => array(),
            'where'     => array(),
            'order'     => array( 
                array('coa_no', 'asc'),
            )    
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
