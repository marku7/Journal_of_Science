<?php
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Routes for landing page
$route['contact'] = 'home/contact';
$route['post'] = 'home/post';
$route['about'] = 'home/about';

// Routes for logged-in users
$route['home_lp'] = 'home/home_lp';
$route['contact_lp'] = 'home/contact_lp'; 
$route['post_lp'] = 'home/post_lp';
$route['about_lp'] = 'home/about_lp';

$route['home_admin'] = 'home/home_admin';
$route['contact_admin'] = 'home/contact_admin'; 
$route['post_admin'] = 'home/post_admin';
$route['about_admin'] = 'home/about_admin';


// Registration routes
$route['login'] = 'registration/login'; 
$route['signup'] = 'registration/signup'; 
$route['registration/signup']['POST'] = 'registration/registerNow'; 
$route['registration/login']['POST'] = 'registration/loginNow';
$route['registration/registration_confirm'] = 'registration/registration_confirm';

// Pages
$route['pages/dashboard_author'] = 'pages/dashboard_author'; 
$route['pages/articleDisplay'] = 'pages/articleDisplay'; 
$route['pages/db_authUpdate/(:any)'] = 'pages/db_authUpdate/$1';
$route['pages/updateNow/(:any)'] = 'pages/updateNow/$1';
$route['pages/db_setAuthorProf'] = 'pages/db_setAuthorProf';
$route['pages/db_AuthorProf'] = 'pages/db_AuthorProf';
$route['pages/db_AuthorsProfile'] = 'pages/db_AuthorsProfile';
$route['pages/dashboard_admin'] = 'pages/dashboard_admin'; 
$route['pages/db_adminProfile'] = 'pages/db_adminProfile';
$route['pages/db_allArticles'] = 'pages/db_allArticles';
$route['pages/db_AdminUpdate'] = 'pages/db_AdminUpdate';
$route['pages/db_AdminUpdate2'] = 'pages/db_AdminUpdate2';
$route['volume/db_Volumes'] = 'volume/db_Volumes';
$route['volume/db_createVolumes'] = 'volume/db_createVolumes';
$route['volume/db_editVolume'] = 'volume/db_editVolume';
$route['Users/db_Users'] = 'Users/db_Users';
$route['pages/db_authorList'] = 'pages/db_authorList';
$route['pages/editArticle'] = 'pages/editArticle';
$route['pages/add_author'] = 'pages/add_author';
$route['pages/edit_author'] = 'pages/edit_author';


$route['pages/editArticle/(:any)'] = 'pages/editArticle/$1';


// Posts
$route['posts/post_index'] = 'posts/post_index'; 
$route['posts/create'] = 'posts/create';

// Catch-all route for other pages
$route['(:any)'] = 'pages/home/$1'; 
