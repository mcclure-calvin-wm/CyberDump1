<!DOCTYPE html>
<html>

<head>
  <title>Cyber Dump</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/signup.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>

    <?php
        function SignIn() {
            session_start(); //starting the session for user profile page

            if(!empty($_POST['username'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
            {
                $query = mysql_query("SELECT * FROM cyberdump.username where username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysql_error());

                $row = mysql_fetch_array($query) or die(mysql_error());

                if(!empty($row['username']) AND !empty($row['password']))
                    {
                        $_SESSION['username'] = $row['password']; echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
                    }

                else
                    {
                        echo "SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY...";
                    }
            }
        }
            if(isset($_POST['Submit']))
                {
                    SignIn();
                }
        }
    ?>
</head>

<body>
  <div id="main">
    <header>
	  <div id="banner">
	    <div id="welcome">
	      <h2>Cyber Dump</h2>
	    </div><!--close welcome-->			  	
	  </div><!--close banner-->	
	</header>

	<nav>

	  <div id="menubar">
        <ul id="nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="Form.php">Form</a></li>
          <li><a href="Products.php">Products</a></li>
          <li><a href="Help.php">Help</a></li>
          <li class="current"><a href="SignIn.php">Sign in</a></li>
        </ul>
      </div><!--close menubar-->	
	</nav>
  </div>

<div id="Signup" >
  <h5 style="">sign in</h5>
 <p>Email</p>
  <input type="text">
  <p>Password</p>
  <input type="password">
    <br>
    <button>Sign in</button>
    <div id="signs">

        <a href="createAccount.php" style="color: #0043A8;">Don't have account?</a>

    </div>
</div>


</body>

</html>
