<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {    

    var $session_user;

/*
    function __construct() {
        parent::__construct();

        Utils::no_cache();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url('main/index'));
            exit;
        }
        $this->session_user = $this->session->userdata('logged_in');
        
    }

    /*
     * 
     */

    public function index() {
        $this->load->view('login');
    }

    function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('main_model');  
                if($this->main_model->can_login($username, $password))  
                {  
                     $this->session->set_userdata('username',$username);  
                     redirect(base_url() . 'dashboard/enter');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'dashboard/index');  
                }  
           }  
           else  
           {  
                //false  
                $this->index();  
           }  
      }  

       function enter(){  
           if($this->session->userdata('username') != '')  
           {  

                echo '<label><a href="'.base_url().'Dashboard/logout">Logout</a></label>';  
           }  
           else  
           {        
            var_dump($_SESSION);exit();
          
                //redirect(base_url() . 'dashboard/index');  
                echo '<h2>Welcome - '.$this->session->userdata('password').'</h2>';  
                echo '<label><a href="'.base_url().'Dashboard/logout">Logout</a></label>';  
           }  
      }  
      function logout()  
      {  
           $this->session->unset_userdata('username');  
           redirect(base_url() . 'dashboard/index');  
      }  

}
