


<?php

$servername = "localhost";

$username = "root";

$password = "root";


try {
    $dbh = new PDO("mysql:host=$servername;dbname=form", $username, $password);
    /*** echo a message saying we have connected ***/
    $sql = "SELECT * FROM form.postmade";
    foreach ($dbh->query($sql) as $row){
        echo $row['itemDescription'] .' - '. $row['itemDescription'] . '<br />';
    }
    /*** close the database connection ***/
}
catch(PDOException $e) {
    echo $e->getMessage();
}

session_start();
if(isset($_SESSION['userName'])!="") {
    header("Location: index.php");
}
if(isset($_POST['registered'])){

    print_R($_POST);

    $itemname = $_POST['itemFinding'];

    $itemDescription = $_POST['itemDescription'];

    $username = $_POST['username'];

    $password = $_POST['pass'];

    $email = $_POST['email'];

    $first = $_POST['first'];

    $cardtype = $_POST['cardType'];

    $last = $_POST['last'];

    $cardCode = $_POST['cardNumberSection'];

    $as = $_POST['addressSection'];

    $state = $_POST['state'];







    if(isset($username)){

        //$mysql_get_users = mysql_query("SELECT * FROM users where username='$username'");
        // user /k /k
        // itemFinding /k /k
        // itemDescription /k /k
        // firstname /k /k
        // lastname /k /k
        // cardtype /k
        // cardnumber /k
        // addressSection /k
        // state /k

        $prepData = array(
            'idpostmade'=>NULL,
            'username'=>$username,
            'if'=>$itemname,
            'itemDescription' => $itemDescription,
            'first'=>$first,
            'last'=>$last,
            'ct'=>$cardtype,
            'cp'=>$cardCode,
            'addressSection' =>$as,
            'state'=>$state,
            'email'=>$email,
            'password'=>$password

        );

        // user, itemFinding, itemDescription, firstname, lastname, cardtype, cardnumber, addressSection, state

        print_R($prepData);
        $stmt = $dbh->prepare("INSERT INTO postmade(idpostmade, 'user', itemFinding, itemDescription, firstname, lastname, cardtype, cardnumber, addressSection, state, email, password) VALUES(:idpostmade, :username, :if, :itemDescription, ':first', ':last', :ct, :cp, :addressSection, :state, :email, :password)");
        $result = $stmt->execute($prepData);

        if($result){
            $_SESSION['registered'] = 1;
            echo "Registered.";
            header("Location: index.php");
        }else {
            var_dump($result);

            echo "Error creating account.";
        }
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Form</title>
    <meta name="description" content="website description" />
    <meta name="keywords" content="website keywords, website keywords" />
    <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
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
                <li class="current"><a href="Form.php">Form</a></li>
                <li><a href="Products.php">Products</a></li>
                <li><a href="Help.php">Help</a></li>
                <li><a href="SignIn.php">Sign in</a></li>
            </ul>
        </div><!--close menubar-->
    </nav>

    <div id="site_content">
        <div>
            <form name="post" id="myTableForm" style="margin: auto"><!--Remember the id/ k -->

                <h3>
                    Item Name
                </h3>
                <input name="itemFinding" id="itemFinding" type="text">

                <h3>
                    Item Description
                </h3>
                <input name="itemDescription" id="itemDescription" type="text" style="height: 70px; width: 100%"/>

                <h2 style="margin:auto">
                    Starting Information
                </h2>

                <h3>First Name</h3>
                <input name="firstNameSection" type="text" id="firstNameSection"> <!--Remember the id/ k -->
                <h3>Last Name</h3>
                <input name="lastNameSection" type="text" id="lastNameSection"><!--Remember the id/ k -->
                <h3> Password</h3>
                <input name="passwordSection" type="password" id="passwordSection"><!--Remember the id/ k -->
                <h3> Email</h3>
                <input name="emailSection" type="email" id="emailSection"><!--Remember the id/ k -->
                <h2>Card Information</h2>
                <h3>Credit Card Type</h3>
                <input type="text" name="cardType">
                <h3>Credit Card Number</h3>
                <input name="cardNumberSection" type="text" id="cardNumberSection"><!--Remember the id /k -->
                <h3>State</h3>
                <input type="text" name="state">
                <h3>Address</h3>
                <input name="addressSection" type="text" id="addressSection"><!--Remember the id -->
                <button name="registered" value="1">
                    L
                </button>
            </form>

        </div>
    </div><!--close site_content-->

    <footer>
        <a href="index.php">Home</a> | <a href="form.php">Our Work</a> | <a href="testimonials.php">Testimonials</a> | <a href="Products.php">Projects</a> | <a href="contact.html">Contact</a><br/><br/>
        <a href="http://fotogrph.com">Images</a> |  <a href="http://www.heartinternet.co.uk/web-hosting/">Web Hosting</a>  | website template by <a>us</a>
    </footer>

</div><!--close main-->

<!-- javascript at the bottom for fast page loading -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/image_slide.js"></script>

</body>
</html>
