<?php
require("../config/config.php");
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email != "" && $password != "") {
        $check = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                if (password_verify($password, $row['password'])) {
                    
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];

                    echo "Login successful.";
                    header("Refresh:0; url=../dashboard.php?msg=success");
                } else {
                    header("Refresh:0; url=../index.php?msg=password_error");
                }
            } else {
                header("Refresh:0; url=../index.php?msg=not_found");
            }
        } else {
            header("Refresh:0; url=../index.php?msg=email_error");
        }
    } else {
        header("Refresh:0; url=../index.php?msg=required");
    }
}