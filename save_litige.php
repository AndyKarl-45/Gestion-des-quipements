 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $id_postulant = $_POST['id_postulant'];
        $id_employe = $_POST['id_employe'];
        $date_litige = $_POST['date_litige'];
        $nature = $_POST['nature'];
        $motif = $_POST['motif'];




//--------------------------------- -----------------------------------------//
                   
if($id_employe!=0 and $id_postulant==0){


        $query = " INSERT INTO litige (id_personnel,date_litige,nature,motif) VALUES (:id_personnel,:date_litige,:nature,:motif)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_personnel', $id_employe);
            $sql->bindParam(':date_litige', $date_litige);
            $sql->bindParam(':nature', $nature);
            $sql->bindParam(':motif', $motif);
            $sql->execute();



                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Litige a été bien enregistrée.');
                                              window.location.href='<?=$litige['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Litige n\'a pas été bien enregistrée.');
                                            window.location.href='<litige['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}else if($id_employe==0 and $id_postulant!=0){

            $query = " INSERT INTO litige (id_personnel,date_litige,nature,motif) VALUES (:id_personnel,:date_litige,:nature,:motif)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_personnel', $id_postulant);
            $sql->bindParam(':date_litige', $date_litige);
            $sql->bindParam(':nature', $nature);
            $sql->bindParam(':motif', $motif);
            $sql->execute();



                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Litige a été bien enregistrée.');
                                              window.location.href='<?=$litige['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Litige n\'a pas été bien enregistrée.');
                                            window.location.href='<?=$litige['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }

}else{

                                 ?>
                                        <script>
                                            alert('Litige n\'a pas été bien enregistrée.');
                                            window.location.href='<?=$litige['option2_link']?>?witness=-2';
                                        </script>
                                        <?php


}

                   


}
?>
