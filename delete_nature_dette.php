<?php

include ("php/dbconnect.php");


if (isset($_POST['id_nat_dette'])) {
    $id_nat_dette = $_POST['id_nat_dette'];
    // echo $id_personnel;

    $query = "DELETE FROM naturedette WHERE id_nat_dette='$id_nat_dette'";
    $sql = $conn->query($query);


    if ($sql)
    {
        echo "<script>
                window.location.href='liste_nature_dette.php?witness=1';
            </script>";
    }
    else
    {

        echo "<script>
                window.location.href='liste_nature_dette.php?witness=-1';
            </script>";
    }
}


?>
