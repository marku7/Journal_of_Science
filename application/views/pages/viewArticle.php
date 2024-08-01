<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>CMU JS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url('css/home/styles.css" rel="stylesheet')?>" />
    <style>
        .masthead {
            position: relative;
        }
        .action-icons {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 10px;
        }
        .action-icons a {
            font-size: 32px;
            color: #fff;
        }
        .action-icons a:hover {
            color: #ddd;
        }
    </style>
</head>
<body>

<header class="masthead" style="background-image: url('<?php echo base_url('assets/img/post-bg.jpg'); ?>')">
    <div class="action-icons">
        <a href="#" onclick="confirmDelete('<?= $articleData->articleid; ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete Article"></i></a>
        <a href="<?= base_url('pages/db_AdminUpdateV/' . $articleData->slug); ?>"><i class="fa fa-edit" aria-hidden="true" title="Edit Article"></i></a>
        <?php if ($articleData->isPublished == 0): ?>
            <a href="<?= base_url('pages/publishArticleV/' . $articleData->articleid); ?>"><i class="fa fa-toggle-off" aria-hidden="true" title="Publish Article"></i></a>
        <?php else: ?>
            <a href="<?= base_url('pages/unPublishArticleV/' . $articleData->articleid); ?>"><i class="fa fa-toggle-on" aria-hidden="true" title="Unpublish Article"></i></a>
        <?php endif; ?>
    </div>
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h2><?php echo $articleData->title; ?></h2>
                    <p><strong>Volume:</strong> <?php echo $articleData->vol_name; ?></p>
                    <p><strong>DOI:</strong> <?php echo $articleData->doi; ?></p>
                    <p><strong>Keywords:</strong> <?php echo $articleData->keywords; ?></p>
                    <span class="meta">
                        Author/s:
                        <small>
                        <?php echo $articleData->author; ?>
                        </small> 
                        <br>Date: <?php echo date('F d, Y', strtotime($articleData->created_at)); ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <h1>Abstract</h1>
                <p><?php echo $articleData->abstract; ?></p>
            </div>
        </div>
    </div>
</article>

<!-- Bootstrap core JS-->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="<?php echo base_url('js/scripts.js')?>"></script>
<script>
    function confirmDelete(articleId) {
        if (confirm("Are you sure you want to delete this article?")) {
            window.location.href = "<?php echo base_url('pages/deleteArticle/') ?>" + articleId;
        }
    }
</script>
</body>
</html>
