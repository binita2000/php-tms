<?php
require('../includes/header.php');
require('../includes/navbar.php');
?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Task</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Task</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="index.php" role="button">Manage Task</a>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                // Include your database connection here if not already included
                // $conn = new mysqli($servername, $username, $password, $dbname);

                if (isset($_POST['save'])) {
                    // Assuming you have connected to the database ($conn) already

                    // Retrieve form data
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $status = $_POST['status'];
                    

                    // Validate input
                    if (!empty($title) && !empty($description) && !empty($status) ) {

                        // Prepare SQL statement with placeholders
                        $insert_query = "INSERT INTO tasks (title, description, status, created_at, updated_at) 
                                        VALUES ('$title', '$description', '$status', NOW(), NOW())";
                        $result = mysqli_query($conn, $insert_query);

                        if ($result) {
                            echo 'Data is submitted';
                            header("Refresh:2; URL= index.php");
                        } else {
                            echo 'Data is not submitted';
                        }
                    } else {
                        echo "<div class='alert alert-danger'>All fields are required</div>";
                    }
                }
                $conn->close();
                ?>
                <div class="container">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">status</label>
                            <input type="text" name="status" class="form-control" id="status" required>
                        </div>
                        
                        <button type="submit" name="save" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <img src="https://dummyimage.com/800x300/dddddd/fff.png&text=Responsive+Image" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
</section>


<?php
require('../includes/footer.php');
?>