<?php 

include "config.php";

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Users</h2>
		<a href="create.php">
  <button>Add User</button>
</a>

<table class="table">

    <thead>

        <tr>


        <th>Name</th>

        <th>Surname</th>

        <th>ID Number</th>

        <th>Date Of Bith</th>

        <th>Action</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>


                    <td><?php echo $row['name']; ?></td>

                    <td><?php echo $row['surname']; ?></td>

                    <td><?php echo $row['id_number']; ?></td>

                    <td><?php echo $row['date_of_birth']; ?></td>

                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>

                    </tr>                       

        <?php       }

            }
			else
			{
				echo "Database contains 0 records";
			}

        ?>                

    </tbody>

</table>


    </div> 

</body>

</html>

