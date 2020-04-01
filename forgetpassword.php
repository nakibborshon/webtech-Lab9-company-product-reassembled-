<!DOCTYPE html>
<html>
<head>
	<title>Forget Password </title>
<style>
header {
  background-color: #666;
  padding: 20px;
  text-align: left;
  font-size: 25px;
  color: white;
}
article {
  float: left;
  padding: 20px;
  width: 70%;
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
	<h2>Xcompany</h2>
</header>
<article>
<form action="/action_page.php">
 <fieldset>
  <legend>Forget Password:</legend>
  <label for="fpass">Enter Email:</label>
  <input type="password" id="fpass" name="fpass"><br><br>
  <input type="submit" value"Submit">
</fieldset>
</form>
</article>

<footer>
  <p>Copyright 2017</p>
</footer>
</body>
</html>