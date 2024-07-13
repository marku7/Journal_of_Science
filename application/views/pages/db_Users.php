<!-- application/views/users/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-column {
            white-space: nowrap;
        }

        .action-column a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .action-column a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .delete-link {
            color: #dc3545;
            border-color: #dc3545;
        }

        .delete-link:hover {
            background-color: #dc3545;
            color: #fff;
        }

        /* Style for Add User button */
        .add-user-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .add-user-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h2>Users List</h2>
    <a href="<?php echo site_url('users/create'); ?>" class="add-user-button">Add User</a>
    <table>
        <tr>
            <th>Profile Pic</th>
            <th>Complete Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><img src="<?php echo base_url('./images/'.$user->profile_pic); ?>" alt="Profile Pic" width="50"></td>
            <td><?php echo $user->complete_name; ?></td>
            <td><?php echo $user->email; ?></td>
            <td><?php echo ($user->role == 0) ? 'Admin' : (($user->role == 1) ? 'Evaluator' : 'Researcher'); ?></td>
            <td><?php echo ($user->status == 1) ? 'Active' : 'Inactive'; ?></td>
            <td><?php echo $user->date_created; ?></td>
            <td class="action-column">
                <a href="<?php echo site_url('users/edit/'.$user->userid); ?>">Edit</a>
                <a href="<?php echo site_url('users/delete/'.$user->userid); ?>" onclick="return confirm('Are you sure you want to delete this user?')" class="delete-link">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>