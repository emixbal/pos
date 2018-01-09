<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of Login
 * 
 * @author emixbal
 */
class Login extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    public function index(){
        $this->login();
    }

    private function get_level(){
        $user           = $this->ion_auth->user()->row();
        $user_groups    = $this->ion_auth->get_users_groups($user->id)->row();
        switch ($user_groups->name){
            case 'admin':
                redirect('Admin','refresh');
                break;
            case 'members':
                redirect('Kasir','refresh');
                break;
        }
    }
    
    public function login(){
        if ($this->ion_auth->logged_in()){
            $this->get_level();
        }else{
            $data['title']      = 'Login';
            $data['main_view']  = 'login/login_form';

            $this->load->view('login/template', $data);
        }
    }
    
    public function login_process(){
        if(!$_POST){
            show_404();
        }elseif ($_POST) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('identity', 'Email/username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->login();
            } else{
                $identity = $this->input->post('identity');
                $password = $this->input->post('password');
                $remember = FALSE; // remember the user
                
                if($this->ion_auth->login($identity, $password, $remember)){
                    $this->get_level();
                } else{
                    $this->session->set_flashdata('login_error', 'Wrong combination, please try again.');
                    $this->login();
                }
            }
        }
    }
    
    public function logout(){
        $this->ion_auth->logout();
        redirect('Login','refresh');
    }
    
}
?>
