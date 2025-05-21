<?php

include ("php/dbconnect.php");


if (isset($_POST['id_litige'])) {
    $id_litige = $_POST['id_litige'];
    // echo $id_personnel;

    $query = "DELETE FROM litige WHERE id_litige='$id_litige'";
    $sql = $conn->query($query);


    if ($sql)
    {
        echo "<script>
                window.location.href='liste_litige.php?witness=1';
            </script>";
    }
    else
    {

        echo "<script>
                window.location.href='liste_litige.php?witness=-1';
            </script>";
    }
}


?>
