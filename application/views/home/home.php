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
        .thick-hr {
            border: 0; /* Removes the default border */
            height: 4px; /* Adjust the height to make it thicker */
            background-color: #ddd; /* Adjust the color as needed */
            margin: 1em 0; /* Optional: adjust the margin as needed */
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
                            Volumes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($volumes as $volume): ?>
                                <li><a class="dropdown-item" href="#volume-<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></a></li>
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
                        <h2>CENTRAL MINDANAO UNIVERSITY</h2>
                        <span class="subheading">Journal of Science</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Volume Sections -->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php foreach ($volumes as $volume): ?>
                    <hr class="my-4 thick-hr" />
                    <div id="volume-<?php echo $volume['volumeid']; ?>" class="volume-section">
                        <h1><a href="<?php echo site_url('home/viewVolume/'.$volume['volumeid']); ?>"><?php echo $volume['vol_name']; ?></a></h1>
                        <?php 
                        $hasArticles = false;
                        foreach ($articleData as $article): 
                            if ($article->volumeid == $volume['volumeid']):
                                $hasArticles = true; ?>
                                <div class="post-preview">
                                    <a href="<?php echo site_url('home/post/'.$article->slug); ?>">
                                        <h4 class="post-title"><?php echo $article->title; ?></h4>
                                        <p><strong>DOI:</strong> <?php echo $article->doi; ?></p>
                                        <p><strong>Keywords:</strong> <?php echo $article->keywords; ?></p>
                                        <p class="post-subtitle"><?php echo isset($article->abstract) && strlen($article->abstract) > 100 ? substr($article->abstract, 0, 100) . '...' : $article->abstract; ?></p>
                                    </a>
                                    <p class="post-meta">
                                        Authors:
                                        <span class="meta">
                                            <small>
                                                <?php if (!empty($article->authors)): ?>
                                                    <?php foreach ($article->authors as $index => $author): ?>
                                                        <a href="#!"><?php echo $author->author_name; ?></a><?php echo $index < count($article->authors) - 1 ? ', ' : ''; ?>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <a href="#!">Unknown Author</a>
                                                <?php endif; ?>
                                            </small>
                                            <br>Published On: <?php echo date('F d, Y', strtotime($article->created_at)); ?>
                                        </span>
                                    </p>
                                    <div class="d-flex justify-content-end mb-4">
                                        <a class="btn btn-primary text-uppercase" href="<?php echo site_url('home/post/'.$article->slug); ?>"><small> Read More... </small></a>
                                    </div>
                                </div>
                                <hr class="my-4" />
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php if (!$hasArticles): ?>
                            <p>No published articles belong to this volume.</p>
                        <?php endif; ?>
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- Custom JS for smooth scrolling -->
    <script>
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', event => {
                event.preventDefault();
                const targetId = event.target.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                const navbarHeight = document.querySelector('.navbar').offsetHeight;
                
                window.scrollTo({
                    top: targetElement.offsetTop - navbarHeight,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>