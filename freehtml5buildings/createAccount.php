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
    try {
        $dbh = new PDO('mysql:host=127.0.0.1;dbname=cyberdump', 'root', 'root');

    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }

    if(@$_POST['createAccounts'] == "Submit")
    {    $errorMessage = "";

        if(empty($_POST['firstname']))
        {
            $errorMessage = "<li>You forgot to enter your first name.</li>";
        }
        if(empty($_POST['lastname']))
        {
            $errorMessage = "<li>You forgot to enter your last name.</li>";
        }
        if(empty($_POST['email']))
        {
        $errorMessage = "<li>You forgot to enter an email</li>";
        }
        if(empty($_POST['username']))
        {
            $errorMessage = "<li>You forgot to enter your username.</li>";
        }
        if(empty($_POST['password']))
        {
            $errorMessage = "<li>You forgot to enter a password</li>";
        }

        $stmt = $dbh->prepare("INSERT INTO createAccount (firstname, lastname, email, username, password) VALUES (?, ?, ?, ?, ?)");

        $result = $stmt->execute(array($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['username'], $_POST['password']));

        if(!$result){
            print_r($stmt->errorInfo());
        }
        {
            echo("");
            echo("<ul>" . $errorMessage . "</ul>\n");
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

    <div id="Accountsetup">
        <form name="createAccount" action="createAccount.php" method="post">
            <h5>Sign Up</h5>
            <p>First name</p>
            <input type="text" name="firstname">
            <p>Last name</p>
            <input type="text" name="lastname">
            <p>Email</p>
            <input type="text" name="email">
            <p>Username</p>
            <input type="text" name="username">
            <p>Password</p>
            <input type="password" name="password">
            <!--<p>confirm password</p>
            <input type="password" name="confirmPassword">-->
            <br>
            <br>
            <input type="submit" name="createAccounts" value="Submit">
        </form>
    </div>


</body>

</html>