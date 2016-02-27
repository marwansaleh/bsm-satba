<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Rel_kurs_m
 *
 * @author Marwan
 * @email amazzura.biz@gmail.com
 */
class Rel_kurs_m extends MY_Model {
    protected $_table_name = 'rel_kurs_matauang';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = 'tahun desc,bulan desc';
    protected $_timestamps = TRUE;
    protected $_timestamps_field = array('created','modified');
}

/*
 * file location: /application/models/mtr_matauang_m.php
 */
