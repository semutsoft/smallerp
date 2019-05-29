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
    
    function getListMaster($code)
    {
        $params = array();
        $this->table['where'][] = array('CHAR_LENGTH(coa_no)', 1);
        $data_array = $this->getList($params);
        $data = array();
        foreach($data_array['results'] as $row):
            
            if ($code != 0){
                
                if ($row->coa_no == $code){
                    $btn_class = 'btn-warning';
                } else {
                    $btn_class = 'btn-info';
                }
            }
            
            $data[] = array(
                'coa_name'  => $row->coa_name,
                'btn_class' => $btn_class,
                'link'      => site_url('master/akun/coa/'.$row->coa_no)
            );
        endforeach;
        return $data;
    }
    
    
    function getListData($params)
    {
        $this->table['where'][] = array('SUBSTRING(coa_no, 1,1) =', $params['code']);
        
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
