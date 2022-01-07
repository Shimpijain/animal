<?php
	function filtername($field)
  	{
    $field=filter_var(trim($field),FILTER_SANITIZE_STRING);
    if(filter_var($field,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
      return $field;
    }
    else
    {
      return FALSE;
    }
  }
	$a_name = $_POST["a_name"];
	$c_name = $_POST["c_name"];
	$dep = $_POST["dep"];
	$year = $_POST["year"];
	
	if(filtername($a_name)==FALSE){
		$uploadOk=0;
		$msgerr = "Please enter the correct value";
		header("Location:submission.php?msgerr=$msgerr&uploadOk=$uploadOk&a_name=$a_name&c_name=$c_name&dep=$dep&year=$year");
	}		
	else{
	$target_path="animal/";
	$target_file=$target_path.basename($_FILES["image"]["name"]);
	$uploadOk=1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if(isset($_POST["submit"])){
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check!==false){
			echo "File is an image - ".$check["mime"].".";
			$uploadOk=1;
		}
		else{
			echo "File is not an image.";
			$uploadOk=0;
		}
	}

	if ($imageFileType!="jpg" && $imageFileType!="png" && $imageFileType!= "jpeg")
	{
		$uploadOk=0;
	}

	if($uploadOk==0)
	{
		$msgerr = "Sorry, only JPG,JPEG,PNG files are allowed";
		header("Location:submission.php?msgerr=$msgerr&uploadOk=$uploadOk&a_name=$a_name&c_name=$c_name&dep=$dep&year=$year");
	}
	else
	{
		if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
		{
			$filename = basename($_FILES["image"]["name"]);
			$msg = "The file " . basename($_FILES["image"]["name"])." has been uploaded.";
			header("Location:submission.php?msg=$msg&fname=$filename&uploadOk=$uploadOk&a_name=$a_name&c_name=$c_name&dep=$dep&year=$year");
		}
		else
		{
			$uploadOk=0;
			$msgerr =  "Sorry! File is not upload successfully.";
			header("Location:submission.php?msgerr=$msgerr&uploadOk=$uploadOk&a_name=$a_name&c_name=$c_name&dep=$dep&year=$year");
		}
	}
}	
?>
