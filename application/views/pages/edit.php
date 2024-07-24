<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Author</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .card {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-body">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <form action="<?php echo site_url('users/edit/' . $user->userid); ?>" method="post">
                <div class="form-group">
                    <label for="complete_name">Complete Name:</label>
                    <input type="text" class="form-control" name="complete_name" value="<?php echo set_value('complete_name', $user->complete_name); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email" value="<?php echo set_value('email', $user->email); ?>">
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select class="form-control" name="role">
                        <option value="0" <?php echo set_select('role', '0', ($user->role == 0)); ?>>Admin</option>
                        <option value="2" <?php echo set_select('role', '2', ($user->role == 2)); ?>>Researcher</option>
                        <option value="1" <?php echo set_select('role', '1', ($user->role == 1)); ?>>Evaluator</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <input type="checkbox" name="status" value="1" <?php echo set_checkbox('status', '1', ($user->status == 1)); ?>> Active
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min
