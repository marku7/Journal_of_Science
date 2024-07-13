<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMU JS - Login</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="    " rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url ('css/home/styles.css" rel="stylesheet')?>" />

    <!-- Custom CSS for dark green color -->
     <!-- Custom CSS for dark green color -->
     <style>
        .bg-dark-green {
            background-color: #006400; /* Dark green color code */
        }
        .btn-dark-green {
            background-color: #006400; /* Dark green color code */
            border-color: #006400; /* Dark green color code */
            color: #fff; /* Text color */
            transition: all 0.3s; /* Smooth transition */
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3); /* Add box-shadow for 3D effect */
        }

        .btn-dark-green:hover {
            background-color: #004d00; /* Darker shade of green on hover */
            border-color: #004d00; /* Darker shade of green on hover */
            color: #fff; /* Text color on hover */
            transform: translateY(-2px); /* Move button up slightly on hover for 3D effect */
        }

        .card {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); /* Add box-shadow to card for 3D effect */
            max-width: 500px; /* Adjust the maximum width of the card */
            margin: auto; /* Center the card horizontally */
            padding: 20px; /* Add some padding */
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
                    <!-- Your existing menu items -->
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url(); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/about'); ?>">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/post'); ?>">Current Issue</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('home/contact'); ?>">Contact</a></li>
                </ul>
                <!-- Login Form -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Separate "Login" and "Register" links -->
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?php echo base_url('registration/login'); ?>">Login</a></li>
                <br> <!-- Add <br> tag here -->
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
                    <div class="site-heading mb-4">
                        <h2>CENTRAL MINDANAO UNIVERSITY</h2>
                        <span class="subheading">Journal of Science</span>
                    </div> 
                    
                    <!-- Login Form-->
<div class="card">
<div class="card-header bg-white text-Black text-center fw-bold">Welcome</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Registration Successful!</h5>
        <p class="card-text">Thank you for registering. Your account will be reviewed shortly. Please wait for an email notification.</p>
        <a href="<?php echo base_url(); ?>" class="btn btn-dark-green">Back to Home</a>
    </div>
</div>

    </div>
</div>

                </div>
            </div>
        </div>
    </header>

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Your content goes here -->
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
