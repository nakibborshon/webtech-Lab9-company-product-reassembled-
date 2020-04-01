<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<style>
header {
  background-color: #666;
  padding: 30px;
  text-align: left;
  font-size: 35px;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: right;
  width: 30%;
  height: 100px; /* only for demonstration, should be removed */
  background: #ccc;
  padding: 20px;
}


/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: right;
}

li a {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  margin-left: 2px;
  margin-right: 2px;
  border-style: solid;
  border-color: black;
}

li a:hover {
  background-color: #111;
}

.active {
  background-color: red;
}
article {
  float: left;
  padding: 20px;
  width: 60%;
  background-color: #f1f1f1;
  height: 300px; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;

}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}
/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  nav, article {
    width: 100%;
    height: auto;
  }
}

</style>
</head>
<body>

<?php
      $name="";$gender="male";$email="";$dob="";$nameErr=$emailErr=$dobErr="";$val=FALSE;
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $val=TRUE;
          if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $val=FALSE;
          } else {
              $name = test_input($_POST["name"]);
          }
   
         if (empty($_POST["dob"])) {
            $dobErr = "This is required";
            $val=FALSE;
         } else {
              $dob = test_input($_POST["dob"]);
         }

         if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $val=FALSE;
         } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $val=FALSE;
            }
         }
        
         $gender = $_POST["gender"];
      }

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

	<header>
  <h2>XComapany</h2>
  <ul>
      <li><a href="home_.php">Log Out</a></li>
    </ul>
</header>

<section> 
  <nav>
    <ul>
      <li><a href="dashboard.html">Dash Board</a></li>
      <li><a href="viewprofile.php">View Profile</a></li>
      <li><a href="editprofile.php">Edit Profile</a></li>
      <li><a href="#">Change Profile Picture</a></li>
      <li><a href="changepassword.php">Change Password</a></li>
      <li><a href="home_.html">Logout</a></li>
    </ul>
  </nav>
  <article>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <fieldset>
  <legend>Edit Profile:</legend>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br>
  <div class="line"></div><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><br>
  <div class="line"></div><br>
 <legend>Gender</legend>
      <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label>
  <div class="line"></div><br>
  <label for="date">Date of Birth:</label>
  <input type="date" id="date" name="dob"><br>
  <input type="submit" value="Submit">
  </article>
</section>

<footer>
  <p>Copyright 2017</p>
</footer>

<?php
    if($val){
          $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "myDB";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $usrname=$_SESSION["username"];
      $sql = "UPDATE Users SET name='$name',email='$email',dob='$dob',gender='$gender' WHERE username='$usrname'";

      if ($conn->query($sql) === TRUE) {
        $_SESSION["name"]=$name;
        $_SESSION["email"]=$email;
        $_SESSION["dob"]=$dob;
        $_SESSION["gender"]=$gender;
          header('location:updatesuccesful.php');
            exit();

      } else {
          echo "Error updating record: " . $conn->error;
      }

      $conn->close();
      }
  ?>
</body>
</html>