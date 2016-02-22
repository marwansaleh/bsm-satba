<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function index()
    {
        if ($this->userlib->isLoggedin()){
            redirect('dashboard');
        }
        $this->data['remember'] = $this->_remember_me();
        $this->data['subview'] = 'login/index';
        $this->data['submit_url'] = get_action_url('auth/login');
        $this->load->view('_layout_login', $this->data);
    }
    
    function login(){
        $this->load->library('form_validation');
        
        $rules = $this->auth_user_m->rules['login'];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() !== FALSE){
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);
            $remember = $this->input->post('remember', TRUE);
            if ($remember){
                $this->_remember_me($username, $password);
            }else{
                $this->_remember_clear();
            }
            
            //print_r($this->_remember_me());exit;
            
            if ($this->userlib->login($username,$password)){
                
                //create log
                $this->log_create('Auth', 'Berhasil login dengan username:'.$username, CT_LOG_OTHER);
                redirect(get_action_url('dashboard'));
            }else{
                $this->session->set_flashdata('message',  $this->userlib->get_message());
                $this->session->set_flashdata('message_type', 'error');
                redirect(get_action_url('auth'));
            }
        }else{
            $this->session->set_flashdata('message', validation_errors());
            $this->session->set_flashdata('message_type', 'error');
            redirect(get_action_url('auth'));
        }
    }
    
    public function logout(){
        $me = $this->userlib->me();
        //create log
        $this->log_create('Auth', 'Berhasil logout dengan username:'.$me->username, CT_LOG_OTHER);
        
        $this->userlib->logout();
        
        redirect(get_action_url('auth'));
    }
    
    private function _remember_me($username=NULL,$password=NULL){
        if (!$username && !$password){
            $cookie = $this->input->cookie('login_remember_me');
            if ($cookie){
                return json_decode($cookie);
            }else{
                return NULL;
            }
        } else {
            $cookie = new stdClass();
            $cookie->username = $username;
            $cookie->password = $password;
            
            $this->input->set_cookie('login_remember_me', json_encode($cookie), 365*24*3600);
        }
    }
    
    private function _remember_clear(){
        $this->input->set_cookie('login_remember_me', '', 0);
    }
    
    public function hash($subject=NULL){
        if (!$subject){
            exit;
        }
        
        echo $this->userlib->hash($subject);
    }
}

/*
 * Filename: Auth.php
 * Location: application/controllers/Auth.php
 */