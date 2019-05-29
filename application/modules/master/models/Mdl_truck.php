<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_truck extends Mdl_utama {
    
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_truck',
            'colomn'    => array(
                'truck_id'   => array('id'=>'truck_id', 'label'=>'ID', 'key'=>true, 'visible'=>true, 'form'=>array(
                               array('id'=>'truck_id', 'label'=>'ID', 'visible'=>false, 'format'=>'HIDDEN', 'placeholder'=>'', 'required'=>false, 'col_css'=>'col-md-10'))), 
            ),
            'idkey'     => 'truck_id',
            'join'      => array(),
            'where'     => array(),
            'order'     => array(
                array('truck_id', 'asc'),
            )  
        );
    }
    
    
}