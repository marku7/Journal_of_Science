<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
    }
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap; /* Allow cards to wrap */
        height: 50vh;
    }
    .card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 0 10px;
        width: 300px;
    }
    h2 {
        margin-top: 0;
    }
    .waiting {
        background-color: #b2dfdb; /* Materialize Aqua */
    }
    .in-review {
        background-color: #ffcc80; /* Materialize Orange Lighten-3 */
    }
    .published {
        background-color: #81c784; /* Materialize Green Lighten-2 */
    }
    .rejected {
        background-color: #ffcdd2; /* Materialize Pink Lighten-4 */
    }
    .footer {
        background-color: #333;
        color: #fff;
        padding: 20px 0;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    .count {
        font-size: 24px; /* Adjust size as needed */
        font-weight: bold;
        margin-top: 10px; /* Add some margin to separate from title */
    }
</style>

<div class="container">
    <?php
    // Count the number of articles in each status category
    $waitingCount = 10; // Example count of articles waiting review
    $inReviewCount = 5; // Example count of articles in review
    $publishedCount = 20; // Example count of published articles
    $rejectedCount = 3; // Example count of rejected articles
    ?>
    
    <div class="card waiting">
        <h2>Waiting Review</h2>
        <p class="count"><?php echo $waitingCount; ?></p>
    </div>
    
    <div class="card in-review">
        <h2>In Review</h2>
        <p class="count"><?php echo $inReviewCount; ?></p>
    </div>
    
    <div class="card published">
        <h2>Published</h2>
        <p class="count"><?php echo $publishedCount; ?></p>
    </div>
    
    <div class="card rejected">
        <h2>Rejected</h2>
        <p class="count"><?php echo $rejectedCount; ?></p>
    </div>
</div>
