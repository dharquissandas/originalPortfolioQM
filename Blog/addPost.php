<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    $connection = new mysqli($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    if (isset($_POST["title"]) and isset($_POST["postText"])){
        $title = $_POST["title"];
        $postText = $_POST['postText'];
        date_default_timezone_set('UTC');
        $time = time();

        $sql = "INSERT INTO blogentries (title, post, timestamp) VALUES ('$title', '$postText', '$time')";
        
        if ($connection->query($sql) === TRUE) {
            header("Location: viewBlog.php");
        } 
        else{  
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
        $connection->close();

    }



?>