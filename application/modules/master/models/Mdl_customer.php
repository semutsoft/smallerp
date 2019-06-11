<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_customer extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_customers',
            'colomn'    => array(
                'customer_code'     => array('id'=>'customer_code', 'label'=>'Customer Code', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'customer_code', 'label'=>'Customer Code', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Customer Code', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'customer_name'     => array('id'=>'customer_name', 'label'=>'Customer Name', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'customer_name', 'label'=>'Customer Name', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Customer Name', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'customer_address'  => array('id'=>'customer_address', 'label'=>'Customer Address', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'customer_address', 'label'=>'Customer Address', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Customer Address', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'customer_city'     => array('id'=>'customer_city', 'label'=>'Customer City', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'customer_city', 'label'=>'Customer City', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Customer City', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'province'          => array('id'=>'province', 'label'=>'Propinsi', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'province', 'label'=>'Propinsi', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Propinsi', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'zip_postal'        => array('id'=>'zip_postal', 'label'=>'Kode Pos', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'zip_postal', 'label'=>'Kode Pos', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Kode Pos', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'phone'             => array('id'=>'phone', 'label'=>'Telp.', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'phone', 'label'=>'Telp.', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Customer Address', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'fax'               => array('id'=>'fax', 'label'=>'Fax.', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'fax', 'label'=>'Fax.', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Customer Address', 'required'=>false, 'col_css'=>'col-md-10'))), 
                
            ),
            'idkey'     => 'customer_code',
            'join'      => array(),
            'where'     => array(),
            'order'     => array(
                array('customer_code', 'asc'),
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
                $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->customer_code.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->customer_code.'"> <i class="fa fa-trash"></i>  Hapus</button>';
                
                
                
                $list[] = array(
                    'no'                => $no,
                    'customer_code'     => $row->customer_code,
                    'customer_name'     => $row->customer_name,
                    'customer_address'  => $row->customer_address,
                    'customer_city'     => $row->customer_city,
                    'province'          => $row->province,
                    'zip_postal'        => $row->zip_postal,
                    'phone'             => $row->phone,
                    'fax'               => $row->fax,
                    'actions'           => $button
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

