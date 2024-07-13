<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .status-button {
        margin-right: 10px;
        margin-bottom: 10px;
    }
    .active-status {
        background-color: #28a745;
        color: #fff;
    }
    .card {
        margin: 20px auto; /* Center the card horizontally */
        max-width: 500px; /* Set a maximum width for the card */
        padding: 20px; /* Add padding for better spacing */
        border-radius: 10px; /* Add rounded corners */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    }
</style>

</head>
<body>
<div class="container">
    <h1 class="title" style="text-align: center;">Update Submission Status</h1>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('pages/updateArticle') ?>" method="post">
                <input type="hidden" name="articleid" value="<?= $article->articleid ?>">
                <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" id="title" name="title" value="<?= $article->title ?>" readonly>
</div>


                <!-- Payment Status -->
                <div class="form-group">
                    <label>Payment Status:</label><br>
                    <input type="hidden" id="payment" name="payment" value="<?= $article->payment ?>">
                    <button type="button" class="btn btn-outline-primary status-button <?= $article->payment ? 'active-status' : '' ?>" id="btn-payment">Paid</button>
                </div>

                <!-- Review Status -->
                <div class="form-group">
                    <label>Review Status:</label><br>
                    <input type="hidden" id="review" name="review" value="<?= $article->review ?>">
                    <button type="button" class="btn btn-outline-primary status-button <?= $article->review ? 'active-status' : '' ?>" id="btn-review">Reviewed</button>
                </div>

                <!-- Approval Status -->
                <div class="form-group">
                    <label>Approval Status:</label><br>
                    <input type="hidden" id="approved" name="approved" value="<?= $article->approved ?>">
                    <button type="button" class="btn btn-outline-primary status-button <?= $article->approved ? 'active-status' : '' ?>" id="btn-approved">Approved</button>
                </div>

                <!-- Publishing Status -->
                <div class="form-group">
                    <label>Publishing Status:</label><br>
                    <input type="hidden" id="published" name="published" value="<?= $article->published ?>">
                    <button type="button" class="btn btn-outline-primary status-button <?= $article->published ? 'active-status' : '' ?>" id="btn-published">Published</button>
                </div>

                <button type="submit" class="btn btn-primary">Update Article</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        function toggleStatus(button, hiddenInput) {
            button.classList.toggle('active-status');
            hiddenInput.value = button.classList.contains('active-status') ? 1 : 0;
        }

        document.getElementById('btn-payment').addEventListener('click', function() {
            toggleStatus(this, document.getElementById('payment'));
        });

        document.getElementById('btn-review').addEventListener('click', function() {
            toggleStatus(this, document.getElementById('review'));
        });

        document.getElementById('btn-approved').addEventListener('click', function() {
            toggleStatus(this, document.getElementById('approved'));
        });

        document.getElementById('btn-published').addEventListener('click', function() {
            toggleStatus(this, document.getElementById('published'));
        });
    });
</script>

</body>
</html>
