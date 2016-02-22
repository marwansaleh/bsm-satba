<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mainmenu_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mainmenu_m extends MY_Model {
    protected $_table_name = 'ref_mainmenu';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'module,parent,sort,caption';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'caption', 
                'label' => 'Caption', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'caption', 
                'label' => 'Caption', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function get_all($parent=0, $deep=TRUE, $hidden=0){
        $this->load->model('mtr_module_m');
        $tb_module = $this->mtr_module_m->get_tablename();
        
        if (!$deep){
            $this->db->where(array('mm.parent'=>$parent));
        }
        
        $this->db->select('mm.*,md.name as module_name');
        $this->db->from($this->_table_name.' AS mm');
        $this->db->join($tb_module . ' AS md', 'mm.module=md.id');
        
        $this->db->order_by($this->_order_by);
        
        $result = $this->db->get();
        if (!$result){
            return NULL;
        }else{
            return $result->result();
        }
    }
    
    public function group_by_module($allmenu=NULL){
        $result = $allmenu ? $allmenu : $this->get_all();
        
        $groupped = array();
        foreach ($result as $item){
            $groupped[$item->module_name] [] = $item;
        }
        
        return $groupped;
    }
}

/*
 * file location: /application/models/mainmenu_m.php
 */
