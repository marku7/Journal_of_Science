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
        <h2>Edit Article</h2>
        <form action="<?php echo base_url('pages/updateNow3/' . $article->slug) ?>" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?= isset($article) ? $article->title : ''; ?>" required>
            
            <label for="keywords">Keywords:</label>
            <input type="text" id="keywords" name="keywords" value="<?= isset($article) ? $article->keywords : ''; ?>" required>
            
            <label for="abstract">Abstract:</label>
            <textarea id="editor1" name="abstract" required><?= isset($article) ? $article->abstract : ''; ?></textarea>
            
            <label for="volume">Select Volume:</label>
            <select id="volume" name="volume_id" class="form-control" required>
                <?php foreach ($volumes as $volume): ?>
                    <option value="<?php echo $volume['volumeid']; ?>" <?= isset($article) && $article->volume_id == $volume['volumeid'] ? 'selected' : ''; ?>>
                        <?php echo $volume['vol_name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <label for="selectedAuthor">Select Author:</label>
            <select id="selectedAuthor" name="selected_author" class="form-control">
                <option value="">Select Author</option>
                <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author['audid']; ?>"><?php echo $author['author_name']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="author">Author/s:</label>
            <textarea id="author" name="author" class="form-control" rows="5" style="resize: vertical;" required><?= isset($article) ? $article->author : ''; ?></textarea>
            
            <label for="file">Previous File:</label>
            <input type="text" id="previous_file" value="<?= isset($article) ? $article->filename : ''; ?>" readonly>

            <br>
            
            <label for="new_file">Upload New File (PDF only):</label>
            <input type="file" id="new_file" name="new_file" accept=".pdf">
         
            <br>
            
            <button type="submit" name="articleUpdate" class="btn btn-primary px-4">Update</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='<?php echo base_url('pages/db_allArticles')?>'">Cancel</button>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const authorDropdown = document.getElementById("selectedAuthor");
            const authorTextarea = document.getElementById("author");
            const allAuthors = Array.from(authorDropdown.options).map(option => option.text).slice(1);

            function updateDropdown() {
                const authorsInTextarea = authorTextarea.value.split(',').map(author => author.trim());
                
                authorDropdown.innerHTML = '<option value="">Select Author</option>';
                
                allAuthors.forEach(authorName => {
                    if (!authorsInTextarea.includes(authorName.toLowerCase())) {
                        const option = document.createElement('option');
                        option.text = authorName;
                        authorDropdown.add(option);
                    }
                });
            }

            function removeSelectedOption() {
                const selectedOption = authorDropdown.options[authorDropdown.selectedIndex];
                const authorName = selectedOption.text;
                
                if (authorName !== "Select Author") {
                    if (authorTextarea.value) {
                        authorTextarea.value += ", " + authorName;
                    } else {
                        authorTextarea.value = authorName;
                    }
                    
                    updateDropdown();
                }
            }

            authorDropdown.addEventListener("change", removeSelectedOption);

            authorTextarea.addEventListener("input", updateDropdown);

            authorTextarea.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    authorTextarea.value += ", ";
                }
            });
            
            updateDropdown();
        });
    </script>
</body>
</html>
