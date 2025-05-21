 <?php
    
    include('php/navbar_links.php');
    include("php/db.php")



?>

<?php

if($_POST)
{               


        // $id_sanction = $_POST['id'];
        $id_personnel = $_POST['id_personnel'];
        $nature = $_POST['nature'];
        $date1 = $_POST['date1'];
        $motif =  $_POST['motif'];
        $montant =  $_POST['montant'];
        // echo $id_sanction;

        // echo $code;
        // echo  $nom;
         // echo '</br></br></br></br></br></br>bonjour</br></br>'.$secteur.' '.$responsable.' '.$code.' '.$nom.' '.$tel.' '.$pays.' '.$quartier.' '.$ville;
         


        
                                //     $sql = "INSERT INTO salles (code,nom,tel)
                                //   VALUES (?,?,?,?,?,?,?,?)";
                                // $req = $db->prepare($sql);
                                // $req->execute(array($code,$nom,$tel));

//--------------------------------- insertion des pièces jointes par étape -----------------------------------------//
                   

                    $query = " INSERT INTO sanction (id_personnel,nature,motif,date_sanction,montant) VALUES (:personnel,:nature,:motif,:date1,:montant)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':id_personnel', $id_personnel);
            $sql->bindParam(':nature', $nature);
            $sql->bindParam(':motif', $motif);
            $sql->bindParam(':date1', $date1);
            $sql->bindParam(':montant', $montant);
            $sql->execute();



         

                if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Sanction a été bien enregistrée.');
                                            window.location.href='<?=$sanction['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                      {                                             ?>
                                        <script>
                                            alert('Sanction n\'a été bien enregistrée.');
                                            window.location.href='<?=$sanction['option2_link']?>';
                                        </script>
                                        <?php
                                    }
            


}
?>
