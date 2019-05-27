<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_employee extends Mdl_utama{
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_employee',
            'colomn'    => array(
                'company_id'            => array('id'=>'compnay_name', 'label'=>'ID', 'key'=>false, 'visible'=>false, 
                    'form'=>array()),
                'employee_id'           => array('id'=>'employee_id', 'label'=>'ID', 'key'=>true, 'visible'=>false, 
                    'form'=>array( array('id'=>'employee_id', 'label'=>'ID', 'visible'=>true, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'employee_code'           => array('id'=>'employee_code', 'label'=>'NIK', 'key'=>false, 'visible'=>true, 
                    'form'=>array( array('id'=>'employee_code', 'label'=>'NIK', 'visible'=>true, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
                'employee_name'         => array('id'=>'employee_name', 'label'=>'Nama Karyawan', 'key'=>false, 'visible'=>true, 
                    'form'=>array(array('id'=>'employee_name', 'label'=>'Nama Karyawan', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))),
                'employee_position'     => array('id'=>'position_id', 'label'=>'Jabatan', 'key'=>false, 'visible'=>true,
                    'form'=>array(array('id'=>'position_id', 'label'=>'Jabatan', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))),                
                'dept_id'         => array('id'=>'dept_id', 'label'=>'Dept/Bagian', 'key'=>false, 'visible'=>true, 
                    'form'=>array(array('id'=>'dept_id', 'label'=>'Dept/Bagian', 'visible'=>true, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))),
                'employee_address'              => array('id'=>'employee_address', 'label'=>'Alamat Tinggal', 'key'=>false, 'visible'=>false, 
                    'form'=>array(array('id'=>'employee_address', 'label'=>'Alamat Tinggal', 'visible'=>true, 'format'=>'PASSWORD', 'placeholder'=>'', 'required'=>true, 'col_css'=>'col-md-10'))), 
                'akun_hutang'       => array('id'=>'akun_hutang', 'label'=>'Akun Hutang', 'key'=>false, 'visible'=>true, 
                    'form'=>array()),
                'akun_piutang'       => array('id'=>'akun_piutang', 'label'=>'Akun Piutang', 'key'=>false, 'visible'=>true, 
                    'form'=>array())
            ),
            'idkey'     => 'employee_id',
            'join'      => array( 
                //array('mst_company', 'mst_company.company_id=mst_employee.company_id', 'left'),
                
            ),    
            'where'     => array(
                //array('mst_employee.company_id', $this->companyid),
            ),
            'order'     => array(                 
                array('employee_position', 'asc'),
                array('employee_name', 'asc')
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
                    $button = '<button class="btn btn-warning btn-sm btn-ubah" data-id="'.$row->employee_id.'"> <i class="fa fa-pencil"></i> Ubah</button>&nbsp;';
                    $button .= '<button class="btn btn-danger btn-sm btn-hapus" data-id="'.$row->employee_id.'"> <i class="fa fa-trash"></i>  Hapus</button>';

                    $list[] = array(
                        'no'                => $no,
                        'employee_code'     => $row->employee_code,  
                        'employee_name'     => $row->employee_name,
                        'dept_id'           => $row->dept_id,
                        'position_id'       => $row->position_id,
                        'akun_hutang'       => $row->akun_hutang,
                        'akun_piutang'      => $row->akun_piutang,
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