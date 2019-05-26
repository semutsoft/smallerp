<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_menu extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_menu'
        );
    }
    
    function getMenuSidebar()
    {
        $this->menu_db = $this->load->database('client', TRUE);

        $this->menu_db->where('parent_id', 0);
        $this->menu_db->order_by('menu_order', 'asc');        
        $query = $this->menu_db->get($this->table['name']);
        foreach($query->result() as $row):
            $data[] = array(
              'menu_name'   => $row->menu_name,
              'menu_alias'  => $row->menu_alias,
              'menu_url'    => site_url($row->menu_link),
              'menu_icon'   => $row->menu_icon
            );
        endforeach;
        return $data;
    }
    
}
