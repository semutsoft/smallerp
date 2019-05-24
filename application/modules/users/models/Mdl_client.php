<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_client extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function checklogin($params)
    {
        
        $this->db->join('mst_client', 'mst_client.client_id=mst_client_login.client_id', 'left');
        $this->db->where('email', $params['email']);
        $this->db->where('password', md5($params['password']));
        $this->db->limit(1);
        $query = $this->db->get($this->table['name']);
        if ($query->num_rows() == 1){
            foreach($result as $row):
                $data = array(
                    'user_id'       => $row->user_id,
                    'email'         => $row->user_id,
                    'company_name'  => $row->user_id,
                    'user_id'       => $row->user_id,
                    
                );

            endforeach;
        } else {
            $data = array();
        }
        return $data;
    }
    
}