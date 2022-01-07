<?php
include("connection.php");
?>
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


$fname=test_input($_GET["filename"]);
$a_name=filterName(test_input($_GET["a_name"]));
$c_name=filterName(test_input($_GET["c_name"]));
$dep=filterName(test_input($_GET["dep"]));
$year=test_input($_GET["year"]);

	if ($a_name==FALSE)
		{
			$msgerr="Please enter a correct value";
		}
	else
	{

		 $dupsql="select * from animal where a_name=\"$a_name\"";
          $vals = mysqli_query($conn, $dupsql);          
          if(mysqli_num_rows($vals)>0)
          {
            $msgerr = "Author is already exixts.";
            header("Location:animals.php?uploadOk=0&fname=$fname&a_name=$a_name&c_name=$c_name&year=$year&dep=$dep&msgerr=$msgerr");
          }

           else
           {
					$sql="insert into animal(a_name,c_name,year,dep,filename)values(\"$a_name\",\"$c_name\",\"$year\",\"$dep\",\"$fname\")";
					if(mysqli_query($conn,$sql))
					{
						$msg = "Animal added successfully";
						$fname="";
						$a_name="";
						$c_name="";
						$year="";
						$dep="";
						header("Location:animals.php?uploadOk=1&fname=$fname&a_name=$a_name&c_name=$c_name&year=$year&dep=$dep&msg=$msg");
					}
					else
					{
						$msgerr = "Author does not add successfully";
						header("Location:animals.php?uploadOk=0&fname=$fname&a_name=$a_name&c_name=$c_name&year=$year&dep=$dep&msgerr=$msgerr");
					}
			}
		}

function test_input($data)
{
	$data= trim($data);
	$data= stripcslashes($data);
	$data= htmlspecialchars($data);
	return $data;
}
mysqli_close($conn);
?>