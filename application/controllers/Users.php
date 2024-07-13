<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); 
    }


    public function updateProfile() {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        
            $this->form_validation->set_rules('complete_name', 'Complete Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            if (!empty($this->input->post('password'))) {
                $this->form_validation->set_rules('password', 'Password', 'required');
            }
    
            if ($this->form_validation->run() == TRUE) {

                if (!empty($_FILES['profile_pic']['name'])) {
                    $config['upload_path'] = './images/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = 2048; 
                    $config['overwrite'] = TRUE;
                    $this->load->library('upload', $config);
    
                    if (!$this->upload->do_upload('profile_pic')) {
                       
                        $imageError = array('imageError' => $this->upload->display_errors());
                        $this->load->view('update_profile_form', $imageError);
                        return;
                    } else {
                        $upload_data = $this->upload->data();
                        $data['profile_pic'] = $upload_data['file_name'];
                    }
                }
    
              
                $data['complete_name'] = $this->input->post('complete_name');
                $data['email'] = $this->input->post('email');
    
              
                if (!empty($this->input->post('password'))) {
                    $data['pword'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                }
    
               
                $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
    
                if ($user_id) {
                
                    $this->load->model('user_model');
                    $updated = $this->user_model->updateUsers($data, $user_id);
    
                    if ($updated) {
                        $this->session->set_flashdata('success', 'Profile updated successfully.');
                        redirect('pages/db_authProfile');
                    } else {
                        $this->session->set_flashdata('error', 'Failed to update user profile.');
                        redirect('pages/db_authProfile');
                    }
                } else {
                    $this->session->set_flashdata('error', 'User ID not found.');
                    redirect('users/updateProfile');
                }
            } else {
                
                $this->session->set_flashdata('error', validation_errors());
                redirect('pages/db_authProfile');
            }
        }
    }
    

    public function deleteProfilePic() {
     
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        
        if ($user_id) {
       
            $this->load->model('user_model');
            
            $userData = $this->user_model->select_user_by_id($user_id);
            
            if (!empty($userData->profile_pic)) {
       
                $profilePicPath = './images/' . $userData->profile_pic;
                
                if (file_exists($profilePicPath)) {
               
                    if (unlink($profilePicPath)) {
                      
                        $data = array('profile_pic' => ''); 
                        $this->user_model->updateUsers($data, $user_id);
                        
                        $this->session->set_flashdata('success', 'Profile picture deleted successfully.');
                    } else {
                     
                        $this->session->set_flashdata('error', 'Failed to delete profile picture.');
                    }
                } else {
                   
                    $this->session->set_flashdata('error', 'Profile picture not found.');
                }
            } else {
             
                $this->session->set_flashdata('error', 'No profile picture found for the user.');
            }
        } else {

            $this->session->set_flashdata('error', 'User ID not found.');
        }
        
        redirect('pages/db_authProfile');
    }
    
    public function db_Users() {
        $data['users'] = $this->User_model->get_users();
        $this->load->view('templates/headerAdmin');
        $this->load->view('pages/db_Users', $data);
        $this->load->view('templates/footerAdmin');

    }

    public function create() {
        $this->form_validation->set_rules('complete_name', 'Complete Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pword', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/create');
        } else {
            $data = array(
                'complete_name' => $this->input->post('complete_name'),
                'email' => $this->input->post('email'),
                'pword' => password_hash($this->input->post('pword'), PASSWORD_DEFAULT), // Hash the password
                'role' => $this->input->post('role'),
                'status' => $this->input->post('status'),
                'date_created' => date('Y-m-d H:i:s'), // Current date and time
                'profile_pic' => 'default.jpg' // Default profile picture
            );
            $this->User_model->add_user($data);
            redirect('users');
        }
    }

    public function edit($userid) {
        $this->form_validation->set_rules('complete_name', 'Complete Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $data['user'] = $this->User_model->get_user($userid);
            $this->load->view('users/edit', $data);
        } else {
            $data = array(
                'complete_name' => $this->input->post('complete_name'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role'),
                'status' => $this->input->post('status')
            );
            $this->User_model->update_user($userid, $data);
            redirect('users');
        }
    }

    public function delete($userid) {
        $this->User_model->delete_user($userid);
        redirect('users');
    } 
    
}


