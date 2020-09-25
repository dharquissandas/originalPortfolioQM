<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    $connection = new mysqli($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if (isset($_POST["email"]) and isset($_POST["password"])){
        $blogEmail = $_POST["email"];
        $blogPassword = $_POST['password'];

        $query = "SELECT * FROM `users` WHERE email='$blogEmail' and password='$blogPassword'";
            
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $count = mysqli_num_rows($result);

        if ($count == 1){
            session_start();
            $_SESSION['email'] = $blogEmail;
            header('Location: ../../../Blog/viewBlog.php');
        }
        else{
            echo "Invalid Login Credentials.";
        }

    }

?>