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
<form>
<div id="Accountsetup">
    <h5 style="">sign up</h5>
    <p>First name</p>
    <input type="text">
    <p>Last name</p>
    <input type="text">
    <p>Email</p>
    <input type="text">
    <p>Password</p>
    <input type="password">
    <p>confirm password</p>
    <input type="password">
    <p>Date of birth</p>
    <input type="date">
    <p>state</p>
    <select name="state">
    <option value="AL">AL</option>
    <option value="AK">AK</option>
    <option value="AZ">AZ</option>
    <option value="AR">AR</option>
    <option value="CA">CA</option>
    <option value="CO">CO</option>
    <option value="CT">CT</option>
    <option value="DE">DE</option>
    <option value="DC">DC</option>
    <option value="FL">FL</option>
    <option value="GA">GA</option>
    <option value="HI">HI</option>
    <option value="ID">ID</option>
    <option value="IL">IL</option>
    <option value="IN">IN</option>
    <option value="IA">IA</option>
    <option value="KS">KS</option>
    <option value="KY">KY</option>
    <option value="LA">LA</option>
    <option value="ME">ME</option>
    <option value="MD">MD</option>
    <option value="MA">MA</option>
    <option value="MI">MI</option>
    <option value="MN">MN</option>
    <option value="MS">MS</option>
    <option value="MO">MO</option>
    <option value="MT">MT</option>
    <option value="NE">NE</option>
    <option value="NV">NV</option>
    <option value="NH">NH</option>
    <option value="NJ">NJ</option>
    <option value="NM">NM</option>
    <option value="NY">NY</option>
    <option value="NC">NC</option>
    <option value="ND">ND</option>
    <option value="OH">OH</option>
    <option value="OK">OK</option>
    <option value="OR">OR</option>
    <option value="PA">PA</option>
    <option value="RI">RI</option>
    <option value="SC">SC</option>
    <option value="SD">SD</option>
    <option value="TN">TN</option>
    <option value="TX">TX</option>
    <option value="UT">UT</option>
    <option value="VT">VT</option>
    <option value="VA">VA</option>
    <option value="WA">WA</option>
    <option value="WV">WV</option>
    <option value="WI">WI</option>
    <option value="WY">WY</option>
</select>

<p>address</p>
    <input type="text">
    <P>City</P>
    <input type="text">
<p>Zip</p>
    <input type="text">

    <br>
    <button>Create account</button>
    <p style="color:transparent;">Secret</p>
</div>
</form>
=======
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

>>>>>>> ed7ab892263a1bf5680e7d9c7da238d30a72237b

</body>

</html>