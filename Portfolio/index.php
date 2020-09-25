<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <!-- font  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- Default Styles -->
        <link rel="stylesheet" type="text/css" href="assets/css/reset.css">
        <link rel="stylesheet" type="text/css" href="assets/css/columnlayout.css">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">

        <!-- favicons -->
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        <title>HomePage | Deep Harquissandas</title>
    </head>
    <body id="#top">
        <header>
            <hgroup>
                <h1>Deep Harquissandas</h1>
                <h3>Computer Science Student</h3>
            </hgroup>
        </header>
    
        <div class="container">
            <article class="columns">
                <section class="column-middle" id="column1">
                    <div id="aboutme" class ="card">
                        <h2>About Me</h2>
                        <div class = row>
                            <div class="inner-column" id="text-column">
                                <p>I am a highly motivated and hardworking individual, where I have recently completed my A-Levels and now studying computer science. I am immensely passionate about the technology around me whereby I keep tabs on current and future technologies. Currently, I am seeking experince in the technology industry to build upon an already expansive interest and knowledge base to start a career in the large and ever changing technology industry.</p>
                            </div>
                            <div class="inner-column" id="img-column">
                                <figure>
                                    <img src="assets/imgs/face.png">
                                    <figcaption>Deep Harquissandas</figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div id="education" class="card">
                        <h2>Education & Qualifications</h2>
                        <div id="educationtable">
                        <table>
                            <tr>
                                <th>Place of Education</th>
                                <th>Qualification</th>
                                <th>Time</th>
                            </tr>
                            <tr>
                                <td>Queen Mary, University of London</td>
                                <td>Undergraduate</td>
                                <td>2018-present</td>
                            </tr>
                            <tr>
                                <td>Wembley High Technology College</td>
                                <td>A-level's</td>
                                <td>2018-2016</td>
                            </tr>
                            <tr>
                                <td>Wembley High Technology College</td>
                                <td>GCSE's</td>
                                <td>2016-2011</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    <div id="experience" class="card">
                        <h2>Experience</h2>
                        <h3>Freelance Programmer</h3>
                        <p>Have coded websites and have coded small programs for business start-ups.</p>
                        <br>
                        <h3>Technology Sales Collegue</h3>
                        <p>A sales collegue at a major technology retailer, giving me access to the latest and greatest technology.</p>
                    </div>
                    <div id="portfolio" class="card">
                        <h2>Portfolio</h2>
                    </div>
                </section>
                <section class="column-left" id="column2">
                    <div class="card">
                        <h2>Navigation</h2>
                        <nav>
                            <ul>
                                <li><a href="#aboutme">About Me</a></li>
                                <li><a href="#skills">Skills & Achievements</a></li>
                                <li><a href="#education">Education & Qualifications</a></li>
                                <li><a href="#experience">Experience</a></li>
                                <li><a href="#portfolio">Portfolio</a></li>
                                <li><a href="#contact">Contact Me</a></li>
                                <li><a href="../Blog/viewBlog.php">Blog</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="skills" class="card">
                        <h2>Skills</h2>
                        <p class="pblabel">HTML</p>
                        <div class="progressbar"><div id="bar1"></div></div>
                        <p class="pblabel">Java</p>
                        <div class="progressbar"><div id="bar2"></div></div>
                        <p class="pblabel">CSS</p>
                        <div class="progressbar"><div id="bar3"></div></div>
                        <p class="pblabel">Python</p>
                        <div class="progressbar"><div id="bar4"></div></div>
                        <p class="pblabel">JavaScript</p>
                        <div class="progressbar"><div id="bar5"></div></div>
                        <p class="pblabel">PHP</p>
                        <div class="progressbar"><div id="bar6"></div></div>
                    </div>
                    <div id="contact" class="card">
                        <h2>Contact Me</h2>
                        <p>Email: <a href="dharquissandas@outlook.com">dharquissandas@outlook.com</a></p>
                        <p><b>Or Via The Blog</b></p>
                    </div>
                </section>
                <section class="column-right" id="column3">
                    <aside>
                        <?php
                        if(isset($_SESSION['email'])){
                            echo "<div class='card'>";
                            echo "<h2>Welcome</h2>";
                            echo "<div class='center-info'>";
                            echo "<h3>Log in Successful</h3>";
                            echo $_SESSION['email'];
                            echo "<br>";
                            echo "<br>";
                            ?>
                            <form method="post" action="assets/php/logout.php">
                                <button type="submit" name="logout" id="logout">Log out</button>
                            </form>
                            <?php
                            echo "</div>";
                        echo "</div>";
                        }
                        else{
                            echo "<div class='card'>";
                                echo "<h2>Blog Log-in</h2>";
                                echo "<form method='POST' action='assets/php/login.php'>";
                                    echo "<label>Email:</label>";
                                    echo "<input type='email' id='email' name='email' required>";
                                    echo "<label>Password:</label>";
                                    echo "<input type='password' id='password' name='password' required>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<button type='submit' name='submit' id='submit'>Log-in</button>";
                                echo "</form>";
                            echo "</div>";
                        }
                        ?>
                        <div class="card">
                            <h2>Social Media</h2>
                            <br>
                            <div class="center-info">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=#" class="fa fa-facebook"></a>
                                <a href="http://twitter.com/share?" class="fa fa-twitter"></a>
                                <a href="http://www.reddit.com/submit?url=#" class="fa fa-reddit"></a>
                            </div>
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