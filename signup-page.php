<?php
include "backend/includes/auth-guest.php";
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Bee Human</title>
  <link rel="icon" href="images/favicon.png">

  <link rel="stylesheet" href="./css/login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<body>
  <div class="session">
    <form action="backend/signup.php" method="post" class="log-in" autocomplete="off"> 
      <h4 class = "bee"><span class="bee">BEE HUMAN</span></h4>
      <p class= "writing">Fill this in to create an account</p>
      <div class="floating-label">
        <input placeholder="Username" type="text" name="username" id="username" autocomplete="off">
        <div class="icon">

<!-- <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
<style type="text/css">
	.st0{fill:none;}
</style>
<g transform="translate(0 -952.36)">
	<path d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z"/>
</g>
<rect class="st0" width="100" height="100"/>
</svg> -->

        </div>
      </div>
      <div class="floating-label">
        <input placeholder="Password" type="password" name="password" id="password" autocomplete="off">
        <label for="password">Password:</label>
        <div class="icon">
          
          
          <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve"              xmlns="http://www.w3.org/2000/svg">
<style type="text/css">
	.st0{fill:none;}
	.st1{fill:#010101;}
</style>
		<rect class="st0" width="24" height="24"/>
		<path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"/>
		<path class="st1" d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z"/>
		<path class="st1" d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z"/>
</svg>
        </div>
        
      </div>

      <?php
      if (isset($_GET['error'])) {
      ?>
      <span style="color:red;">
      <?php
        echo($_GET['error']);
      }
      ?>
      </span>

      <button type="submit" name="signup">Create Account</button>
      <p class= "writing">Already have an account? <a href="login-page.php">Login here</a></p>
    </form>
  </div>
</body>
<!-- partial -->
  
</body>
</html>
