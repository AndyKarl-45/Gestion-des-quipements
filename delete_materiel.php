 <?php
    include("first.php");
    include('php/navbar_links.php');
?>

<?php

if($_GET['id_materiel'])
{               
    $id = $_GET['id_materiel'];


        $open_close=0;
        //echo $id;

         $query1  = " DELETE FROM materiel WHERE id_materiel= :id ";

                

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            // $sql1->bindParam(':open_close', $open_close);
            $sql1->bindParam(':id', $id);
            $sql1->execute();



                        if($sql1)
                                    {
                                        ?>
                                        <script>
                                            alert('materiel a été supprimé.');
                                               window.location.href='liste_mag_def.php?witness=1';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Error.');
                                            window.location.href='liste_mag_def.php?witness=-1';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
