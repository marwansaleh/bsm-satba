<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Placingslip
 *
 * @author marwansaleh 1:31:58 PM
 */
class Placingslip extends REST_Api {
    private $_remap_fields = array(
        'id'            => 'id',
        'parent_id'     => 'parent_id',
        'caption_id'    => 'caption_id',
        'caption_en'    => 'caption_en',
        'caption'       => 'caption',
        'name'          => 'name',
        'title_id'      => 'title_id',
        'title_en'      => 'title_en',
        'title'         => 'title',
        'href'          => 'href',
        'category'      => 'category',
        'category_name' => 'category_name',
        'sort'          => 'sort',
        'created'       => 'created',
        'created_dt'    => 'created_dt',
        'modified'      => 'modified',
        'modified_dt'   => 'modified_dt'
    );
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        
        $this->load->model('menu_m');
    }
    
    function index_get($id=NULL){
        $lang = $this->get('lang') ? $this->get('lang') : CT_LANG_INDONESIA;
        if ($id){
            //manipulate result item before return
            $result = $this->remap_fields($this->_remap_fields, $this->_proccess_item($this->menu_m->get($id), $lang));
        } else {
            $page = $this->get('page') ? $this->get('page') : 1;
            $limit = $this->get('limit') ? $this->get('limit') : 12;
            $search = $this->get('search') ? $this->get('search') : NULL;
            
            $where = NULL;
            
            //Count total records
            if ($this->get('category')>=0){
                $where = array ('category' => $this->get('category'));
            }
            if ($search){
                $this->db->like('caption_id', $search);
                $this->db->or_like('caption_en', $search);
                $this->db->or_like('title_id', $search);
                $this->db->or_like('title_en', $search);
            }
            
            $totalRecords = $this->menu_m->get_count($where);
            $totalPages = ceil($totalRecords / $limit);
            
            $result = array('currentPage' => $page, 'totalPages' => $totalPages, 'items'=>array());
            
            if ($totalRecords > 0){
                $offset = ($page-1) * $limit;
                //apply offset and limit of data
                $this->db->offset($offset)->limit($limit);
                if (isset($where) && !empty($where)){
                    $this->db->where($where);
                }
                //if searching
                if ($search){
                    $this->db->like('caption_id', $search);
                    $this->db->or_like('caption_en', $search);
                    $this->db->or_like('title_id', $search);
                    $this->db->or_like('title_en', $search);
                }
                $query_result = $this->menu_m->get();
                if ($query_result){
                    $items = array();
                    foreach ($query_result as $item){
                        //manipulate result item before return
                        $items [] = $this->_proccess_item($item, $lang);
                    }
                    //manipulate result item before return
                    $result['items'] = $this->remap_fields($this->_remap_fields, $items);
                }
            }
        }
        //sleep(1);
        $this->response($result);
        
    }
    
    function index_post(){
        $parent_id = $this->post('parent_id');
        $caption_id = $this->post('caption_id');
        $caption_en = $this->post('caption_en');
        $name = $this->post('name');
        $title_id = $this->post('title_id');
        $title_en = $this->post('title_en');
        $href = $this->post('href');
        $category = $this->post('category');
        $sort = $this->post('sort');
        
        $data = array(
            'parent_id'     => $parent_id,
            'caption_id'    => $caption_id,
            'caption_en'    => $caption_en,
            'name'          => $name,
            'title_id'      => $title_id,
            'title_en'      => $title_en,
            'href'          => $href,
            'category'      => $category,
            'sort'          => $sort
        );
        
        if (($id=$this->menu_m->save($data))){
            $result = array('status'=>TRUE, 'id'=>$id);
        }else{
            $result = array('status'=>FALSE, 'message' =>'Gagal menyimpan data');
        }
        
        $this->response($result);
    }
    
    function index_put($id){
        $data = $this->array_from_post(
                array('parent_id', 'caption_id', 'caption_en', 'name', 'title_id', 'title_en', 'href', 'category', 'sort'),
                $this->put(), TRUE
        );
        
        if ($this->menu_m->save($data, $id)){
            $result = array('status' => TRUE);
        }else{
            $result = array('status'=>FALSE, 'message'=>'Gagal menyimpan perubahan dengan pesan: '. $this->menu_m->get_last_message());
        }
        
        $this->response($result);
    }
    
    function index_delete($id){
        if ($this->menu_m->delete($id)){
            $result = array('status'=>TRUE);
        }else{
            $result = array('status'=>FALSE, 'message'=>'Gagal menghapus data dengan pesan: '. $this->menu_m->get_last_message());
        }
        
        $this->response($result);
    }
    
    private function _proccess_item($item=NULL, $lang = CT_LANG_INDONESIA){
        if ($item){
            $item->caption = $lang == CT_LANG_INDONESIA ? $item->caption_id : $item->caption_en;
            $item->title = $lang == CT_LANG_INDONESIA ? $item->title_id : $item->title_en;
            $item->created_dt = date('Y-m-d H:i:s', $item->created);
            $item->modified_dt = date('Y-m-d H:i:s', $item->modified);
            $item->category_name = $item->category ? menu_category_name($item->category) : 'Other';
        }
        
        return $item;
    }
}

/**
 * Filename : menu.php
 * Location : application/controllers/service/menu.php
 */
