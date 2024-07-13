<?php


class Registration extends CI_Controller {

    public function __construct() {
        parent::__construct();
      
        $this->load->model('user_model');
    }

    public function signup() {
      
        $this->load->view('registration/signup');
    }

    public function registerNow() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
         
            $this->form_validation->set_rules('fullname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $user_filename = '';
                
                if (!empty($_FILES['profile_pic']['name'])) {
                    $ori_filename = $_FILES['profile_pic']['name'];
                    $new_name = time() . "_" . str_replace(' ', '', $ori_filename);
                    $config = [
                        'upload_path' => './images/',
                        'allowed_types' => 'gif|jpg|png',
                        'file_name' => $new_name,
                    ];
                    $this->load->library('upload', $config);
    
                    if (!$this->upload->do_upload('profile_pic')) {
                        $imageError = array('imageError' => $this->upload->display_errors());
                        $this->load->view('registration/signup', $imageError);
                        return; 
                    } else {
                        $user_filename = $this->upload->data('file_name');
                    }
                }
    
                $complete_name = $this->input->post('fullname');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $role = $this->input->post('role');
    
                $data = array(
                    'profile_pic' => $user_filename,
                    'complete_name' => $complete_name,
                    'email' => $email,
                    'pword' => $password, 
                    'role' => $role,
                    'status' => '1'
                );
    
                $this->load->model('user_model');
                $this->user_model->insertuser($data);
                $this->session->set_flashdata('success', 'Registration Successful! Please wait for an email notification once your account has been reviewed and approved for login.');
    
                redirect(base_url('registration/registration_confirm'));
            }
        }
    }
    
    

    public function login() {
        $this->load->view('registration/login');
    }


    public function loginNow() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email');
                $password = $this->input->post('password');
    
                $this->load->model('user_model');
                $status = $this->user_model->checkPassword($email, $password);
    
                if ($status != false) {
  
                    $session_data = array(
                        'userid' => $status->userid,
                        'role' => $status->role,
                        'email' => $status->email,
                        'complete_name' => $status->complete_name,
                        'profile_pic' => $status->profile_pic
                    );
                    $this->session->set_userdata('UserLoginSession', $session_data);
    
                    switch ($status->role) {
                        case 0:
                            redirect('pages/dashboard_admin');
                            break;
                        case 1:
                            redirect('evaluator/dashboard');
                            break;
                        case 2:
                            redirect('pages/dashboard_authors');
                            break;
                        default:
                        
                            break;
                    }
                } else {
                    $this->session->set_flashdata('error', 'Error logging in, wrong credentials ');
                    redirect('registration/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Fill all the required Fields ');
                redirect('registration/login');
            }
        }
    }
    
        

    public function registration_confirm() {

        $this->load->view('registration/registration_confirm');
    }

    public function logOut() {

        session_destroy();
        redirect('registration/login');


    }

    public function setAuthor() {
        

    }
}
