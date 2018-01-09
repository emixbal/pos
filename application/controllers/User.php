<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Description of User
 * 
 * @author emixbal
 */
class User extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->user_get_all();
    }

    public function user_get_all(){
    	if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        } else{
        	$data['title']		= 'Kelola Pengguna';
        	$data['main_view']	= 'admin/user_get_all';

			//list the users
			$data['users'] = $this->ion_auth->users()->result();
			foreach ($data['users'] as $k => $user){
				$data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}

        	$this->load->view('admin/template', $data);
        }
    }

    public function user_edit($user_id){
    	if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        } else{
            if($this->ion_auth->user($user_id)->row()->id==''){
                redirect('User/user_get_all','refresh');
            } else{
                $data['title']      = 'Kelola Pengguna';
                $data['main_view']  = 'admin/user_edit';

                $data['groups']     = $this->ion_auth->groups()->result();
                $data['user']       = $this->ion_auth->user($user_id)->row();
                $data['user_groups']= $this->ion_auth->get_users_groups($user_id)->result();

                $this->load->view('admin/template', $data);
            }
        }
    }

    public function user_edit_do(){
    	if (!$this->ion_auth->is_admin() || !$_POST){
            show_404();
        } else{
        	$this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'Nama Depan', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('active', 'Status', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->edit_user($_POST['id']);
            } else{
		    	$id=$_POST['id'];
				$data = array(
							'first_name' => $_POST['first_name'],
							'last_name' => $_POST['last_name'],
							'email' => $_POST['email'],
							'username' => $_POST['username'],
                            'active' => $_POST['active'],
						);

				if($_POST['password'] !== '' && $_POST['password_confirm'] !== ''){
					if(trim($_POST['password']) == trim($_POST['password_confirm'])){
                        $data['password'] = trim($_POST['password']);
					} else{
						$this->session->set_flashdata('password_error_msg', 'Wrong password confirmation, please try again.');
                        $this->edit_user($_POST['id']);
					}   		
		    	}
				if($this->ion_auth->update($id, $data)){
                    //Update the groups user belongs to
                    $groupData = $this->input->post('groups');
                    if (isset($groupData) && !empty($groupData)) {
                        $this->ion_auth->remove_from_group(NULL, $id);
                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $id);
                        }
                    }
                    redirect('User/user_get_all','refresh');
                }

            }
		}
    }

    public function user_add(){
        if (!$this->ion_auth->is_admin()){
            redirect('Login','refresh');
        } else{
            $data['title']      = 'Tambah Pengguna';
            $data['main_view']  = 'admin/user_add_new';

            //$data['groups']     = $this->ion_auth->groups()->result();

            $this->load->view('admin/template', $data);
        }
    }

    public function user_add_do(){
        if (!$this->ion_auth->is_admin() || !$_POST){
            show_404();
        } else{
            $this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'Nama Depan', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_confirm', 'Password Konfirmasi', 'required');

            if ($this->form_validation->run() == FALSE){
                $this->user_add();
            } else{
                if($_POST['password'] !== $_POST['password_confirm']){
                    $this->session->set_flashdata('password_error_msg', 'Wrong password confirmation, please try again.');
                    $this->user_add();
                } else{
                    $additional_data = array(
                                            'first_name' => $_POST['first_name'],
                                            'last_name' => $_POST['last_name'],
                                            );
                    $email      = $_POST['email'];
                    $username   = $_POST['username'];
                    $password   = $_POST['password'];
                    $group      = array('2');

                    if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
                        redirect('User/user_get_all','refresh');
                    }
                }
            }
        }
    }
}