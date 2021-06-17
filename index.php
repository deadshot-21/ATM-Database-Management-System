<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Indian Bank</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="x">

	<div class="jumbotron" >
  <h1 class="display-4 y">Welcome To Indian Bank</h1>
  <hr class="my-4">
  <form method="post" action="#">
  	<label>Enter Your ATM Card Number: </label><br>
  	<input type="text" name="atm no" id="atm_no"><br>
  	<label>CVV: </label><br>
  	<input type="password" name="cvv" id="cvv"><br><br>
    <label>Account Type:</label>
    <select>
      <option></option>
      <option>Current</option>
      <option>Savings</option>
      <option>Deemat</option>
    </select><br><br>
  	<button type="submit" name="submit" id="submit" class="btn btn-secondary btn-lg">Submit</button>
  </form>
</div>

 <?php
  $host="localhost";
  $username="root";
  $user_pass="usbw";
  $database_in_use="atm database";

  $mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
  if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  
  if(isset($_POST['submit']))
  {
    $card_no=$_POST['atm_no'];
    $cvv=$_POST['cvv'];
    $sql="SELECT CARD_CVV FROM card WHERE CARD_NO='$card_no'"; 
    mysqli_query($mysqli,$sql);
    $result = $mysqli->query($sql);
    if($result = $cvv)
    {
    	
    	header("Location: option.php");
    }
  }
  if(isset($_POST['cvv']))
  {
    $cvv=$_POST['cvv'];
    $url = "option.php?cvv=" . $cvv;
    header('Location: ' . $url);
    exit();
  }
    $mysqli->close();
?>

</body>
</html>