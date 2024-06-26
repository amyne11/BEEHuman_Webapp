<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include "backend/includes/auth-user.php";
        ?>
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
        <title>Typing Test</title>

        <!-- Styles -->
        <link href="css/typingtestv2.css" rel="stylesheet" >
        <link href="css/typingtestgame.css" rel="stylesheet">

        <!-- Favicon  -->
        <link rel="icon" href="images/favicon.png">

        <!-- Javascript -->
        <script defer src="js/typingtestv2.js"></script>
        
    </head> 
<body>
    <!-- Navigation -->
    <!-- <div class="navbar">
        <div class="container flex">

            <a class="logo-image" href="index.html"><img src="images/logoproj.png" alt="alternative"></a>


            <nav>
                <ul >
                    <li><a href="#services">Games</a></li>
                    <li><a href="#developer">Developers</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="../login/css-only-accessible-floating-labels-advanced-version/dist/login-page.html">Logout</a></li>
                </ul>
            </nav>
        </div> 
    </div>  -->
    <!-- end of navigation -->
    <h1 id="title">Typing Test!</h1>
    <!-- Wrapper -->
    <div class="wrapper">
        <!-- Input text box -->
        <input type="text" class="inputText"> 
        <div class="contentBox">
            <div class="typingText">
                <p id="paragraph"></p>
            </div>
            <div class="content">
                <ul class="currentStats">
                    <!-- List of current statistics of the game -->
                    <li class="time">
                        <p>
                            Time Remaining:
                        </p>
                        <span><b>60</b>s</span>
                    </li>
                    <li class="mistakes">
                        <p>
                            Number of Mistakes:
                        </p>
                        <span>0</span>
                    </li>
                    <li class="wpm">
                        <p>
                            WPM:
                        </p>
                        <span>0</span>
                    </li>
                </ul>
                <div class="results" id="results">
                    <h1>Results</h1>
                    <div class="wpmResult">
                        <p>
                            WPM:
                        </p>
                        <span>0</span>
                    </div> 
                    <div class="mistakesResult">
                        <p>
                            Number of Mistakes:
                        </p>
                        <span>0</span>
                    </div> 
                    <div class="accuracyResult">
                        <p>
                            Accuracy:
                        </p>
                        <span>0%</span>
                    </div> 
                </div>
                <button>Try Again</button>
            </div>
        </div>
    </div>

</body>

</html>