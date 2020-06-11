<?php
	$conn = mysqli_connect("localhost","root","vnirmala30!","miniproject");
	
	$sql = "SELECT name,license,phone,address FROM vehicle INNER JOIN number_plate ON vehicle.license=number_plate.plate_number";
	$result=mysqli_query($conn,$sql);
	?>
<!DOCTYPE html>
<html>
<head>
<title>Number plate</title>
<link href="/main/includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/fontawesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
</br>
<div class="container" style="width:70%;">
<div class="table-responsive">
<table class="table">
	<tr>
		<th>NAME</th>
		<th>LICENSE NUMBER</th>
		<th>PHONE NUMBER</th>
		<th>ADDRESS</th>
	</tr>
	<?php
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{
	?>
	<tr>
	<td><?php echo $row["name"]; ?></td>
	<td><?php echo $row["license"]; ?></td>
	<td><?php echo $row["phone"]; ?></td>
	<td><?php echo $row["address"]; ?></td>
	</tr>
		<?php
		}
	}
	?>
	</table>
	</div>
	</div>
	</body>
    </html>