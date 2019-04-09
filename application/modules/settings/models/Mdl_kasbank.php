<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_kasbank extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_coa',
            'colomn'    => array(
                'coa_id'            => array('id'=>'coa_id', 'label'=>'ID', 'key'=>true, 'visible'=>false, 'form'=>array(
                                                    array('id'=>'coa_id', 'label'=>'ID', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kasbank'           => array('id'=>'kasbank', 'label'=>'Kas / Bank', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kasbank', 'label'=>'Kas / Bank', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kode_transaksi'    => array('id'=>'kode_transaksi', 'label'=>'Kode Transaksi', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kode_transaksi', 'label'=>'ID', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))),
                'coa_no'            => array('id'=>'coa_no', 'label'=>'Nomor Akun', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_no', 'label'=>'Nomor Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'coa_name'          => array('id'=>'coa_name', 'label'=>'Nama Akun', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_name', 'label'=>'Nama Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                /*
                'coa_name'          => array('id'=>'coa_name', 'label'=>'Nama Akun', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_name', 'label'=>'Nama Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'coa_name'          => array('id'=>'coa_name', 'label'=>'Nama Akun', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_name', 'label'=>'Nama Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'coa_name'          => array('id'=>'coa_name', 'label'=>'Nama Akun', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_name', 'label'=>'Nama Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'coa_name'          => array('id'=>'coa_name', 'label'=>'Nama Akun', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_name', 'label'=>'Nama Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'coa_name'          => array('id'=>'coa_name', 'label'=>'Nama Akun', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_name', 'label'=>'Nama Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'coa_name'          => array('id'=>'coa_name', 'label'=>'Nama Akun', 'key'=>true, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_name', 'label'=>'Nama Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                */
            ),
            'idkey'     => 'coa_id',
            'join'      => array(),
            'where'     => array(),
            'order'     => array(),
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
                $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->user_id.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->user_id.'"> <i class="fa fa-trash"></i>  Hapus</button>';

                $list[] = array(
                    'no'                => $no,
                    'user_email'        => $row->user_email,
                    'user_password'     => $row->user_password,
                    'user_is_active'    => $row->user_is_active,
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