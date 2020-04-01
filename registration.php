<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 20px;
  text-align: left;
  font-size: 25px;
  color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
  float: left;
  width: 30%;
  height: 800px; /* only for demonstration, should be removed */
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
  width: 70%;
  background-color: #f1f1f1;
  /*height: 300px; /* only for demonstration, should be removed */
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
.line{
	border-bottom: 2px solid black;
	height: 0px;
	width: 800px;
}
.error {color: #FF0000;}
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
    $name="";$gender="male";$email="";$usrname="";$password=$confirmpassword=$dob="";
  $nameErr=$emailErr=$usernameErr=$passErr=$conpassErr=$dobErr="";$val=FALSE;
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $val=TRUE;
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $val=FALSE;
      } else {
          $name = test_input($_POST["name"]);
      }
      if (empty($_POST["username"])) {
        $usernameErr = "User Name is required";
        $val=FALSE;
      } else {
          $usrname = test_input($_POST["username"]);
      }
      if (empty($_POST["password"])) {
        $passErr = "Password is required";
        $val=FALSE;
      } else {
          $password = test_input($_POST["password"]);
      }
      if (empty($_POST["confirmpassword"])) {
        $conpassErr = "This is required";
        $val=FALSE;
      } else {
          $confirmpassword = test_input($_POST["confirmpassword"]);
      }
      if($password!=$confirmpassword){
        $conpassErr = "Password does not match.";
        $val=FALSE;
      }
      else {
          $confirmpassword = test_input($_POST["confirmpassword"]);
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
  <h2>XCompany</h2>
  	   <ul>
      <li><a href="home_.php">Home</a></li>
      <li><a href="registration.php">Registration</a></li>
      <li><a href="login.php">Login</a></li>
    </ul>
</header>

<section>
  
  <article>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 <fieldset>
  <legend>Registration:</legend>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><span class="error">* <?php echo $nameErr;?></span><br><br>
  <div class="line"></div><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email"><span class="error">* <?php echo $emailErr;?></span><br><br>
  <div class="line"></div><br>
  <label for="UserName">UserName:</label>
  <input type="text" id="username" name="username"><span class="error">* <?php echo $usernameErr;?></span><br><br>
  <div class="line"></div><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password"><span class="error">* <?php echo $passErr;?></span><br><br>
  <div class="line"></div><br><br>
  <label for="confirmpassword">Confirm Password:</label>
  <input type="password" id="Confirmpassword" name="confirmpassword"><span class="error">* <?php echo $conpassErr;?></span><br><br>
  <div class="line"></div><br>
  <fieldset>
  	<legend>Gender</legend>
  	  <input type="radio" id="male" name="gender" value="male" <?php if($gender=="male") echo 'checked'; ?>>
	  <label for="male">Male</label>
	  <input type="radio" id="female" name="gender" value="female" <?php if($gender=="female") echo 'checked'; ?>>
	  <label for="female">Female</label>
	  <input type="radio" id="other" name="gender" value="other" <?php if($gender=="Other") echo 'checked'; ?>>
	  <label for="other">Other</label>
  </fieldset>
    <fieldset>
  	<legend>Date of Birth</legend>
  	  <input type="date" name="dob" value=""><span class="error">* <?php echo $dobErr;?></span>
  </fieldset>
  <input type="submit" value="Submit">
  <input type="submit" value="Reset">
 </fieldset>
</form>
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

    $sql = "INSERT INTO Users (name, username, email,password,gender,dob)
    VALUES ('$name', '$usrname', '$email','$pass','$gender','$dob')";

    if ($conn->query($sql) === TRUE) {
        header('location:successful.php');
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
?>

</body>
</html>
