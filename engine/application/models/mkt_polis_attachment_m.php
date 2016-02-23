<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Mkt_polis_attachment_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Mkt_polis_attachment_m extends MY_Model {
    protected $_table_name = 'rel_polis_attachment';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'polis, deskripsi';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
    
}

/*
 * file location: /application/models/mkt_polis_attachment_m.php
 */
