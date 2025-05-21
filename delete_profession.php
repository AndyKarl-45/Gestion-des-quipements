<?php

include ("php/dbconnect.php");


if (isset($_POST['id_prof'])) {
    $id_prof = $_POST['id_prof'];
    // echo $id_personnel;

    $query = "DELETE FROM profession WHERE id_prof='$id_prof'";
    $sql = $conn->query($query);


    if ($sql)
    {
        echo "<script>
                window.location.href='liste_profession.php?witness=1';
            </script>";
    }
    else
    {

        echo "<script>
                window.location.href='liste_profession.php?witness=-1';
            </script>";
    }
}


?>
