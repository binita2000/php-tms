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
                    $image = $_POST['image'];


                    // Validate input
                    if (!empty($title) && !empty($description) && !empty($image)) {

                        // Prepare SQL statement with placeholders
                        $insert_query = "INSERT INTO tasks (title, description, image) 
                                        VALUES ('$title', '$description', '$image')";
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

                        <!-- choose image -->

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId">
                                            Modal title
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    </div>



                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Optional: Place to the bottom of scripts -->
                        <script>
                            const myModal = new bootstrap.Modal(
                                document.getElementById("modalId"),
                                options,
                            );
                        </script>



                        <div class="mb-3">
                            <label for="status" class="form-label">Image</label>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="status" class="form-control" id="status" required>
                            <button type="button" class="btn btn-primary btn-sm"data-bs-toggle="modal" data-bs-target="#modalId">
                                Choose Image
                            </button>
                        </div>
                        <!-- choose image -->


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