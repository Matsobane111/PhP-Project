<?php 

include "config.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `Users` WHERE `id`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "<script>alert('Data deleted');</script>"; 
echo "<script>window.location.href = 'view.php'</script>";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>