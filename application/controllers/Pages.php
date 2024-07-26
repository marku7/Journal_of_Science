<?php
require_once(APPPATH.'core/Base_Controller.php');

class Pages extends Base_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Article_model');
        $this->load->model('Author_model');
    }

    public function dashboard_authors($page = 'dashboard_authors') {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load_view($page, $info);
        } else {
            show_404();
        }
    }
    
    public function dashboard_admin($page = 'dashboard_admin') {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load_view2($page, $info);
        } else {
            show_404();
        }

    }

    public function db_allArticles() {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
    
            // Fetch articles and pass them to the view
            $articles = $this->Article_model->get_all_articles2();

           
            $info['submittedArticles'] = $articles;
    
            $this->load_view2('db_allArticles', $info);
        } else {
            show_404();
        }
    }
    

    public function add_author() {

        $data['authors'] = $this->Author_model->get_all_authors();
        $this->load_view2('add_author', $data);
    }

    public function edit_author($audid) {
        $data['author'] = $this->Author_model->get_author($audid);
        $this->load->view('pages/edit_author', $data);
    }
    
     
    public function delete($articleid) {
        $this->Article_model->delete_article($articleid);
        redirect('articles/db_allArticles');
    }
    


    public function archiveVolume($volumeid) {
        $this->load->model('Volume_model');
        $this->Volume_model->archiveVolume($volumeid);
        redirect('volume/db_Volumes');
    }   

    public function unArchiveVolume($volumeid) {
        $this->load->model('Volume_model');
        $this->Volume_model->unArchiveVolume($volumeid);
        redirect('volume/db_Volumes');
    }

    public function db_AuthorProf($page = 'db_AuthorProf') {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            
            // Load Author_model
            $this->load->model('Author_model');
            // Fetch author profile data
            $author = $this->Author_model->getAuthorProfile($user_id);
            // Check if author data exists
            if ($author) {
                $info['author'] = $author;
            } else {
                // Initialize empty author data
                $info['author'] = (object) array(
                    'author_name' => '',
                    'email' => '',
                    'contact_num' => '',
                    'title' => ''
                );
            }
            
            $this->load_view($page, $info);
        } else {
            show_404();
        }
    }
    
    

    public function db_authArticles($page = 'db_authArticles') {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            // Fetch user data
            $userData = $this->User_model->select_user_by_id($user_id);
            
            // Fetch articles submitted by the author profile of the user
            $submittedArticles = $this->Article_model->getSubmittedArticlesByUserId($user_id);
            
            // Pass data to the view
            $data['userData'] = $userData;
            $data['submittedArticles'] = $submittedArticles;
            $this->load_view($page, $data);
        } else {
            // If user is not logged in, show 404 error
            show_404();
        }
    }
    
    public function db_authProfile($page = 'db_authProfile') {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load_view($page, $info);
        } else {
            show_404();
        }
    }

    public function db_AuthorsProfile($page = 'db_AuthorProf') {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            
            // Load Author_model
            $this->load->model('Author_model');
            // Fetch author profile data
            $author = $this->Author_model->getAuthorProfile($user_id);
            // Check if author data exists
            if ($author) {
                $info['author'] = $author;
            } else {
                // Initialize empty author data
                $info['author'] = (object) array(
                    'author_name' => '',
                    'email' => '',
                    'contact_num' => '',
                    'title' => ''
                );
            }
            
            $this->load_view2($page, $info);
        } else {
            show_404();
        }
    }
    

    public function db_adminProfile($page = 'db_authProfile') {
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if ($user_id) {
            $userData = $this->User_model->select_user_by_id($user_id);
            $info['userData'] = $userData;
            $this->load_view2($page, $info);
        } else {
            show_404();
        }
    }


    public function db_authSubmission($page = 'db_authSubmission') {
        // Check if the user is logged in
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if (!$user_id) {
            show_404();
            return;
        }
    
        // Get user data
        $userData = $this->User_model->select_user_by_id($user_id);
        if (!$userData || !is_object($userData)) {
            show_404(); // Or handle the case where $userData is not valid
            return;
        }
    
        // Load necessary data for the view
        $info['userData'] = $userData;
        $this->load->model('Volume_model');
        $volumes = $this->Volume_model->getVolumes();
        $info['volumes'] = $volumes;
    
        // Check if the user has an author profile
        $authorData = $this->Author_model->getAuthorByUserId($user_id);
        if ($authorData) {
            // Load the submission view
            $this->load_view($page, $info);
        } else {
            // Redirect to the author profile registration page
            redirect('pages/db_AuthorProF');
        }
    }

    public function db_authSubmission2($page = 'db_authSubmission2') {
        // Check if the user is logged in
        $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
        if (!$user_id) {
            show_404();
            return;
        }
    
        // Get user data
        $userData = $this->User_model->select_user_by_id($user_id);
        if (!$userData || !is_object($userData)) {
            show_404(); // Or handle the case where $userData is not valid
            return;
        }
    
        // Load necessary data for the view
        $info['userData'] = $userData;
        $this->load->model('Volume_model');
        $volumes = $this->Volume_model->getVolumes();
        $info['volumes'] = $volumes;

        $this->load->model('Author_model');
        $authors = $this->Author_model->get_authors();
        $info['authors'] = $authors;
    
        // Check if the user has an author profile
        $authorData = $this->Author_model->getAuthorByUserId($user_id);
        if ($authorData) {
            // Load the submission view
            $this->load_view2($page, $info);
        } else {
            // Redirect to the author profile registration page
            redirect('pages/db_AuthorsProfile');
        }
    }
    
    
    
    

    public function edit_article($aricleId, $page = 'pages/edit_article') {
        $this->load->view('templates/headerAdmin');
    }

    public function db_authUpdate($slug, $page = 'pages/db_authUpdate') {
        $this->load->view('templates/header');
        
        $data['article'] = $this->Article_model->editArticle($slug);
        
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

    public function db2_authUpdate($slug, $page = 'pages/db_authUpdate') {
        $this->load->view('templates/header');
        
        $data['article'] = $this->Article_model->editArticle($slug);
        
        $this->load->view($page, $data);
        $this->load->view('templates/footer');
    }

    public function db_AdminUpdate($slug, $page = 'pages/db_AdminUpdate') {
        $this->load->model('Volume_model');
        $volumes = $this->Volume_model->getVolumes();
    
        $this->load->model('Article_model');
        $article = $this->Article_model->editArticle($slug);
    
        $data['volumes'] = $volumes;
        $data['article'] = $article;
    
        $this->load->view('templates/headerAdmin');
        $this->load->view($page, $data);
        $this->load->view('templates/footerAdmin');
    }
    
    public function db_AdminUpdate2($slug, $page = 'pages/db_AdminUpdate') {
        $this->load->model('Volume_model');
        $volumes = $this->Volume_model->getVolumes();
    
        $this->load->model('Article_model');
        $article = $this->Article_model->editArticle($slug);
    
        $data['volumes'] = $volumes;
        $data['article'] = $article;
    
        $this->load->view('templates/headerAdmin');
        $this->load->view($page, $data);
        $this->load->view('templates/footerAdmin');
    }
    
    

    public function submitNow() {
        if ($this->input->server("REQUEST_METHOD") == 'POST') {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'required');
            $this->form_validation->set_rules('abstract', 'Abstract', 'required');
    
            if ($this->form_validation->run() == TRUE) {
                $user_filename = $this->uploadFile();
    
                if ($user_filename) {
                    $title = $this->input->post('title');
                    $keywords = $this->input->post('keywords');
                    $abstract = $this->input->post('abstract');
                    $slug = url_title($title, 'dash', TRUE);
    
                    $doi_prefix = 'DOI'; 
                    $unique_identifier = uniqid(); 
                    $doi = $doi_prefix . ':' . $unique_identifier;
    
                    // Get the user ID of the author who submitted the article
                    $user_id = $this->session->userdata('UserLoginSession')['userid'] ?? null;
    
                    if ($user_id) {
                        // Get the author ID (auid) based on the user ID
                        $this->load->model('Author_model');
                        $author_id = $this->Author_model->getAuthorIdByUserId($user_id);
    
                        if ($author_id) {
                            $data = array(
                                'title' => $title,
                                'slug' => $slug,
                                'keywords' => $keywords,
                                'abstract' => $abstract,
                                'filename' => $user_filename,
                                'doi' => $doi,
                                'isPublished' => 0,
                                'isArchived' => 0
                            );
    
                            $this->load->model('Article_model');
                            $article_id = $this->Article_model->insertarticle($data); // Get the article ID
    
                            if ($article_id) {
                                // Insert into article_author table
                                $this->Article_model->insertArticleAuthor($article_id, $author_id);
    
                                // Insert into article_submission table
                                $submission_data = array(
                                    'auid' => $author_id,
                                    'article_id' => $article_id,
                                    'slug' => $slug,
                                    'filename' => $user_filename,
                                    'submission' => 1,
                                    'date_submitted' => date('Y-m-d H:i:s'),
                                    'payment' => 0,
                                    'date_paid' => null,
                                    'review' => 0,
                                    'date_forwarded_review' => null,
                                    'approved' => 0,
                                    'date_approved' => null,
                                    'published' => 0,
                                    'date_published' => null
                                );
    
                                $this->Article_model->insertArticleSubmission($submission_data);
    
                                $this->session->set_flashdata('success', 'Article submitted successfully!');
                                redirect(base_url('home/home_lp'));
                            } else {
                                $this->session->set_flashdata('error', 'Failed to submit article. Could not insert article data.');
                                redirect(base_url('article/submitForm'));
                            }
                        } else {
                            $this->session->set_flashdata('error', 'Author ID not found.');
                            redirect(base_url('article/submitForm'));
                        }
                    } else {
                        $this->session->set_flashdata('error', 'User not logged in.');
                        redirect(base_url('article/submitForm'));
                    }
                } else {
                    $this->session->set_flashdata('error', 'File upload failed.');
                    redirect(base_url('article/submitForm'));
                }
            } else {
                $this->session->set_flashdata('error', validation_errors());
                redirect(base_url('article/submitForm'));
            }
        }
    }
    
    private function uploadFile() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048; // 2MB
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            return null;
        }
    }
    
    
    public function updateNow2($slug) {
        $this->form_validation->set_rules('title', 'Title', 'required');
    
        if ($this->form_validation->run()) {
            $previous_file = $this->input->post('previous_file');
            $config = [
                'upload_path' => "./files/",
                'allowed_types' => "pdf",
                'file_name' => time() . "-" . str_replace(' ', '-', $_FILES["new_file"]["name"]),
            ];
    
            if (!empty($_FILES["new_file"]["name"])) {
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('new_file')) {
                    if (!empty($previous_file) && file_exists("./files/".$previous_file)) {
                        unlink("./files/".$previous_file);
                    }
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url('pages/db_authUpdate/' . $slug));
                }
            }
    
            $data = array(
                'title' => $this->input->post('title'),
                'keywords' => $this->input->post('keywords'),
                'abstract' => $this->input->post('abstract'),
                
            );
    
            if (!empty($_FILES["new_file"]["name"])) {
                $data['filename'] = $config['file_name'];
            }
    
            $this->Article_model->updateArticle($data, $slug);
    
            // Update article_submission table
            $submission_data = array(
                'title' => $this->input->post('title'),
                'filename' => (!empty($_FILES["new_file"]["name"])) ? $config['file_name'] : null
            );
    
            // Get submission id based on slug
            $submission_id = $this->Article_model->getSubmissionIdBySlug($slug);
    
            if ($submission_id) {
                $this->Article_model->updateArticleSubmission($submission_data, $submission_id);
            }
    
            $this->session->set_flashdata('success', 'Updating Successful!');
            redirect(base_url('pages/db_authArticles')); // Redirect to db_authArticles upon successful update
        } else {
            return $this->db2_authUpdate($slug);
        }
    }
    
    public function updateNow3($slug) {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $this->form_validation->set_rules('volume_id', 'Volume', 'required');
    
        if ($this->form_validation->run()) {
            $previous_file = $this->input->post('previous_file');
            $config = [
                'upload_path' => "./files/",
                'allowed_types' => "pdf",
                'file_name' => time() . "-" . str_replace(' ', '-', $_FILES["new_file"]["name"]),
            ];
    
            if (!empty($_FILES["new_file"]["name"])) {
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('new_file')) {
                    if (!empty($previous_file) && file_exists("./files/".$previous_file)) {
                        unlink("./files/".$previous_file);
                    }
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url('pages/db_allArticles/' . $slug));
                }
            }
    
            $data = array(
                'title' => $this->input->post('title'),
                'keywords' => $this->input->post('keywords'),
                'abstract' => $this->input->post('abstract'),
                'volumeid' => $this->input->post('volume_id'), // Add volume_id here
            );
    
            if (!empty($_FILES["new_file"]["name"])) {
                $data['filename'] = $config['file_name'];
            }
    
            $this->Article_model->updateArticle($data, $slug);
    
            // Update article_submission table
            $submission_data = array(
                'title' => $this->input->post('title'),
                'filename' => (!empty($_FILES["new_file"]["name"])) ? $config['file_name'] : null,
                'volume_id' => $this->input->post('volume_id') // Add volume_id here
            );
    
            // Get submission id based on slug
            $submission_id = $this->Article_model->getSubmissionIdBySlug($slug);
    
            if ($submission_id) {
                $this->Article_model->updateArticleSubmission($submission_data, $submission_id);
            }
    
            $this->session->set_flashdata('success', 'Updating Successful!');
            redirect(base_url('pages/db_allArticles'));
        } else {
            return $this->db_AdminUpdate($slug); // Correct method name for redirecting to the update page
        }
    }
    
    public function updateNow4($slug) {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $this->form_validation->set_rules('volume_id', 'Volume', 'required');
    
        if ($this->form_validation->run()) {
            $previous_file = $this->input->post('previous_file');
            $config = [
                'upload_path' => "./files/",
                'allowed_types' => "pdf",
                'file_name' => time() . "-" . str_replace(' ', '-', $_FILES["new_file"]["name"]),
            ];
    
            if (!empty($_FILES["new_file"]["name"])) {
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('new_file')) {
                    if (!empty($previous_file) && file_exists("./files/".$previous_file)) {
                        unlink("./files/".$previous_file);
                    }
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect(base_url('home/home_admin/' . $slug));
                }
            }
    
            $data = array(
                'title' => $this->input->post('title'),
                'keywords' => $this->input->post('keywords'),
                'abstract' => $this->input->post('abstract'),
                'volumeid' => $this->input->post('volume_id'), // Add volume_id here
            );
    
            if (!empty($_FILES["new_file"]["name"])) {
                $data['filename'] = $config['file_name'];
            }
    
            $this->Article_model->updateArticle($data, $slug);
    
            // Update article_submission table
            $submission_data = array(
                'title' => $this->input->post('title'),
                'filename' => (!empty($_FILES["new_file"]["name"])) ? $config['file_name'] : null,
                'volume_id' => $this->input->post('volume_id') // Add volume_id here
            );
    
            // Get submission id based on slug
            $submission_id = $this->Article_model->getSubmissionIdBySlug($slug);
    
            if ($submission_id) {
                $this->Article_model->updateArticleSubmission($submission_data, $submission_id);
            }
    
            $this->session->set_flashdata('success', 'Updating Successful!');
            redirect(base_url('home/home_admin'));
        } else {
            return $this->db_AdminUpdate2($slug); // Correct method name for redirecting to the update page
        }
    }
    
    


    public function articles($page = 'articles') {
        $query = $this->db->get('articles');
        $articles_data = $query->result_array();
        $data['articles'] = $articles_data;
        $this->load_view($page, $data);
    }

    public function users($page = 'users') {
        $data['users'] = $this->User_model->get_all_users();
        $this->load_view($page, $data);
    }

    protected function load_view($page, $data = array()) {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page);
    
        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

    protected function load_view2($page, $data = array()) {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = ucfirst($page);
    
        $this->load->view('templates/headerAdmin', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footerAdmin', $data);
    }

    public function articleDisplay($page='pages/articleDisplay') {
        $this->load->view('templates/header');
        $this->load->view($page);
        $this->load->view('templates/footer');
    }

    public function db_setAuthorProf($page='pages/db_setAuthorProf') {
        $this->load->view('templates/header');
        $this->load->view($page);
        $this->load->view('templates/footer');
    }

     public function deleteNow($slug) {
        // Load the model
        $this->load->model('Article_model');

        // Call the delete method in the model
        $result = $this->Article_model->delete_article($slug);

        // Redirect to a suitable page after deletion
        if ($result) {
            redirect('pages/db_authArticles');
        } else {
            redirect('pages/error_delete');
        }
    }


    // You can add more methods for success and error pages if needed
    public function success_delete() {
        $this->load->view('success_delete_view');
    }

    public function error_delete() {
        $this->load->view('error_delete_view');
    }
    // Pages.php


    public function deleteArticle($articleId) {
        // Load the Article_model
        $this->load->model('Article_model');
        
        // Call the delete_article method in the Article_model
        $result = $this->Article_model->delete_article($articleId);
    
        if ($result) {
            // If deletion is successful, redirect to the page where the articles are listed
            redirect('pages/db_allArticles');
        } else {
            // If deletion fails, show an error message
            echo "Failed to delete article.";
        }
    }

    

    public function editArticle($articleid) {
        $this->load->model('Article_model');
        $data['article'] = $this->Article_model->get_article_by_id($articleid);
        
        if (!$data['article']) {
            show_404();
        }

        $this->load_view2('edit_article', $data);
    }

    public function updateArticle() {
        $this->load->model('Article_model');

        // Fetch the article ID from the form
        $articleid = $this->input->post('articleid');
        
        // Prepare the article data
        $articleData = array(
            'title' => $this->input->post('title'),
            'filename' => $this->input->post('filename'),
            'payment' => $this->input->post('payment') ? 1 : 0,
            'review' => $this->input->post('review') ? 1 : 0,
            'approved' => $this->input->post('approved') ? 1 : 0,
            'published' => $this->input->post('published') ? 1 : 0
        );

        // Update the article
        $result = $this->Article_model->update_article_submission($articleid, $articleData);

        // Redirect to the articles list page
        if ($result) {
            redirect('pages/db_allArticles');
        } else {
            echo "Failed to update article.";
        }
    }

    public function publishArticle($articleid) {
        $this->Article_model->publishArticle($articleid);
        redirect('pages/db_allArticles');
    }

    public function unPublishArticle($articleid) {
        $this->Article_model->unPublishArticle($articleid);
        redirect('pages/db_allArticles');
    }
    
    
    public function db_authorList() {
        $data['authors'] = $this->Author_model->get_all_authors();
        $this->load_view2('db_authorList', $data);
    }

}

