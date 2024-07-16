<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
          crossorigin="anonymous"/>
    <style>
        /* Custom CSS styles */
        body {
            font-family: 'Roboto', sans-serif; /* Change font family */
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            padding-top: 20px;
            margin: auto;
            max-width: 1400px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .actions {
            text-align: center;
        }

        .actions-add a,
        .actions-add button {
            margin-right: 10px;
            padding: 6px 12px;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 12px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .actions a:hover,
        .actions button:hover {
            background-color: #343A40;
        }

        .file-link {
            color: #007bff;
        }

        .file-link:hover {
            text-decoration: underline;
        }

        .abstract {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            color: #666;
        }

        h1.title {
            text-align: center; /* Center-align the title */
            color: #4CAF50;
            margin-bottom: 20px;
            text-transform: uppercase; /* Transform text to uppercase */
            font-size: 25px; /* Increase font size */
            border-bottom: 2px solid #4CAF50; /* Add a bottom border */
            padding-bottom: 10px; /* Add some space below the title */
        }
        .actions {
            font-size: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="title">Articles</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Actions</th>
                <th>Author Name</th>
                <th>Volume</th>
                <th>Title</th>
                <th>File</th>
                <th>Date Published</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="actions-add">
                    <a href="<?php echo base_url('pages/db_authSubmission2') ?>" class="btn btn-darkgreen text-blue"><strong>ADD ARTICLE</strong></a>
                </td>
            </tr>
            <?php foreach ($submittedArticles as $article): ?>
                <tr>
                    <td class="actions">
                        <a href="<?= base_url('pages/db_AdminUpdate/' . $article->slug); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Edit Article"></i></a>
                        <a href="<?= base_url('pages/editArticle/' . $article->articleid); ?>"></a>
                        <?php if ($article->isPublished == 0): ?>
                            <a href="<?= base_url('pages/publishArticle/' . $article->articleid); ?>"><i class="fa fa-toggle-off" aria-hidden="true" title="Publish Article" style="font-size: 24px;"></i></a>
                            <?php else: ?>
                            <a href="<?= base_url('pages/unPublishArticle/' . $article->articleid); ?>"><i class="fa fa-toggle-on" aria-hidden="true" title="Unpublish Article" style="font-size: 24px;"></i></a>
                            <?php endif; ?>
                        <a href="#" onclick="confirmDelete('<?= $article->articleid; ?>')"><i class="fa fa-trash" aria-hidden="true" title="Delete Article"></i></a>
                    </td>
                    <td><?= $article->author_name ?></td>
                    <td><?= $article->volume_name ?></td>
                    <td><?= strlen($article->title) > 70 ? substr($article->title, 0, 70) . '...' : $article->title ?></td>
                    <td>
                        <?php if ($article->filename): ?>
                            <a href="<?= base_url('files/' . $article->filename); ?>" class="file-link"><i class="fa fa-download" aria-hidden="true" title="Download File"></i></a>
                        <?php else: ?>
                            No file uploaded
                        <?php endif; ?>
                    </td>
                    <td><?= $article->date_published ? date('Y-m-d', strtotime($article->date_published)) : 'N/A' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(articleId) {
        if (confirm("Are you sure you want to delete this article?")) {
            window.location.href = "<?php echo base_url('pages/deleteArticle/') ?>" + articleId;
        }
    }
</script>

</body>
</html>
