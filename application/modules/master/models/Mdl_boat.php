<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_boat extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_boat',
            'colomn'    => array(
                'dept_id'   => array('id'=>'dept_id', 'label'=>'Dept/Bagian', 'key'=>true, 'visible'=>true, 'form'=>array(
                               array('id'=>'dept_id', 'label'=>'Dept/Bagian', 'visible'=>false, 'format'=>'TEXT', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
            )
        );
    }
    
    
}