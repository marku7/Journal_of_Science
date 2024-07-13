<?php
require_once(APPPATH.'core/Base_Controller.php');
class Posts extends BASE_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Posts_model');
        $this->load->model('User_model');
        $this->load->library('upload'); 
    }
    

    public function index() {
        $data['title'] = 'Latest Post';
        $data['articles'] = $this->Posts_model->get_posts();
    
        $this->load->view('templates/header');
        $this->load->view('posts/post_index', $data);
        $this->load->view('templates/footer');
    }
    
    public function view($slug = NULL) {
    
        $data['articles'] = $this->Posts_model->get_posts($slug);
    
    
        $data['title'] = $data['articles']->title;
        $data['created_at'] = $data['articles']->created_at;
        
    

        $this->load->view('posts/view', $data);

    }
    
    public function create($page = 'create') {
       
    
        $data['title'] = 'Create Post';
    
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('file', 'File', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load_view($page, $info);
        } else {
          
        }
        } else {
           
            $upload_data = $this->upload->data(); 
            $this->Posts_model->create_post($upload_data);
            redirect('posts/view/' . $this->input->post('slug'));
        }
    }
    
    protected function load_view($page, $data = array()) {
        if (!file_exists(APPPATH . 'views/posts/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page);
    
        $this->load->view('templates/header', $data);
        $this->load->view('posts/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
    

    
}    
