<!DOCTYPE html>
<html>
<head>
    <title>List of Volumes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .table {
            background-color: #ffffff;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .table thead {
            background-color: #343a40;
            color: #ffffff;
        }
        .table thead th {
            border: none;
        }
        .table tbody tr {
            transition: background-color 0.2s ease-in-out;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-create {
            background-color: #28a745;
            color: #ffffff;
        }
        .btn-create:hover {
            background-color: #218838;
        }
        .btn-edit {
            background-color: #007bff;
            color: #ffffff;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            color: #ffffff;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">List of Volumes</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Volume ID</th>
                    <th>Status</th>
                    <th>Volume Name</th>
                    <th>Description</th>
                    <th>Date Created</th>
                    <th>Date Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($volumes as $volume): ?>
                    <tr>
                        <td><?php echo $volume->volumeid; ?></td>
                        <td>
                            <form action="<?php echo base_url('volume/toggle_published/' . $volume->volumeid); ?>" method="post">
                                <select name="published" onchange="this.form.submit()" class="form-control form-control-sm">
                                    <option value="1" <?php echo $volume->published ? 'selected' : ''; ?>>Published</option>
                                    <option value="0" <?php echo !$volume->published ? 'selected' : ''; ?>>Unpublished</option>
                                </select>
                            </form>
                        </td>
                        <td><?php echo $volume->vol_name; ?></td>
                        <td><?php echo $volume->description; ?></td>
                        <td><?php echo $volume->date_at; ?></td>
                        <td><?php echo $volume->date_published; ?></td>
                        <td>
                            
                            <a href="<?php echo base_url('volume/db_editVolume/' . $volume->volumeid); ?>" class="btn btn-edit btn-sm">Edit</a>
                            <a href="<?php echo base_url('volume/delete/' . $volume->volumeid); ?>" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this volume?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo base_url('volume/db_createVolumes'); ?>" class="btn btn-create">Create New Volume</a>
    </div>
</body>
</html>
