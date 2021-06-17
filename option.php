<!DOCTYPE html>
<html>
<head>
	<title>ATM DATABASE MANAGEMENT SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="x">
	<div class="jumbotron">
  <h1 class="display-4">Please Choose Your Task!</h1>
  <hr class="my-4">
  	<form action="#" method="post">
		<button type="submit" class="btn btn-secondary btn-lg" id="deposit" name="deposit">Deposit</button><br><br>
	</form>
	<form action="#" method="post">
		<button type="submit" class="btn btn-secondary btn-lg" id="withdraw" name="withdraw">Withdraw</button><br><br>
	</form>
	<form action="#" method="post">
		<button type="submit" class="btn btn-secondary btn-lg" id="transfer" name="transfer">Transfer</button><br><br>
	</form>
	<form action="#" method="post">
		<button type="submit" class="btn btn-secondary btn-lg" id="balance" name="balance">Balance Enquiry</button>
	</form>
</div>
<?php
	$cvv=(int) $_GET['cvv'];
	if(isset($_POST['deposit']))
 	{
    	$url = "deposit.php?cvv=" . $cvv;
    	header('Location: ' . $url);
    	exit();
  	}
  	if(isset($_POST['withdraw']))
  	{
  		$url = "withdraw.php?cvv=" . $cvv;
    	header('Location: ' . $url);
    	exit();
  	}
  	if(isset($_POST['transfer']))
  	{
  		$url = "transfer.php?cvv=" . $cvv;
    	header('Location: ' . $url);
    	exit();
  	}
  	if(isset($_POST['balance']))
  	{
  		$url = "balance.php?cvv=" . $cvv;
    	header('Location: ' . $url);
    	exit();
  	}
?>
</body>
</html>