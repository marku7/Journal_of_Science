<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authors List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #005500;
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #005500;
            color: #fff;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .action-links a {
            text-decoration: none;
            margin-right: 5px;
            padding: 6px 12px;
            border: 1px solid #005500;
            border-radius: 3px;
            background-color: #005500;
            color: #fff;
        }
        .action-links a:hover {
            background-color: #002200;
            border-color: #002200;
        }
        .add-button {
            display: block;
            text-align: center;
            margin: 20px auto;
            text-decoration: none;
            color: #005500;
            padding: 6px 12px;
            border: 1px solid #005500;
            border-radius: 3px;
            background-color: #fff;
        }
        .add-button:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h2>Authors List</h2>
    <a href="<?php echo site_url('pages/add_author'); ?>" class="add-button">Add New Author</a>
    <table>
        <thead>
            <tr>
                <th>Author Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($authors as $author): ?>
            <tr>
                <td><?php echo $author->author_name; ?></td>
                <td><?php echo $author->email; ?></td>
                <td><?php echo $author->contact_num; ?></td>
                <td><?php echo $author->title; ?></td>
                <td class="action-links">
                    <a href="<?php echo site_url('pages/edit_author/' . $author->audid); ?>">Edit</a>
                    <a href="<?php echo site_url('author/delete/' . $author->audid); ?>" onclick="return confirm('Are you sure you want to delete this author?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
