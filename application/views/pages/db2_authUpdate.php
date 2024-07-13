<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            text-align: center; /* Center align the heading */
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        .cancel-button {
            background-color: #FF5733;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block; /* Display as inline-block to align with submit button */
        }

        .cancel-button:hover {
            background-color: #E5492F;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block; /* Display as inline-block to align with cancel button */
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Article</h2>
        <form action="<?php echo base_url('pages/updateNow2/' . $article->slug) ?>" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= isset($article) ? $article->title : ''; ?>" required>
            
            <label for="keywords">Keywords:</label>
            <input type="text" id="keywords" name="keywords" value="<?= isset($article) ? $article->keywords : ''; ?>" required>
            
            <label for="abstract">Abstract:</label>
            <textarea id="editor1" name="abstract" required><?= isset($article) ? $article->abstract : ''; ?></textarea>
            
            <label for="file">Previous File:</label>
            <input type="text" id="previous_file" value="<?= isset($article) ? $article->filename : ''; ?>" readonly>

            <br>
            
            <label for="new_file">Upload New File (PDF only):</label>
            <input type="file" id="new_file" name="new_file" accept=".pdf">
         
            <br>
            
            <button type="submit" name="articleUpdate" class="btn btn-primary px-4">Update</button>
            <button type="button" class="cancel-button" onclick="window.location.href='<?php echo base_url('pages/db_authArticles')?>'">Cancel</button>

        </form>
    </div>
</body>
</html>
