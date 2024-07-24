<?php

class Author extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Author_model');
    }

    public function profile() {

        $uid = $this->session->userdata('UserLoginSession')['userid'];
        

        $data['author'] = $this->Author_model->getAuthorProfile($uid);
        

        $this->load->view('pages/db_AuthorPof', $data);
    }

    public function saveProfile() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == TRUE) {

            $uid = $this->session->userdata('UserLoginSession')['userid'];

            $data = array(
                'uid' => $uid,
                'author_name' => $this->input->post('author_name'),
                'email' => $this->input->post('email'),
                'contact_num' => $this->input->post('contact_num'),
                'title' => $this->input->post('title')
            );


            if ($this->Author_model->authorExists($uid)) {

                $this->Author_model->updateAuthor($data);
            } else {

                $this->Author_model->insertAuthor($data);
            }

            $this->session->set_flashdata('success', 'Profile saved successfully.');
            redirect(base_url('pages/db_AuthorsProfile'));
        } else {

            $this->profile();
        }
    }

    public function saveProfile2() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == TRUE) {

            $uid = $this->session->userdata('UserLoginSession')['userid'];

            $data = array(
                'uid' => $uid,
                'author_name' => $this->input->post('author_name'),
                'email' => $this->input->post('email'),
                'contact_num' => $this->input->post('contact_num'),
                'title' => $this->input->post('title')
            );


            if ($this->Author_model->authorExists($uid)) {

                $this->Author_model->updateAuthor($data);
            } else {

                $this->Author_model->insertAuthor($data);
            }

            $this->session->set_flashdata('success', 'Profile saved successfully.');
            redirect(base_url('pages/db_AuthorProf'));
        } else {

            $this->profile();
        }
    }


    // Add new author
    public function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact_num', 'Contact Number', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('add_author');
        } else {
            $data = array(
                'author_name' => $this->input->post('author_name'),
                'email' => $this->input->post('email'),
                'contact_num' => $this->input->post('contact_num'),
                'title' => $this->input->post('title')
            );
            $this->Author_model->add_author($data);
            redirect('pages/db_authorList');
        }
    }

    // Edit existing author
    public function edit($audid) {
        $data['author'] = $this->Author_model->get_author($audid);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('contact_num', 'Contact Number', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('edit_author', $data);
        } else {
            $author_data = array(
                'author_name' => $this->input->post('author_name'),
                'email' => $this->input->post('email'),
                'contact_num' => $this->input->post('contact_num'),
                'title' => $this->input->post('title')
            );
            $this->Author_model->update_author($audid, $author_data);
            redirect('pages/db_authorList');
        }
    }

    // Delete author
    public function delete($audid) {
        $this->Author_model->delete_author($audid);
        redirect('pages/db_authorList');
    }
}
