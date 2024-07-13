<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            padding-top: 10px;
            margin: auto;
            max-width: 1000px;
        }
        table {
            width: 108%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 11px;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        th, td {
            padding: 10px 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center; /* Center the text */
        }
        td {
            background-color: #fff;
            border-right: 1px solid #ddd;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        .actions {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .actions a,
        .actions button {
            margin-right: 20px;
        }
        .actions img {
            width: 35px;
            height: auto;
        }
        tbody tr:hover {
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        .truncate {
            max-width: 180px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .file-link {
            color: #007bff;
            margin-top: 3px;
            display: inline-block;
        }
        .file-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Articles</h2>
    <table>
        <thead>
            <tr>
                <th>Article Name</th>
                <th>Keywords</th>
                <th>Abstract</th>
                <th>File</th>
                <th class="actions">Actions</th> <!-- Centered "Actions" header -->
            </tr>
        </thead>
        <tbody>
            <?php 
                function truncateString($string, $length = 50) {
                    return strlen($string) > $length ? substr($string, 0, $length) . '...' : $string;
                }
                
                foreach ($submittedArticles as $article): 
            ?>
                <tr>
                    <td><?= truncateString($article->title) ?></td>
                    <td><?= truncateString($article->keywords) ?></td>
                    <td class="truncate"><?= truncateString($article->abstract) ?></td>
                    <td>
                        <?php if ($article->filename): ?>
                            <a href="<?= base_url('/files/' . $article->filename); ?>" class="file-link">View</a>
                        <?php else: ?>
                            No file uploaded
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <div style="text-align: center;">
                            <a href="<?php echo site_url('home/post_lp/'.$article->slug); ?>"><img src="<?php echo base_url('assets/img/view.png'); ?>" alt="View" title="View"></a>
                            <a href="<?php echo base_url('pages/db2_authUpdate/' .$article->slug) ?>"><img src="<?php echo base_url('assets/img/update.png'); ?>" alt="Update" title="Update"></a>
                            <a href="#" onclick="confirmDelete('<?php echo $article->articleid; ?>')"><img src="<?php echo base_url('assets/img/delete.png'); ?>" alt="Delete" title="Delete"></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(articleId) {
        var confirmation = confirm("Are you sure you want to delete this article?");
        if (confirmation) {
            window.location.href = "<?php echo base_url('pages/deleteNow/') ?>" + articleId;
        }
    }
</script>

</body>
</html>
