<?php

include ("php/dbconnect.php");


if (isset($_POST['id_sanction'])) {
    $id_sanction = $_POST['id_sanction'];
    // echo $id_personnel;

    $query = "DELETE FROM sanction WHERE id_sanction='$id_sanction'";
    $sql = $conn->query($query);


    if ($sql)
    {
        echo "<script>
                window.location.href='liste_sanction.php?witness=1';
            </script>";
    }
    else
    {

        echo "<script>
                window.location.href='liste_sanction.php?witness=-1';
            </script>";
    }
}


?>
