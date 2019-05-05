<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_currency extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_currency',
            'colomn'    => array(
                'currency_id'       => array('id'=>'currency_id', 'label'=>'ID', 'key'=>true, 'visible'=>false, 'form'=>array(
                                        array('id'=>'currency_id', 'label'=>'ID', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'currency_code'     => array('id'=>'currency_code', 'label'=>'Kode', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'currency_code', 'label'=>'Kode', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'negara'            => array('id'=>'negara', 'label'=>'Negara', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'negara', 'label'=>'Negara', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'currency_sim'      => array('id'=>'currency_sim', 'label'=>'Simbol', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'currency_sim', 'label'=>'Simbol', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'currency_rate'     => array('id'=>'currency_rate', 'label'=>'Rate', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'currency_rate', 'label'=>'rate', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'tax_rate'          => array('id'=>'tax_rate', 'label'=>'Tax Rate', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'tax_rate', 'label'=>'Tax Rate', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'st_def'            => array('id'=>'st_def', 'label'=>'Def', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'st_def', 'label'=>'Def', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'no_sk'             => array('id'=>'no_sk', 'label'=>'SK', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'no_sk', 'label'=>'SK', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
            ),
            'idkey'     => 'currency_id',
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
                $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->currency_id.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->currency_id.'"> <i class="fa fa-trash"></i>  Hapus</button>';

                $list[] = array(
                    'no'        => $no,
                    'currency_code'     => $row->currency_code,
                    'negara'            => $row->negara,
                    'currency_sim'      => $row->currency_sim,
                    'currency_rate'     => $row->currency_rate,
                    'tax_rate'          => $row->tax_rate,
                    'st_def'            => $row->st_def,
                    'no_sk'             => $row->no_sk,
                    
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
