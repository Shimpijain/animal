<?php  
include("connection.php");
?>
<?php
					$sql ="select * from animal ";

					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_array($result))
					{
						$a_name=$row['a_name'];
						$c_name=$row['c_name'];
						$year=$row['year'];
						$dep=$row['dep'];
						$id=$row['a_id'];
					?>			
					<table border="1">
	<tr>
							<td>num</td>	
							<td>animal name</td>
							<td>category</td>
							<td>year</td>
							<td>Description</td>
						</tr>

						<tr>
							<td><?php echo $id; ?></td>	
							<td><?php echo $a_name ?></td>
							<td><?php echo $c_name ?></td>
							<td><?php echo $year ?></td>
							<td><?php echo $dep ?></td>
						</tr>
						
					</table>
				<?php
					}
			}		
		?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
</body>
</html>