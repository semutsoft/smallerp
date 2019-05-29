<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_dept extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_company_dept',
            'colomn'    => array(
                'dept_id'   => array('id'=>'dept_id', 'label'=>'ID', 'key'=>true, 'visible'=>false, 
                    'form'=>array(  
                        array('id'=>'dept_id', 'label'=>'ID', 'visible'=>true, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'), 
                    )
                ),
                'dept_name'   => array('id'=>'dept_name', 'label'=>'Dept/Bagian', 'key'=>false, 'visible'=>true, 
                    'form'=>array(  
                        array('id'=>'dept_name', 'label'=>'Dept/Bagian', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'), 
                    )
                ),
                'dept_alias'   => array('id'=>'dept_alias', 'label'=>'Alias', 'key'=>false, 'visible'=>true, 
                    'form'=>array(  
                        array('id'=>'dept_alias', 'label'=>'Alias', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'), 
                    )
                )
            ),
            'idkey'     => 'dept_id',
            'join'      => array(),
            'where'     => array(),
            'order'     => array(
                array('dept_name', 'asc')
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
                $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->dept_id.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->dept_id.'"> <i class="fa fa-trash"></i>  Hapus</button>';

                $list[] = array(
                    'no'                => $no,
                    'dept_name'         => $row->dept_name,
                    'dept_alias'        => $row->dept_alias,
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