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
                'kode_transaksi'    => array('id'=>'kode_transaksi', 'label'=>'Kode Transaksi', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kode_transaksi', 'label'=>'ID', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))),
                'coa_no'            => array('id'=>'coa_no', 'label'=>'Nomor Akun', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_no', 'label'=>'Nomor Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'coa_name'          => array('id'=>'coa_name', 'label'=>'Nama Akun', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'coa_name', 'label'=>'Nama Akun', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                
                'kasbank_norek'     => array('id'=>'kasbank_norek', 'label'=>'Kas Bank NoRek', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kasbank_norek', 'label'=>'Kas Bank NoRek', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kasbank_cabang'    => array('id'=>'kasbank_cabang', 'label'=>'Kas Bank Cabang', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kasbank_cabang', 'label'=>'Kas Bank Cabang', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kasbank_nama_bank' => array('id'=>'kasbank_nama_bank', 'label'=>'Kas Bank Nama Bank', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kasbank_nama_bank', 'label'=>'Kas Bank Nama Bank', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kasbank_atas_nama' => array('id'=>'kasbank_atas_nama', 'label'=>'Kas Bank Atas Nama', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kasbank_atas_nama', 'label'=>'Kas Bank Atas Nama', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'kasbank_tipe'      => array('id'=>'kasbank_tipe', 'label'=>'Kas Bank Tipe', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'kasbank_tipe', 'label'=>'Kas Bank Tipe', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'Currency'            => array('id'=>'cur_code', 'label'=>'Currency Code', 'key'=>false, 'visible'=>true, 'form'=>array(
                                                    array('id'=>'cur_code', 'label'=>'Currency Code', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                
            ),
            'idkey'     => 'coa_id',
            'join'      => array(),
            'where'     => array(
            ),
            'where_or'     => array(
                array('kasbank', 'Bank'), 
                array('kasbank', 'Kas') 
            ),
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
                $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->coa_id.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->coa_id.'"> <i class="fa fa-trash"></i>  Hapus</button>';

                $list[] = array(
                    'no'                => $no,
                    'kasbank'           => $row->kasbank,
                    'kode_transaksi'    => $row->kode_transaksi,
                    'coa_no'            => $row->coa_no,
                    'coa_name'          => $row->coa_name,
                    'norek'             => $row->kasbank_norek,
                    'bank_branch'       => $row->kasbank_cabang,
                    'bank_name'         => $row->kasbank_nama_bank,
                    'bank_account'      => $row->kasbank_atas_nama,
                    'kasbnk_type'       => $row->kasbank_tipe,
                    'currency'          => $row->cur_code,
                    
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