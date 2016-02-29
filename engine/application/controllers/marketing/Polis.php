<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Polis extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->data['page_title'] = 'Polis General';
    }
    
    public function index()
    {
        $this->data['page_subtitle'] = 'Daftar Polis';
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Polis General', get_action_url('marketing/polis'), TRUE);
        
        $this->data['subview'] = 'marketing/polis_general/index';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit($id=NULL)
    {
        $this->data['page_subtitle'] = $id ? 'Edit polis':'Registrasi Polis';
        
        //load model user if not loaded
        $this->load->model(array(
            'mkt_polis_m','mtr_sumberbisnis_m','mtr_jenisasuransi_m','mkt_objek_pertanggungan_m',
            'mtr_matauang_m','mtr_asuradur_m','mtr_broker_m','mtr_sales_m','mtr_tertanggung_m','mtr_propinsi_m'));
        
        if ($id){
            $item = $this->mkt_polis_m->get($id);
            $item->objek_pertanggungan = $this->mkt_objek_pertanggungan_m->get_by(array('polis'=>$item->id));
        }else{
            $item = $this->mkt_polis_m->get_new();
            $item->persetujuan = 'pusat';
            $item->periode_mulai = date('Y-m-d');
            $item->periode_akhir = date('Y-m-d', strtotime('+1 year'));
            $item->mata_uang = 'IDR';
            $item->komisi_kembali = 0;
            $item->objek_pertanggungan = NULL;
        }
        $this->data['item'] = $item;
        
        //suported data
        $this->data['daftar_bulan'] = get_list_month('long');
        $this->data['daftar_tahun'] = array(2016);
        $this->data['propinsi'] = $this->mtr_propinsi_m->get();
        $this->data['persetujuan'] = array('pusat'=>'Kantor Pusat', 'wilayah' => 'Kantor Wilayah', 'cabang'=>'Kantor Cabang');
        $this->data['tertanggung'] = $this->mtr_tertanggung_m->get();
        $this->data['sales'] = $this->mtr_sales_m->get();
        $this->data['sumber_bisnis'] = $this->mtr_sumberbisnis_m->get();
        $this->data['jenis_asuransi'] = $this->mtr_jenisasuransi_m->get();
        $this->data['mata_uang'] = $this->mtr_matauang_m->get();
        $this->data['asuradurs'] = $this->mtr_asuradur_m->get();
        $this->data['brokers'] = $this->mtr_broker_m->get();
        
        //set breadcumb
        breadcumb_add($this->data['breadcumb'], '<i class="fa fa-home"></i> Home', get_action_url('dashboard'));
        breadcumb_add($this->data['breadcumb'], 'Polis General', get_action_url('marketing/polis'), TRUE);
        breadcumb_add($this->data['breadcumb'], 'Edit', NULL, TRUE);
        
        $this->data['submit_url'] = get_action_url('marketing/polis/edit_save/'.$id);
        $this->data['back_url'] = get_action_url('marketing/polis');
        
        $this->data['subview'] = 'marketing/polis_general/edit';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function edit_save($id=NULL){
        if (!isset($this->mkt_polis_m)){
            $this->load->model(array('mkt_polis_m'));
        }
        echo json_encode($this->input->post());exit;
        $rules = $id ? $this->mkt_polis_m->rules['edit'] : $this->mkt_polis_m->rules['create'];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() !== FALSE){
            //save data
            $data = $this->mkt_polis_m->array_from_post(
                    array(
                        'bulan_laporan','tahun_laporan','sumber_bisnis','nomor_polis','nomor_polis_lama','tertanggung',
                        'okupasi','jenis_asuransi','periode_mulai','periode_akhir','total_pertanggungan_idr','total_premi_idr',
                        'total_biayalain_idr','persetujuan','matauang_komisi_kembali','komisi_kembali','sales','cicil',
                        'asuradur_leader','broker_leader','broker_total_komisi','broker_total_komisi_kembali',
                        'broker_total_komisi_net','broker_bsm_komisi_net'
                    )
            );
            if (!$id){
                $data['created_by'] = $this->userlib->get_userid();
            }else{
                $data['modified_by'] = $this->userlib->get_userid();
            }
            
            if (($polis_id=$this->mkt_polis_m->save($data, $id))){
                $this->session->set_flashdata('message', 'Polis '.($id?'dengan id:'.$id:'baru').' berhasil disimpan di database');
                $this->session->set_flashdata('message_type', 'success');
                
                //update objek pertanggungan
                $saved_objek_ids = $this->_save_objek_pertanggungan($polis_id);
                //Update premi
                $save_premi_ids = $this->_save_premi($polis_id, $saved_objek_ids);
                //Save biaya lain
                $save_biayalain_ids = $this->_save_biayalain($polis_id);
                //save asuradur
                $save_asuradurs = $this->_save_asuradur($polis_id, $data['asuradur_leader']);
                
                //create log
                $this->log_create(CT_MODULE_SYSTEM, ($id?'Merubah':'Menambah').' record polis dengan nomor polis:'.$data['nomor_polis'], $id?CT_LOG_EDIT:CT_LOG_CREATE);
                
                redirect(get_action_url('marketing/polis/edit/'.$id));
            }else{
                $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: '.$this->mkt_polis_m->get_last_message());
                $this->session->set_flashdata('message_type', 'error');
                
                redirect(get_action_url('marketing/polis/edit/'.$id));
            }
        }else{
            $this->session->set_flashdata('message', 'Gagal menyimpan data dengan pesan: <br>'.  validation_errors());
            $this->session->set_flashdata('message_type', 'error');
            
            redirect(get_action_url('marketing/polis/edit/'.$id));
        }
    }
    
    private function _save_objek_pertanggungan($polis_id){
        if (!isset($this->mkt_objek_pertanggungan_m)){
            $this->load->model('mkt_objek_pertanggungan_m');
        }
        //remove old data for this polis
        $this->mkt_objek_pertanggungan_m->delete_where(array('polis' => $polis_id));
        //get objek pertanggungan
        $objek_pertanggungan_post = array(
            'objek_nama'        => $this->input->post('objek_nama'),
            'objek_matauang'    => $this->input->post('objek_matauang'),
            'objek_nilai'       => $this->input->post('objek_nilai'),
            'objek_nilai_idr'   => $this->input->post('objek_nilai_idr')
        );
        $obj_length = count($objek_pertanggungan_post['objek_nama']);
        if ($obj_length){
            $objek_item_ids = array();
            for ($i=0; $i<$obj_length; $i++){
                $objek_item = array(
                    'polis'                     => $polis_id,
                    'objek'                     => $objek_pertanggungan_post['objek_nama'][$i],
                    'mata_uang'                 => $objek_pertanggungan_post['objek_matauang'][$i],
                    'jumlah_pertanggungan'      => $objek_pertanggungan_post['objek_nilai'][$i],
                    'jumlah_pertanggungan_idr'  => $objek_pertanggungan_post['objek_nama'][$i]
                );
                
                $objek_item_ids [] = $this->mkt_objek_pertanggungan_m->save($objek_item);
            } 
            
            return $objek_item_ids;
        }
        
        return NULL;
    }
    
    private function _save_premi($polis_id, $objek_id_array){
        if (!isset($this->mkt_polis_premi_m)){
            $this->load->model('mkt_objek_pertanggungan_m');
        }
        
        //remove old data
        $this->mkt_polis_premi_m->delete_where(array('polis' => $polis_id));
        
        $premis = array(
            'suku_premi'        => $this->input->post('premi_rate'),
            'tipe_premi'        => $this->input->post('premi_rate_tipe'),
            'premi_dasar'       => $this->input->post('premi_nilai'),
            'premi_dasar_idr'   => $this->input->post('premi_nilai_idr')
        );
        
        if ($objek_id_array && count($objek_id_array)){
            $premi_id_array = array();
            for ($i=0; $i<count($objek_id_array); $i++){
                $premi_item = array(
                    'polis'                 => $polis_id,
                    'objek'                 => $objek_id_array[$i],
                    'suku_premi'            => $premis['suku_premi'][$i],
                    'tipe_premi'            => $premis['tipe_premi'][$i],
                    'premi_dasar'           => $premis['premi_dasar'][$i],
                    'premi_dasar_idr'       => $premis['premi_dasar_idr'][$i]
                );

                $id_premi = $this->mkt_polis_premi_m->save($premi_item);
                if ($id_premi){
                    $premi_id_array [] = $id_premi;
                }
            }
            
            return $premi_id_array;
        }
        
        return NULL;
    }
    
    private function _save_biayalain($polis_id){
        if (!isset($this->mkt_polis_biayalain_m)){
            $this->load->model('mkt_polis_biayalain_m');
        }
        
        //remove old data
        $this->mkt_polis_biayalain_m->delete_where(array('polis' => $polis_id));
        
        $biayalain = array(
            'nama'              => $this->input->post('biayalin_nama'),
            'mata_uang'         => $this->input->post('biayalain_matauang'),
            'biaya_lain'        => $this->input->post('biayalain_nilai'),
            'biaya_lain_idr'    => $this->input->post('biayalain_idr')
        );
        
        $result = array();
        for ($i=0; $i<count($biayalain['nama']); $i++){
            $biaya = array(
                'polis'             => $polis_id,
                'nama'              => $biayalain['nama'][$i],
                'mata_uang'         => $biayalain['mata_uang'][$i],
                'biaya_lain'        => $biayalain['biaya_lain'][$i],
                'biaya_lain_idr'    => $biayalain['biaya_lain_idr'][$i]
            );
            
            $id_biaya = $this->mkt_polis_biayalain_m->save($biaya);
            if ($biaya){
                $result[] = $id_biaya;
            }
        }
        
        return $result;
    }
    
    private function _save_asuradur($polis_id, $leader){
        if (!isset($this->mkt_polis_asuradur_m)){
            $this->load->model('mkt_polis_asuradur_m');
        }
        
        //remove old data
        $this->mkt_polis_asuradur_m->delete_where(array('polis' => $polis_id));
        
        $asuradurs = array(
            'asuradur'              => $this->input->post('asuradur'),
            'persentase_share'      => $this->input->post('asuradur_persen'),
            'persentase_komisi'     => $this->input->post('asuradur_komisi_persen'),
            'komisi_idr'            => $this->input->post('asuradur_komisi_idr')
        );
        
        $result = array();
        for ($i=0; $i<count($asuradurs['asuradur']); $i++){
            $asuradur = array(
                'polis'                 => $polis_id,
                'asuradur'              => $asuradurs['asuradur'][$i],
                'leader'                => $asuradurs['asuradur'][$i] == $leader ? 1 : 0,
                'persentase_share'      => $asuradurs['persentase_share'][$i],
                'persentase_komisi'     => $asuradurs['persentase_komisi'][$i],
                'komisi_idr'            => $asuradur['komisi_idr'][$i]
            );
            
            $id = $this->mkt_polis_asuradur_m->save($asuradur);
            if ($id){
                $result[] = $id;
            }
        }
        
        return $result;
    }
}

/*
 * Filename: Menu.php
 * Location: application/controllers/system/Menu.php
 */
