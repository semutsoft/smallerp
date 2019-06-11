<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_vendor extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_vendor',
            'colomn'    => array(
                'vendor_code' => array('id'=>'vendor_code', 'label'=>'Code', 'key'=>true, 'visible'=>true, 'form'=>array(                                        
                    array('id'=>'vendor_code', 'label'=>'Code', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'vendor_name' => array('id'=>'vendor_name', 'label'=>'Name', 'key'=>true, 'visible'=>true, 'form'=>array(                                        
                    array('id'=>'vendor_name', 'label'=>'Name', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                
            ),
            'idkey'     => 'vendor_code',
            'join'      => array(),
            'where'     => array(),
            'order'     => array(
                array('vendor_code', 'asc'),
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
                $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->vendor_code.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->vendor_code.'"> <i class="fa fa-trash"></i>  Hapus</button>';
                
                $list[] = array(
                    'no'            => $no,
                    'vendor_code'   => $row->vendor_code,
                    'vendor_name'   => $row->vendor_name,
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

