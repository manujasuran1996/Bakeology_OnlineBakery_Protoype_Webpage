<style type="text/css" media="screen">

	.tble{
		width: 100%;
	}

	.tble thead tr th{
		background-color: blue;
		color: white;
	}

	.tble,th,td{
		border: 2px solid black;
		border-collapse: collapse;
	}
</style>


<?php 

$servername = "localhost";
$username = "root";
$password = "mysql";
$db="bakeology";

$delad=$_POST["address"];
$bank=$_POST["bankname"];
$acc=$_POST["accountno"];
$cvv=$_POST["cvvno"];
$datee=date("y-m-d");
//$deliveryadd=$post_["address"];
//connect to database

$conn=new mysqli($servername,$username,$password,$db);

//check connection

if($conn->connect_error)
{

	die('Error'.$conn->connect_error);
}
else
{
	echo 'Connection successfull';
}
$sql1="INSERT INTO payment(date,total_amount,delivery_address,cart_cart_id,cart_customer_cus_id,creditcard_credit_id)
       VALUES ('$datee','50','$delad','4','4','3')";





if($conn->query($sql1) )
{
	echo 'succesfully executed';
}
else
{
	echo 'error: cant execute'.$conn->error;
}

header("http://localhost/bakelogy1/index.html");
$conn->close();
?>

