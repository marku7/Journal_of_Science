<style>
.card {
    width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #f8f9fa; /* Light gray */
}

.card-body {
    padding: 20px;
}

.form-label {
    font-weight: bold;
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-dark-green {
    background-color: #004d40; /* Dark green */
    color: #fff;
}

.btn-dark-green:hover {
    background-color: #00332b; /* Darker green */
}

</style>

<div class="card">
    <div class="card-header bg-dark-white text-black text-center fw-bold">Set Author Profile</div>
    <div class="card-body">
        <form action="<?php echo base_url('')?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fullname" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="contact_no" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Enter your Contact #" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter your Title" required>
            </div>
            
            <button type="submit" class="btn btn-dark-green" name="getstarted">Continue Submission</button>
        </form>
    </div>
</div>
