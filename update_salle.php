 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
         $id = $_POST['id_salles'];
        $nom= $_POST['nom'];
        $tel = $_POST['tel'];
        $secteur = $_POST['secteur'];
        $responsable = $_POST['responsable'];
        $ville = $_POST['ville'];
        $quartier = $_POST['quartier'];
         $pays = $_POST['pays'];


        // echo $nom.'</br>';
        // echo $type_conger.'</br>';
        // echo $start_time.'</br>';
        // echo $end_time.'</br>';
        // echo $motif.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE salles SET nom=:nom, tel=:tel, secteur=:secteur, responsable=:responsable, ville=:ville, quartier=:quartier, pays=:pays where id_salles = '$id' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':nom', $nom);
            $sql1->bindParam(':tel', $tel);
            $sql1->bindParam(':secteur', $secteur);
            $sql1->bindParam(':responsable', $responsable);
            $sql1->bindParam(':ville', $ville);
            $sql1->bindParam(':quartier', $quartier);
            $sql1->bindParam(':pays', $pays);
            $sql1->execute();



                                    if($sql1)
                                    {   
                                        
                                      ?>
                                        <script>
                                            alert('Salle a été bien modifiée.');
                                                 window.location.href='<?=$salle['option2_link']?>';
                                        </script>
                                        <?php

                                        

                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Salle n\'a pas été  modifiée.');
                                            window.location.href='<?=$salle['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
