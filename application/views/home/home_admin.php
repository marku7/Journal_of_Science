<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>CMU JS</title>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/img/cmujus.png')?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="    " rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url ('css/home/styles.css" rel="stylesheet')?>" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="<?php echo base_url('home/home_admin'); ?>">CMU JS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Your existing menu items -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/home_admin'); ?>">Home</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/about_admin'); ?>">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/contact_admin'); ?>">Contact</a></li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Separate "Login" and "Register" links -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('pages/dashboard_admin'); ?>">Dashboard</a></li>
                <br> <!-- Add <br> tag here -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('pages/db_adminProfile'); ?>"><?php 
            if($this->session->userdata('UserLoginSession')) {
                echo $userData->complete_name;
            }  
        ?></a>
          <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/logOut'); ?>">Logout</a></li>
    </li>
            </ul>
        </div>
    </div>
</nav>

        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?php echo base_url('assets/img/cmu.jpg'); ?>')">           
         <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h2>CENTRAL MINDANAO UNIVERSITY</h2>
                            <span class="subheading">Journal of Science</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <?php foreach ($articleData as $article): ?>
<!-- Inside the foreach loop -->
<div class="post-preview">
    <a href="<?php echo site_url('home/post_admin/'.$article->slug); ?>">
    
        <h2 class="post-title"><?php echo $article->title; ?></h2>
        <p><strong>Volume:</strong> <?php echo $article->vol_name; ?></p>
    <p><strong>DOI:</strong> <?php echo $article->doi; ?></p>
    <p><strong>Keywords:</strong> <?php echo $article->keywords; ?></p>
        <p class="post-subtitle"><?php echo isset($article->abstract) && strlen($article->abstract) > 100 ? substr($article->abstract, 0, 100) . '...' : $article->abstract; ?></p>
    </a>
    <!-- Display additional information -->

    <p class="post-meta">
        Author:
        <span class="meta">
<small><a href="#!"><?php echo $article->author_name; ?><br></a> Published On: <?php echo date('F d, Y', strtotime($article->created_at)); ?></small>
        </span>
    </p>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-primary text-uppercase" href="<?php echo site_url('home/post_admin/'.$article->slug); ?>"><small> Read More... </small></a>
    </div>
</div>


            <!-- Divider-->
            <hr class="my-4" />
        <?php endforeach; ?>
    </div>
</div>
        </div>
    </div>
</div>

        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; CMU JS</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo base_url('js/scripts.js')?>"></script>
    </body>
</html>
