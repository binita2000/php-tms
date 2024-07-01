<?php 
require('../includes/header.php'); 
require('../includes/navbar.php'); 
?>

<section class="bg-info">
    <div class="container py-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </nav>
    </div>
</section>

<section>
    <div class="container py-5">
        <a class="btn btn-primary btn-sm" href="index.php" role="button">Manage Users</a>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <?php
                if (isset($_POST['save'])) {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    if ($name != "" && $username != "" && $email != "" && $password != "") {
                        // Check for duplicate email or username
                        $duplicate_query = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
                        $duplicate_query->bind_param("ss", $email, $username);
                        $duplicate_query->execute();
                        $result = $duplicate_query->get_result();

                        if ($result->num_rows == 0) {
                            // Insert the new user
                            $insert_query = $conn->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
                            $insert_query->bind_param("ssss", $name, $username, $email, $password);
                            if ($insert_query->execute()) {
                                echo "<div class='alert alert-success'>Data is submitted</div>";
                                echo "<meta http-equiv='refresh' content='2;URL=index.php'>";
                            } else {
                                echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>Email or Username already exists</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>All fields are required</div>";
                    }
                }
                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" name="save" class="btn btn-primary btn-sm">Submit</button>
                </form>
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
