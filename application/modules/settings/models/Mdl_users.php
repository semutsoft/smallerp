<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_users extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'db_semutsoft.mst_client_login',
            'colomn'    => array(
                'login_id'           => array('id'=>'user_id', 'label'=>'ID', 'key'=>true, 'visible'=>false, 'form'=>array(
                                        array('id'=>'user_id', 'label'=>'ID', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'employee_id'        => array('id'=>'employee_name', 'label'=>'Nama Karyawan', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'employee_name', 'label'=>'Nama Karyawan', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))),
                'employee_position'  => array('id'=>'employee_position', 'label'=>'Nama Karyawan', 'key'=>false, 'visible'=>true),
                'email'             => array('id'=>'email', 'label'=>'Email', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'email', 'label'=>'Email', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))),
                'password'          => array('id'=>'password', 'label'=>'Password', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'password', 'label'=>'Password', 'visible'=>true, 'format'=>'PASSWORD', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'login_is_active'    => array('id'=>'login_is_active', 'label'=>'Is Active', 'key'=>false, 'visible'=>true, 'form'=>array(
                                        array('id'=>'login_is_active', 'label'=>'Is Active', 'visible'=>true, 'format'=>'CHECKBOX', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
            ),
            'idkey'     => 'db_semutsoft.mst_client_login.login_id',
            'join'      => array( 
                array('db_smallerp.mst_employee', 'mst_employee.login_id=mst_client_login.login_id', 'left'),
                array('db_smallerp.mst_company', 'mst_company.company_id=mst_employee.company_id', 'left'),
                
            ),    
            'where'     => array(
                array('db_smallerp.mst_employee.company_id', $this->companyid),
                
            ),
            'order'     => array(                 
                array('db_smallerp.mst_employee.employee_position', 'asc'),
                array('db_smallerp.mst_employee.employee_name', 'asc')
            )    
        );
    }
    
    
    function getListData($params)
    {
        $data_array = $this->getList($params);
        
        $list_array = array();
        if ($data_array['filter'] == 0){
                $list_array = array();
            } else {
                if (!empty($data_array['results'])){
                    $list_array = $data_array['results'];
                }
        }
        
        $list = array();
        if ($data_array['filter'] > 0 ){
            
            if (!empty($list_array)){
                $no = 1;
                foreach($list_array as $row):
                    $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->login_id.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                    $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->login_id.'"> <i class="fa fa-trash"></i>  Hapus</button>';

                    $list[] = array(
                        'no'                => $no,
                        'employee_name'     => $row->employee_name,  
                        'employee_position' => $row->employee_position,  
                        'login_email'       => $row->login_email,
                        'login_password'    => 'xxxxxxxxx',
                        'login_is_active'   => $row->login_is_active,
                        'actions'           => $button
                    );
                    $no++;
                endforeach;
            }
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