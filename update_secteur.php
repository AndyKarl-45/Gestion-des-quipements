 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
         $id = $_POST['id_secteur'];
        $nom= $_POST['nom'];
        $numero_secteur = $_POST['numero_secteur'];
        $tel = $_POST['tel'];
        $responsable = $_POST['responsable'];


         // echo $id.'</br>';
         // echo $nom.'</br>';
         // echo $numero_secteur.'</br>';
         // echo $tel.'</br>';
         // echo $responsable.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE secteur SET nom=:nom, numero_secteur=:numero_secteur, tel=:tel, responsable=:responsable where id_secteur = '$id' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':nom', $nom);
            $sql1->bindParam(':numero_secteur', $numero_secteur);
            $sql1->bindParam(':tel', $tel);
            $sql1->bindParam(':responsable', $responsable);
            $sql1->execute();



                                    if($sql1)
                                    {   
                                        
                                      ?>
                                        <script>
                                            alert('Secteur a été bien modifiée.');
                                                  window.location.href='<?=$secteur['option2_link']?>';
                                        </script>
                                        <?php

                                        

                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Secteur n\'a pas été  modifiée.');
                                            window.location.href='<?=$secteur['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
