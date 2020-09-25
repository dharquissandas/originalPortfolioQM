<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "blog";

    $connection = new mysqli($servername, $username, $password, $dbname);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    session_start();

    $months = array("All", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    if(isset($_GET['monthsort'])){
        $month = $_GET['month'];
        $month = array_search($month,$months);
    }
    else{
        $month = "0";
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!-- font  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Default Styles -->
        <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
        <link rel="stylesheet" type="text/css" href="assets/css/columnlayout.css">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

        <!-- favicons -->
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        
        <title>Blog | Deep Harquissandas</title>
    </head>
    <body id="#top">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2"></script>
        <header>
            <hgroup>
                <h1>Deep Harquissandas</h1>
                <h3>Computer Science Student</h3>
            </hgroup>
        </header>
    
        <div class="container">
            <article class="columns">
                <section class="column-middle" id="column1">
                    <div id="blog" class ="card">
                        <h2>Blog</h2>
                    </div>
                    <?php
                            if((int)$month == 0){
                                $query = 'SELECT ID, title, post, timestamp FROM blogentries ORDER BY ID DESC';
                            }
                            else{
                                $intmonth = (int) $month;
                                $query = 'SELECT * FROM blogentries WHERE MONTH(FROM_UNIXTIME(timestamp)) = '.$intmonth.' ORDER BY ID DESC';
                            }
                            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                            echo $result;
                            while($row = $result->fetch_assoc()){
                                echo "<div class='card'>";
                                echo    "<i class='fa fa-clock-o'></i>";
                                date_default_timezone_set('UTC');
                                echo    "<h3 class='align'>".date('jS F Y, G:i e', $row['timestamp'])."</h3>";
                                echo    "<hr>";
                                echo    "<h4>". $row['title'] ."</h4>";
                                echo    "<p>".$row['post']."</p>";
                                echo "</div>";
                            }
                        ?>
                </section>
                <section class="column-left" id="column2">
                    <div class="card">
                        <h2>Navigation</h2>
                        <nav>
                            <ul>
                                <li><a href="../Portfolio/index.php">Home</a></li>
                                <li><a href="../Portfolio/index.php#aboutme">About Me</a></li>
                                <li><a href="../Portfolio/index.php#skills">Skills & Achievements</a></li>
                                <li><a href="../Portfolio/index.php#education">Education & Qualifications</a></li>
                                <li><a href="../Portfolio/index.php#experience">Experience</a></li>
                                <li><a href="../Portfolio/index.php#contact">Contact Me</a></li>
                                <li><a href="#blog">Blog</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="card">
                        <h2>Comments<h2>
                        <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="80" data-numposts="5"></div>
                    </div>
                </section>
                <section class="column-right" id="column3">
                    <aside>
                        <div class="card">
                                <?php 
                                if(!isset($_SESSION['email'])){
                                    echo "<div class='center-info'>";
                                    echo "<h2>Not Logged In</h2>";
                                    echo "</div>";
                                    echo "<p class='center-info'>You need to be logged in to post</p>";
                                }
                                else{
                                    echo "<div class='center-info'>";
                                    echo "<h2>Welcome</h2>";
                                    echo "<h3>Log in Successful</h3>";
                                    echo "<p>".$_SESSION['email']."</p>";
                                    echo "<form method='post' action='assets/php/logout.php'>";
                                    echo "<br>";
                                    echo "<button class='buttonwidth' type='submit' name='logout' id='logout'>Log out</button>";
                                    echo "</form>";
                                    echo "</div>";
                                }
                                ?>
                        </div>
                        <div class="card">
                            <h2>Month Sort</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                                <?php
                                echo "<select class='dropdown' name='month'>";
                                foreach($months as $option){
                                    echo "<option value='{$option}'";
                                    if (isset($_GET['month'])) { 
                                        if ($_GET['month'] == $option) { 
                                            echo 'selected'; 
                                        } 
                                    }
                                    echo ">{$option}</option>";   
                                }  
                                echo "</select>";
                                ?>
                                <br>
                                <br>
                                <button class ="buttonwidth" type="submit" name="monthsort" id="monthsort">Sort</button>
                            </form>
                        </div>
                        <div class="card">
                            <?php
                            if(isset($_SESSION['email'])){
                                echo "<form action='addPost.html'>";
                                echo    "<button class='buttonwidth' type='submit' name='addPost' id='addPost'>Add Post</button>";
                                echo "</form>";
                            }
                            else{
                                echo "<form action='../Portfolio/index.php'>";
                                echo    "<button class='buttonwidth' type='submit' name='addPost' id='addPost'>Add Post</button>";
                                echo "</form>";                                
                            }
                            ?>
                        </div>
                    </aside>
                </section>
            </article>
        </div>
        <footer>
            <h2><a href="#top">Back To Top</a></h2>
            <p>Deep Harquissandas, Copyright &copy; 2019</p>
        </footer>
    </body>
</html>