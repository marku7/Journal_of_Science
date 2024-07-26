<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMU JS</title>
    <link rel="icon" type="image/x-icon" href="assets/img/cmujus.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('css/home/styles.css'); ?>" rel="stylesheet" />
    <style>
        .volume-section {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: transform 0.3s ease;
        }
        .volume-section:hover {
            transform: scale(1.02);
        }
        .volume-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">CMU JS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-lg-3 py-3 py-lg-4" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Archived Volumes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($volumes as $volume): ?>
                                <li><a class="dropdown-item" href="<?php echo site_url('home/viewVolumeArchive/'.$volume['volumeid']); ?>"><?php echo $volume['vol_name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/archive'); ?>">Archives</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/about'); ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/contact'); ?>">Contact</a></li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/login'); ?>">Login</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/signup'); ?>">Register</a></li>
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
                        <h2>Archives</h2>
                        <span class="subheading">Journal of Science</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php foreach ($volumes as $volume): ?>
                <div id="volume-<?php echo $volume['volumeid']; ?>" class="volume-section">
                    <a href="<?php echo site_url('home/viewVolumeArchive/'.$volume['volumeid']); ?>" class="volume-link">
                        <h2><?php echo $volume['vol_name']; ?></h2>
                        <p><?php echo $volume['description']; ?></p>
                        <small><b>Date Published:</b> <?php echo date('F d, Y', strtotime($volume['date_published'])); ?></small>
                    </a>
                </div>
            <?php endforeach; ?>
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
    <script src="<?php echo base_url('js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url('js/scripts.js'); ?>"></script>
    <!-- Custom JS for smooth scrolling -->
</body>
</html>
