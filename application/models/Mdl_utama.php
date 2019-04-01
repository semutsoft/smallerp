<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_utama extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function getListFields()
    {
        $data = array(); 
        $keys = $this->table['colomn'];
        foreach($keys as $row):
            
            if ($row['visible']){
                $data[] = array(
                    'label'     => $row['label']
                );
            };
            
        endforeach;
        return $data;
    }
    
    function getListFieldsData()
    {
        $data = array(); 
        $keys = $this->table['colomn'];
        $data[] = array('data'=> 'no');
        foreach($keys as $row):
            
            if ($row['visible']){
                $data[] = array(
                    'data'     => $row['id']
                );
            };
            
        endforeach;
        $data[] = array('data'=> 'actions');
        return $data;
    }
    
    function getFormFields()
    {
        $data = array();
        $keys = $this->table['colomn'];
        foreach($keys as $row):
            $data[]['form_field'] = $this->formbuilder->show_form($row['form']);
        endforeach;
        return $data;
    }
    
    function getList($params)
    {
        $keys = $this->table['colomn'];
        $fields[] = 'id';
        foreach($keys as $row):
            if ($row['visible']){
                $fields[] = $row['id'];
            }
        endforeach;
        
        $data = array();        
        $data['total'] = $this->db->count_all_results($this->table['name']);
        
        $this->db->select($fields);
        $query = $this->db->get($this->table['name']);
        $data['msg'] = $this->db->last_query(); 
        $data['filter'] = $query->num_rows();
        if ($data['filter']>0){
            if ($query->num_rows()>0){
                $data['results'] = $query->result();
            }
        } 
        return $data;
    }
    
    
    
    function AddData($fields)
    {
        $this->db->set($fields);
        $status = $this->db->insert($this->table['name']);
        if ($status){
            return true; 
        } else {
            return false;
        }
    }
    
    function EditData($id, $fields)
    {
        $this->db->set($fields);
        $this->db->where($this->table['idkey'], $id);
        $status = $this->db->update($this->table['name']);
        if ($status){
            return true; 
        } else {
            return false;
        }
    }
    
    function ViewData($id, $fields)
    {
        $this->db->select($fields);
        $this->db->where($this->table['idkey'], $id);
        $query = $this->db->get($this->table['name']);
        if ($query->num_rows()== 1){
            $row['row']     = $query->row();
            $row['status']  = true;
        } else {
            $row['status']  = false;
        }
        return $row;
    }
    
    function DeleteData($id)
    {
        $this->db->where($this->table['idkey'], $id);
        $status = $this->db->delete($this->table['name']);
        if ($status){
            return true; 
        } else {
            return false;
        }
    }
}

