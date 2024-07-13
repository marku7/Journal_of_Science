<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        /* CSS styles for card */
        .card {
            background-color: #fff; /* White background */
            border-radius: 10px;
            padding: 30px;
            margin: 20px auto;
            max-width: 450px; /* Set maximum width */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: #000; /* Black text color */
            height: auto; /* Adjust height to auto for flexibility */
        }

        .card img {
            border-radius: 50%;
            margin-bottom: 20px;
            width: 150px; /* Larger profile picture */
            height: 150px; /* Larger profile picture */
            display: block;
            margin: 0 auto; /* Center align the image */
        }

        .card h3 {
            margin-bottom: 20px;
            font-size: 1.8em; /* Larger font size */
            text-align: center; /* Center align the heading */
        }

        /* CSS styles for save button */
        .save-button, .delete-button {
            background-color: #007bff; /* Blue button */
            color: #fff;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1.2em;
            display: block;
            margin: 20px auto; /* Center align the button */
            text-align: center;
        }

        .delete-button {
            background-color: #dc3545; /* Red button for delete */
        }

        .save-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .delete-button:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        /* CSS styles for input fields */
        input[type="text"], input[type="email"], input[type="password"], input[type="file"] {
            width: calc(100% - 24px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f0f0f0; /* Light gray input background */
            color: #000; /* Black text color */
            font-size: 1em;
            display: block;
            margin: 0 auto; /* Center align the inputs */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <?php if (!empty($userData->profile_pic)) : ?>
            <img src="<?php echo base_url('images/' . $userData->profile_pic); ?>" alt="Profile Picture">
        <?php else : ?>
            <img src="<?php echo base_url('images/default.jpg'); ?>" alt="Profile Picture">
        <?php endif; ?>
        <button type="button" class="delete-button" onclick="confirmDelete()">Delete Profile Picture</button><br>
        <h3><strong>User Profile</strong></h3>
        <div class="form-group">
                <label for="role">Role</label>
                <input type="text" name="role" value="<?php
                    switch ($userData->role) {
                        case 0:
                            echo 'Administrator';
                            break;
                        case 1:
                            echo 'Evaluator';
                            break;
                        case 2:
                        case 3:
                            echo 'Researcher';
                            break;
                        default:
                            echo 'Unknown';
                    }
                ?>" readonly>
            </div>
        <form action="<?php echo base_url('users/updateProfile'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="complete_name">Complete Name</label>
                <input type="text" name="complete_name" value="<?php echo $userData->complete_name; ?>" placeholder="Complete Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $userData->email; ?>" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Change Password">
            </div>
            <div class="form-group">
                <label for="profile_pic">Profile Picture</label>
                <input type="file" name="profile_pic" accept="image/*">
            </div>
            <input type="submit" value="Save" class="save-button">
        </form>

        <!-- JavaScript to confirm deletion -->
        <script>
            function confirmDelete() {
                if (confirm("Are you sure you want to delete your profile picture?")) {
                    // Redirect to the controller method to handle deletion
                    window.location.href = "<?php echo base_url('users/deleteProfilePic'); ?>";
                }
            }
        </script>
    </div>
</div>

</body>
</html>
