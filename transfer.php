<!DOCTYPE html>
<html>
<head>
	<title>Transfer</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="x">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Enter Details: </h1><br><br>
    <form method="post" action="#">
    	<label>Account Number to Transfer: </label>
    	<input type="text" name="acct" id="acct"><br><br>
    	<label>Amount to Transfer: </label>
    	<input type="text" name="transfer" id="transfer"><br><br>
    	<button type="submit" id="submit" name="submit" class="btn btn-secondary btn-lg">Transfer</button>
    	<button type="submit" id="cancel" name="cancel" class="btn btn-secondary btn-lg">Abort</button>
    </form>
</div>
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
  if(isset($_POST['cancel']))
  {
  	header('Location: index.php');
  }

  if(isset($_POST['submit']))
  {
    $cvv=(int) $_GET['cvv'];
	$amt=$_POST['transfer'];
	$acct=$_POST['acct'];
    $sql="SELECT CARD_BALANCE FROM card WHERE CARD_CVV = '$cvv'"; 
    mysqli_query($mysqli,$sql);
    $result = $mysqli->query($sql);
 	$x=mysqli_fetch_assoc($result);
 	$sql1="SELECT CARD_BALANCE FROM card WHERE CARD_NO = '$acct'"; 
 	$z=$x["CARD_BALANCE"];
    mysqli_query($mysqli,$sql1);
    $result1 = $mysqli->query($sql1);
 	$b=mysqli_fetch_assoc($result1);
 	$c=$b["CARD_BALANCE"];
    if($z>$amt)
    {
    	$y=$c+$amt;
    	$a=$z-$amt;
		$sql2="UPDATE card SET CARD_BALANCE = '$a' WHERE CARD_CVV = '$cvv'";
		mysqli_query($mysqli,$sql2);
		$sql3="UPDATE card SET CARD_BALANCE = '$y' WHERE CARD_NO = '$acct'";
		mysqli_query($mysqli,$sql3);
		$sql4="INSERT INTO transaction(TRANSACTION_ID,TRANSACTION_NAME,TRANSACTION_STATUS,TRANSACTION_TYPE) VALUES ('','transfer','COMPLETED','TRANSFER')";
		mysqli_query($mysqli,$sql4);
		$sql5="SELECT CARD_NO FROM card WHERE CARD_CVV='$cvv'";
		mysqli_query($mysqli,$sql5);
		$result5=$mysqli->query($sql5);
		$s=mysqli_fetch_assoc($result5);
		$v=$s['CARD_NO'];
		$sql6="INSERT INTO temp(TRANSACTION_ID,CARD_NO,AMOUNT) VALUES ('','$v','$amt')";
		mysqli_query($mysqli,$sql6);
	    $url = "receipt.php?card_no=" . $v;
	    header('Location: ' . $url);
	    exit();
	}
    
  }
    $mysqli->close();
?>
</body>
</html>