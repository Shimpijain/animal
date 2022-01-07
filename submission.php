<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add Animal</title>

<script type="text/javascript">

	window.history.forward();
	function noBack()
	{
	 window.history.forward(); 
	}
</script>
</head>

<body onload="noBack();">
	<?php
	$uploadOk="";
		$msg=$fname=$errmsg=$a_name=$c_name=$dep=$year="";
		$uploadOk=$_GET["uploadOk"];
		if($uploadOk==0)
		{
		}
		else
		{
			$msg = $_GET["msg"];
			$fname = $_GET["fname"];
			$a_name = $_GET["a_name"];
			$dep = $_GET["dep"];
			$year= $_GET["year"];
			$c_name = $_GET["c_name"];
		}
	?>	
<div class="main_contain">
	<div class="header" style="background-color: purple">
		
	</div>
	<div class="main_addCategory">
		<div class="login_div">
			<div align="center">
				<b><font face="calibiri" size="+2" color="#000099">Add Animal</b></font></b><br><br><br><br>
				<p><span class="success"><b><font face="calibiri" size="+1"><?php echo $msg; ?></b></font></span></p>
				<p><span class="error"><b><font face="calibiri" size="+1"><?php echo $errmsg; ?></font></b></span></p>
				<form action="upload1.php" focus="author" method="post" enctype="multipart/form-data">
					<table border=0>
						<tr>
							<td align="right" valign="middle" ><font size="3" face="Times New Roman">Enter Animal Name:</font><br><br></td>
							<td align="left" valign="middle">
								<input type="text" name="a_name" size="20"  value="<?php echo $a_name; ?>" required /><br><br>
							</td>							
						</tr>
						<tr>
							<td align="right" valign="middle" ><font size="3" face="Times New Roman">Category:</font><br><br></td>
							<td align="left" valign="middle">
								<input type="radio" name="c_name" size="20"  value="herbivores<?php echo $c_name; ?>" required >herbivores
								<input type="radio" name="c_name" size="20"  value="omnivores<?php echo $c_name; ?>" required >omnivores
								<input type="radio" name="c_name" size="20"  value="carnivores<?php echo $c_name; ?>" required >carnivores
								<br><br>
							</td>							
						</tr>
						<tr>
							<td align="right" valign="middle" ><font size="3" face="Times New Roman">Description:</font><br><br></td>
							<td align="left" valign="middle">
								<input type="textarea" name="dep" size="20"  value="<?php echo $dep; ?>" required /><br><br>
							</td>							
						</tr>
						<tr>
							<td align="right" valign="middle" ><font size="3" face="Times New Roman">Life expectancy:</font><br><br></td>
							<td align="left" valign="middle">
								<select name="year">
									<option value="0">Select</option>
									<option value="0-1year" selected>0-1 year</option>
									<option value="1-5 " selected>1-5 year</option>
									<option value="5-10 " selected>5-10 year</option>
									<option value="10+ " selected>10+ year</option>
								</select><br><br>
							</td>							
						</tr>
						<tr>
							<td align="right" valign="middle"><font font size="3" face="Times New Roman">Select Images:</font><br><br> </td>
							<td align="left" valign="middle"><input type="file" name="image" multiple required><br><br></td>
							<td><input type="submit" name="" value="upload" style="cursor: pointer;" id="upld" onsubmit="callUpload()"><br><br></td>
						</tr>
						<tr>
							<td align="right" valign="middle">
								<font font size="3" face="Times New Roman">Uploaded image Name:</font><br><br>
							</td>							
							<td align="left" valign="middle" colspan=2>
								<input type="text" name="filename" value="<?php echo $fname;?>" disabled><br><br>
							</td>							
						</tr>
						<tr>							
							<td>
								&nbsp;
							</td>	
							<td align="left" valign="middle" colspan=2>
								<a href="action.php?a_name=<?php echo $a_name; ?>&c_name=<?php echo $c_name; ?>&
									dep=<?php echo $dep; ?>&year=<?php echo $year; ?>&filename=<?php echo $fname;?>&uploadOk=<?php echo $uploadOk;?>" class="btn">Add Animal</a>
							</td>							
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>	