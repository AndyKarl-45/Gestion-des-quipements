<?php

include ("php/dbconnect.php");


if (isset($_POST['id'])) {
    $id_personnel = $_POST['id'];
    // echo $id_personnel;

    $query = "DELETE FROM personnel WHERE id_personnel='$id_personnel'";
    $sql = $conn->query($query);


    if ($sql)
    {
        echo "<script>
                window.location.href='liste_personnel.php?witness=1';
            </script>";
    }
    else
    {

        echo "<script>
                window.location.href='liste_personnel.php?witness=-1';
            </script>";
    }
}


?>
