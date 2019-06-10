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
    
    function getFormFields($detail)
    {
        $data = array();
        $keys = $this->table['colomn'];
        foreach($keys as $row):
            if (!empty($row['form'])){
                $data[]['form_field'] = $this->formbuilder->show_form($row['form'], $detail);
            }
        endforeach;
        return $data;
    }
    
    function getDetail($id)
    {
        $this->db->where($this->table['idkey'], $id);
        $query = $this->db->get($this->table['name']);
        $row = $query->row();
        return $row;
    }
    
    function getList($params)
    {
        $keys = $this->table['colomn'];
        $fields[] = $this->table['idkey'];
        
        foreach($keys as $row):
            if ($row['visible']){
                $fields[] = $row['id'];
            }
        endforeach;
                
        $data = array();        
        $data['total'] = $this->db->count_all_results($this->table['name']);
        
        $this->db->select($fields);
        
        //for join
        $join = $this->table['join'];
        if (!empty($join)){
            foreach($join as $row):
                $this->db->join($row[0], $row[1], $row[2]);
            endforeach;
        }
        
        //
        //
        //for filter
        $where = $this->table['where'];
        if (!empty($where)){
            foreach($where as $row):
                $this->db->where($row[0], $row[1]);
            endforeach;
        }
        
        //for filter
        $where_or = @$this->table['where_or'];
        if (!empty($where_or)){
            $this->db->group_start();
            foreach($where_or as $row):
                $this->db->or_where($row[0], $row[1]);
            endforeach;
            $this->db->group_end();
        }
        
        
        
        $order = $this->table['order'];
        if (!empty($order)){
            foreach($order as $row):
                $this->db->order_by($row[0], $row[1]);
            endforeach;
        }
        //$this->db->limit(10);
        
        $query = $this->db->get($this->table['name']);
        $data['msg'] = $this->db->last_query(); 
        $data['filter'] = $data['total'];
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

