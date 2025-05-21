 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        
      $code = $_POST['code'];
       $nom = $_POST['nom'];
       $tel = $_POST['tel'];
       $pays =  $_POST['pays'];
        $ville = $_POST['ville'];
        $quartier = $_POST['quartier'];
        $secteur = $_POST['secteur'];
        $responsable = $_POST['responsable'];

        // echo $code;
        // echo  $nom;
         // echo '</br></br></br></br></br></br>bonjour</br></br>'.$secteur.' '.$responsable.' '.$code.' '.$nom.' '.$tel.' '.$pays.' '.$quartier.' '.$ville;
         


        
                                //     $sql = "INSERT INTO salles (code,nom,tel)
                                //   VALUES (?,?,?,?,?,?,?,?)";
                                // $req = $db->prepare($sql);
                                // $req->execute(array($code,$nom,$tel));

//--------------------------------- insertion des pièces jointes par étape -----------------------------------------//


                    $query = " INSERT INTO salles (code,nom,tel,pays,ville,quartier,secteur,responsable) VALUES (:code,:nom,:tel,:pays,:ville,:quartier,:secteur,:responsable)";

                 $sql = $db->prepare($query);

     // Bind parameters to statement
            $sql->bindParam(':code', $code);
            $sql->bindParam(':nom', $nom);
            $sql->bindParam(':tel', $tel);
            $sql->bindParam(':pays', $pays);
            $sql->bindParam(':ville', $ville);
            $sql->bindParam(':quartier', $quartier);
            $sql->bindParam(':secteur', $secteur);
            $sql->bindParam(':responsable', $responsable);
            $sql->execute();



                                    if($sql)
                                    {
                                        ?>
                                        <script>
                                            alert('Salles a été bien enregistrée.');
                                             window.location.href='<?=$salle['option2_link']?>';
                                        </script>
                                        <?php
                                    }

                                    else
                                    {       
                                      ?>
                                        <script>
                                            alert('Salles existe déjà.');
                                            window.location.href='<?=$salle['option2_link']?>';
                                        </script>
                                        <?php
                                       
                                    }


}
?>
