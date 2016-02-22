<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class wrapper for REST_Controller
 *
 * @author marwansaleh <amazzura.biz@gmail.com>
 */

class REST_Api extends REST_Controller {
    protected $_recs_per_page = 100;
    
    private $_log_file;
    private $_log_path;
    
    function __construct($config = 'rest') {
        parent::__construct($config);
        //Load api helper
        $this->load->helper('api');
        
        $this->_log_file = config_item('log_filename') ? config_item('log_filename') : 'mylogfile.log';
        $this->_log_path = rtrim(sys_get_temp_dir(), '/') .'/';
    }
    
    public function service_not_found(){
        $this->response(array('status'=>FALSE, 'message'=>'Service not found'));
    }
    
    protected function remap_fields($arr_map, $data){
        $result = NULL;
        
        if (is_array($data)){
            $result = array();
            if (count($data)){
                foreach ($data as $item){
                    $result [] = $this->_remap_object_properties($arr_map, $item);
                }
            }
        }else{
            $result = $this->_remap_object_properties($arr_map, $data);
        }
        
        return $result;
    }
    
    private function _remap_object_properties($maps,$object){
        $new_class = new stdClass();
        foreach ($maps as $src => $dest){
            $new_class->{$dest} = isset($object->{$src})? $object->{$src} : NULL;
        }
        return $new_class;
    }
    
    
    protected function read_log($lines=5, $adaptive = true){
        // Open file
        $filepath = $this->_log_path . $this->_log_file;
        
        $f = @fopen($filepath, "rb");
        if ($f === false) return false;

        // Sets buffer size
        if (!$adaptive) $buffer = 4096;
        else $buffer = ($lines < 2 ? 64 : ($lines < 10 ? 512 : 4096));

        // Jump to last character
        fseek($f, -1, SEEK_END);

        // Read it and adjust line number if necessary
        // (Otherwise the result would be wrong if file doesn't end with a blank line)
        if (fread($f, 1) != "\n") $lines -= 1;
        // Start reading
        $output = '';
        $chunk = '';

        // While we would like more
        while (ftell($f) > 0 && $lines >= 0) {

        // Figure out how far back we should jump
        $seek = min(ftell($f), $buffer);

        // Do the jump (backwards, relative to where we are)
        fseek($f, -$seek, SEEK_CUR);

        // Read a chunk and prepend it to our output
        $output = ($chunk = fread($f, $seek)) . $output;

        // Jump back to where we started reading
        fseek($f, -mb_strlen($chunk, '8bit'), SEEK_CUR);

        // Decrease our line counter
        $lines -= substr_count($chunk, "\n");

        }

        // While we have too many lines
        // (Because of buffer size we might have read too many)
        while ($lines++ < 0) {

        // Find first newline and remove all text before that
        $output = substr($output, strpos($output, "\n") + 1);

        }

        // Close file and return
        fclose($f);
        return trim($output);
    }
    
    protected function array_from_post($elements, $sources=NULL, $removeNULL = TRUE){
        $result = array();
        
        if (!is_array($elements)){
            return NULL;
        }
        
        if ($sources === NULL){
            $sources = $this->post();
        }
        foreach ($elements as $key){
            if (isset($sources[$key])){
                if ($removeNULL && !is_null($sources[$key])){
                    $result[$key] = $sources[$key];
                }else{
                    $result[$key] = $sources[$key];
                }
            }
        }
        
        return $result;
    }
}
