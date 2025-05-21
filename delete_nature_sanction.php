<?php

include ("php/dbconnect.php");


if (isset($_POST['id_nature_sanc'])) {
    $id_nature_sanc = $_POST['id_nature_sanc'];
    // echo $id_personnel;

    $query = "DELETE FROM nature_sanction WHERE id_nature_sanc='$id_nature_sanc'";
    $sql = $conn->query($query);


    if ($sql)
    {
        echo "<script>
                window.location.href='liste_nature_sanction.php?witness=1';
            </script>";
    }
    else
    {

        echo "<script>
                window.location.href='liste_nature_sanction.php?witness=-1';
            </script>";
    }
}


?>
