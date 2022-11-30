<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    $surname = $_POST['surname'];

    $id_number = $_POST['id_number'];

    $date_of_birth = $_POST['date_of_birth'];
	
	
	$orderdate = explode('-', $date_of_birth);
	$year = $orderdate[0];
	$month   = $orderdate[1];
	$day  = $orderdate[2];
	$yearcheck=false;
	$monthcheck=false;
	$daycheck=false;
	
		  if (strcmp(substr($year, 2, 4), substr($id_number, 0,2)) == 0)
	{
		$yearcheck=true;
	}
			if (strcmp($month,substr($id_number, 2,2)) == 0)
	{
		$monthcheck=true;
	}
			if (strcmp($day,substr($id_number, 4,2)) == 0)
	{
		$daycheck=true;
	}

	$sql_checkId="SELECT id_number FROM users WHERE  id_number=$id_number";
	 $result2 = $conn->query($sql_checkId);
	 
	if((strcmp($yearcheck, true) == 0) && (strcmp($monthcheck, true) == 0) && (strcmp($daycheck, true) == 0))
	{
		
	if($result2->num_rows == 0 )
	{
		$sql = "INSERT INTO `users`(`name`, `surname`, `id_number`, `date_of_birth`) VALUES ('$name','$surname','$id_number','$date_of_birth')";
		$result = $conn->query($sql);
	



    if ($result == TRUE ) {
		
		echo "<script>alert('You have successfully inserted the data');</script>";
    echo "<script type='text/javascript'> document.location ='view.php'; </script>";


    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 
	}// closing tag for id check
		else{
		echo "This is an existing ID Number please try again";
	}// end id check if
	
	}// end outer if close
	else{
		echo "Your ID Number and the date of birth do not match\n";

	}
	// end outer if  --test date and id

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Employee Registration</h2>

<form action="" method="POST">

  <fieldset>

    <legend>User information:</legend>

    Name:<br>

    <input type="text" name="name" required="true">

    <br>

    Surname:<br>

    <input type="text" name="surname" required="true">

    <br>

    ID Number:<br>

    <input type="id_number" name="id_number" required="true" maxlength="13" pattern="[0-9]+" size="13">

    <br>

    Date Of Birth:<br>

    <input type="date" name="date_of_birth" required="true" max="<?php echo date("Y-m-d"); ?>">

    <br>

   <br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

<a href="view.php">
 View saved data
</a>

</body>

</html>