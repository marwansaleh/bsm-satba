<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mtr_sales_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mtr_sales_m extends MY_Model {
    protected $_table_name = 'ref_sales_marketing';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'nama';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
    public $rules = array(
        'create' => array(
            array(
                'field' => 'nama', 
                'label' => 'Nama sales', 
                'rules' => 'trim|required'
            )
        ),
        'edit' => array(
            array(
                'field' => 'nama', 
                'label' => 'Nama sales', 
                'rules' => 'trim|required'
            )
        )
    ); 
    
    public function get_groupped(){
        if (!isset($this->mtr_sales_group_m)){
            $this->load->model('mtr_sales_group_m');
        }
        $result = array();
        //get all groups
        $groups = $this->mtr_sales_group_m->get_select_where('id,nama',NULL);
        foreach ($groups as $item){
            $sales = $this->get_by(array('marketing_group_id' => $item->id));
            $item->sales = $sales;
            $result [] = $item;
        }
        
        return $result;
    }
}

/*
 * file location: /application/models/mtr_sales_m.php
 */
