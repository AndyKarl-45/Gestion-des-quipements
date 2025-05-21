 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
        $id_personnel = $_POST['id_personnel'];
        $date_formation = $_POST['date_formation'];
        $statut = $_POST['statut'];
        $observation = $_POST['observation'];

        // echo $code;
        // echo  $nom;
         // echo '</br></br></br></br></br></br>bonjour</br></br>'.$secteur.' '.$responsable.' '.$code.' '.$nom.' '.$tel.' '.$pays.' '.$quartier.' '.$ville;
         


        
                                //     $sql = "INSERT INTO salles (code,nom,tel)
                                //   VALUES (?,?,?,?,?,?,?,?)";
                                // $req = $db->prepare($sql);
                                // $req->execute(array($code,$nom,$tel));

//--------------------------------- insertion des pièces jointes par étape -----------------------------------------//
                   

                    $query = " INSERT INTO formation (id_personnel,date_formation,statut,observation) VALUES (:id_personnel,:date_formation,:statut,:observation)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_personnel', $id_personnel);
            $sql->bindParam(':date_formation', $date_formation);
            $sql->bindParam(':statut', $statut);
            $sql->bindParam(':observation', $observation);
            $sql->execute();



                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('formation a été bien enregistrée.');
                                              window.location.href='<?=$formation['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Formation n\'a pas été bien enregistrée.');
                                            window.location.href='<?=$formation['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
