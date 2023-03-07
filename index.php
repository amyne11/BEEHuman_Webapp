<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- SEO Meta Tags -->
        <meta name="description" content="Your description">
        <meta name="author" content="Your name">

        <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
        <meta property="og:site_name" content="" /> <!-- website name -->
        <meta property="og:site" content="" /> <!-- website link -->
        <meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
        <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
        <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

        <!-- Webpage Title -->
        <title>Bee Human</title>
        
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link href="./css/fontawesome-all.min.css" rel="stylesheet">
        <link href="./css/home.css" rel="stylesheet">
        
        <!-- Favicon  -->
        <link rel="icon" href="images/favicon.png">
    </head>
    <body>
        
        <!-- Navigation -->
        <div class="navbar">
            <div class="container flex">

                <!-- Image Logo -->
                <a class="logo-image" href="index.php"><img src="images/logoproj.png" alt="alternative"></a>

                <!-- Text Logo - Use this if you don't have a graphic logo -->
                <!-- <a class="logo-text" href="index.html">Name</a> -->
 
                <nav>
                    <ul >
                        <li><a href="games.php">Games</a></li>
                        <li><a href="#contact">Contact</a></li>


                        <?php
                        if (isset($_SESSION["logged"])) 
                        {
                        ?>
                            <li><a href="backend/logout.php">Logout</a></li>
                        <?php
                        } else 
                        {
                        ?>
                            <li><a href="signup-page.php">Create Account</a></li>
                            <li><a href="login-page.php">Login</a></li>
                        <?php
                        }
                        ?>


                    </ul>
                </nav>
            </div> <!-- end of container -->
        </div> <!-- end of navbar -->
        <!-- end of navigation -->

        
        <!-- Header -->
        <header>
            <div class="container">
                <div class="text-container">
                    <h1 class="h1-large">BEE HUMAN</h1>
                    <h1 class="h2-large">Test Yourself</h1>
                    <a class="btn-outline-lg" href="games.php">PLAY GAMES</a>
                </div> <!-- end of text-container -->
            </div> <!-- end of container -->
        </header> <!-- end of header -->
        <!-- end of header -->
<!-- 

        <div id = "developer" class="developer">
            <div class="container">
                <h3>Developers</h3>
            </div> 
            <div class="container flex">
                <div class="card">
                    <img src="images/customer-logo-1.png" alt="alternative">
                </div> 
                <div class="card">
                    <img src="images/customer-logo-2.png" alt="alternative">
                </div> 
                <div class="card">
                    <img src="images/customer-logo-3.png" alt="alternative">
                </div> 
                <div class="card">
                    <img src="images/customer-logo-4.png" alt="alternative">
                </div> 
                <div class="card">
                    <img src="images/customer-logo-5.png" alt="alternative">
                </div> 
            </div> 
        </div> 
    -->


        <!-- Contact -->
        <!-- <div id="contact" class="contact bg-gray">
            <div class="container">
                <h2>Help us to improve</h2>
                <p class="p-heading">Please suggest us what improvments you would like to see in our project!</p>

                <form>
                    <div class="form-group">
                        <input type="text" class="form-control-input" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control-input" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control-textarea" placeholder="Message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button">Submit</button>
                    </div>
                </form>
                

            </div> 
        </div> 


       
        <footer>
            <div class="container grid grid-3">
                <div>
                    
                    <a class="logo-image" href="index.html"><img src="images/logoproj.png" alt="alternative"></a> 
                    

                    <p>Copyright © 2022</p>
                </div>
                <div>
                    <ul class="li-space-lg">
                        <li><a href="#services">Games</a></li>
                        <li><a href="#developer">Developers</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="login-page.html">Login</a></li>
                    </ul>
                </div>
                <div>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </footer> 


        <a id="myBtn" href="#" data-scroll>
            <img src="images/up-arrow.png" alt="alternative">
        </a> -->
            
        <!-- Scripts -->
        <script src="js/smooth-scroll.polyfills.min.js"></script> <!-- Smooth Scroll -->
        <script src="js/home.js"></script> <!-- Custom scripts -->
    </body>
</html>