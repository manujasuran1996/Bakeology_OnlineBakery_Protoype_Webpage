
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

	.tble caption{
		font-size: 50px;
	}

</style>
<div class = "result-count">
			<td><a href="http://localhost/Bakelogy/Manuja/bill.php" class="btn btn-primary"> Click to go back </a></td>
		</div>

<?php  

$servername = "localhost";
$username = "root";
$password = "mysql";
$db="bakeology";

//connect to database

$conn=new mysqli($servername,$username,$password,$db);

//check connection
if($conn->connect_error)
{

	die('Error'.$conn->connect_error);
}
else
{
	//echo 'Connection successfull';
}
$sql="SELECT pa.date,pa.delivery_address,cr.bank,cr.acc_no,cr.cvv_no,pr.pname,pr.unit_price,ca.cart_quantity,pr.category
	from customer cu,cart ca,product pr,creditcard cr,payment pa
	where cu.cus_id=ca.customer_cus_id and ca.product_product_id=pr.product_id and ca.cart_id=pa.cart_cart_id;
   ";

$result=mysqli_query($conn,$sql);

if($conn->query($sql))
{
	//echo 'succesfully executed';
}
else
{
	echo 'error: cant execute'.$conn->error;
}

echo "<!DOCTYPE html>".
"<html>".
"<head>".
	
	
	"<title></title>".
	
"</head>"."<body >";

if(mysqli_num_rows($result)>0)
{

	echo "<table class='tble'>".
		"<caption>Payment Details</caption>".
			"<thead>".
			"<tr>".
				
				"<th>Date</th>".
				"<th>Delivery Address</th>".
				"<th>Bank Name</th>".
				
				"<th>Acc No</th>".
				"<th>Cvv No</th>".
				"<th>Item Name</th>".
				"<th>Unit Price</th>".
				"<th>quantity</th>".
				"<th>Catogery</th>".
				"<th>Total Price</th>".
			"</tr>".
			"</thead>"
			;

	while($row=mysqli_fetch_assoc($result))
	{

		
		
			
	



	echo 
		
		
			"<tr>".
				
				"<td>".$row["date"]."</td>".
				"<td>".$row["delivery_address"]."</td>".
				"<td>".$row["bank"]."</td>".
				"<td>".$row["acc_no"]."</td>".
				"<td>".$row["cvv_no"]."</td>".
				"<td>".$row["pname"]."</td>".
				"<td>".$row["unit_price"]."</td>".
				"<td>".$row["cart_quantity"]."</td>".
				"<td>".$row["category"]."</td>".
				"<td>".$row["cart_quantity"]*$row["unit_price"]."</td>".
			"</tr>";
		
			
	


		
	}


}

	echo "</table></body>
</html>";
?>
