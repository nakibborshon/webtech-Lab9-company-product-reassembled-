<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
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
	<header>
  <h2>XComapany</h2>
  <ul>
      <li><a href="home_.html">Log Out</a></li>
    </ul>
</header>

<section> 
  <nav>
    <ul>
      <li><a href="dashboard.php">Dash Board</a></li>
      <li><a href="viewprofile.php">View Profile</a></li>
      <li><a href="editprofile.php">Edit Profile</a></li>
      <li><a href="#">Change Profile Picture</a></li>
      <li><a href="changepassword.php">Change Password</a></li>
      <li><a href="home_.php">Logout</a></li>
    </ul>
  </nav>
  <article>
 <fieldset>
  <legend>View Profile:</legend>
  <label for="name">Name:</label>
  <?php echo $_SESSION["name"]; ?>
  <div class="line"></div><br>
  <label for="email">Email:</label>
  <?php echo $_SESSION["email"]; ?>
  <div class="line"></div><br>
  <label for="gender">Gender:</label>
  <?php echo $_SESSION["gender"]; ?>
  <div class="line"></div><br>
  <label for="date">Date of Birth:</label>
  <?php echo $_SESSION["dob"]; ?>
  <br><div class="line"></div><br>
  <br><br>

  <a href="changeprofilepicture.php"">Edit Profile</a>
  </article>
</section>

<?php
        if($_SESSION["image"]==null){
          echo "<img src='image.jpg' alt='profile picture' height='42' width='42' border='solid'>";
        }
        else{
          $image=$_SESSION["image"];
          echo "<img src='$image' alt='profile picture' height='42' width='42' border='solid'>";
        }
 ?>

<footer>
  <p>Copyright 2017</p>
</footer>

</body>
</html>