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
                'vendor_address'  => array('id'=>'vendor_address', 'label'=>'VendorAddress', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'vendor_address', 'label'=>'VendorAddress', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Alamat', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'vendor_city'     => array('id'=>'vendor_city', 'label'=>'VendorCity', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'vendor_city', 'label'=>'VendorCity', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Kota', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'province'          => array('id'=>'province', 'label'=>'Propinsi', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'province', 'label'=>'Propinsi', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Propinsi', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'zip_postal'        => array('id'=>'zip_postal', 'label'=>'Kode Pos', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'zip_postal', 'label'=>'Kode Pos', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'Kode Pos', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'phone'             => array('id'=>'phone', 'label'=>'Telp.', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'phone', 'label'=>'Telp.', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'telp', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'fax'               => array('id'=>'fax', 'label'=>'Fax.', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'fax', 'label'=>'Fax.', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'fax', 'required'=>false, 'col_css'=>'col-md-10'))), 
                        
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
                    'vendor_address'   => $row->vendor_address,
                    'vendor_city'   => $row->vendor_city,
                    'province'      => $row->province,
                    'zip_postal'   => $row->zip_postal,
                    'phone'         => $row->phone,
                    'fax'           => $row->fax,
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

