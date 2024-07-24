<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Submission Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"], input[type="email"], textarea, input[type="file"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        textarea {
            height: 150px;
            resize: vertical;
        }
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: inline-block;
            margin-top: 10px;
        }
        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .btn-secondary {
            background-color: #f44336;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #da190b;
        }
        .form-control:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
        .co-author-field {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
<?php echo validation_errors(); ?>
    <h2>Article Submission Form</h2>
    <form id="articleForm" action="<?php echo base_url('article/submitNow')?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" class="form-control" required>
        
        <label for="keywords">Keywords:</label>
        <input type="text" id="keywords" name="keywords" class="form-control">
        
        <label for="abstract">Abstract:</label>
        <textarea id="editor1" name="abstract" class="form-control" required></textarea>
        
        <label for="volume">Select Volume:</label>
        <select id="volume" name="volume_id" class="form-control" required>
            <?php foreach ($volumes as $volume): ?>
                <option value="<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="numAuthors">Number of Authors:</label>
        <input type="number" id="numAuthors" name="num_authors" class="form-control" value="1" min="1" max="50" required>

        <div id="coAuthorsContainer">
            <!-- Co-author fields will be dynamically added here -->
        </div>
        
        <label for="file">Upload File:</label>
        <input type="file" id="file" name="file" accept=".pdf" class="form-control">
        
        <input type="submit" value="Submit" class="btn btn-primary">
        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const numAuthorsInput = document.getElementById('numAuthors');
    const coAuthorsContainer = document.getElementById('coAuthorsContainer');

    function updateCoAuthorFields() {
        const numAuthors = parseInt(numAuthorsInput.value, 10);
        const currentFields = coAuthorsContainer.querySelectorAll('.co-author-field');
        
        // Remove existing fields
        currentFields.forEach(field => field.remove());
        
        // Add new fields
        for (let i = 1; i < numAuthors; i++) { // Start from 1 because the first author is the one who posted
            const coAuthorField = document.createElement('div');
            coAuthorField.className = 'co-author-field';
            coAuthorField.innerHTML = `
                <label for="coauthor${i}">Co-author ${i}:</label>
                <select id="coauthor${i}" name="coauthor_id[]" class="form-control" required>
                    <option value="">Select Co-author</option>
                    <?php foreach ($authors as $author): ?>
                        <option value="<?php echo $author['audid']; ?>"><?php echo $author['author_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            `;
            coAuthorsContainer.appendChild(coAuthorField);
        }
    }

    numAuthorsInput.addEventListener('input', function() {
        if (parseInt(numAuthorsInput.value, 10) > 50) {
            numAuthorsInput.value = 50;
        }
        updateCoAuthorFields();
    });

    updateCoAuthorFields();
});
</script>
</body>
</html>
