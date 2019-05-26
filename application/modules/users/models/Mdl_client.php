<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_client extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->table = array(
            'name'      => 'mst_client_login',
        );
    }
    
    
    
    function checklogin($params)
    {
        $this->login_db = $this->load->database('client', TRUE);

        $fields = array(
            'login_id',
            'email',
            'password',
            'mst_client.client_id',
            'mst_client.client_name',
            'mst_client.client_status',
            'mst_client.client_valid_until'            
        );
        $today = date('Y-m-d');
        $this->login_db->select($fields);
        $this->login_db->join('mst_client', 'mst_client.client_id=mst_client_login.client_id', 'left');
        $this->login_db->where('email', $params['email']);
        $this->login_db->where('password', md5($params['password']));
        $this->login_db->where('login_is_active', 1);
        //$this->login_db->where('client_valid_until >=', $today);
        $this->login_db->limit(1);
        $query = $this->login_db->get($this->table['name']);
        $data['log_query']  = $this->login_db->last_query();
        if ($query->num_rows() == 1){
            $row = $query->row();
            $data['data'] = array(
                    'user_id'       => $row->login_id,
                    'email'         => $row->email,
                    'company_name'  => $row->client_name,
                    'client_id'     => $row->client_id,
                    'client_status' => $row->client_status,
                    'login_date'    => date('Y-m-d H:i:s'),
                    'ip_address'    => ''
            );
            $data['status'] = 1;
            $this->session->set_userdata($data['data']);            
        } else {
            $data['status'] = 0;
        }
        return $data;
    }
    
}