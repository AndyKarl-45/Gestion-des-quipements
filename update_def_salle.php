 <?php
    include("first.php");
    include('php/navbar_links.php');
    include("php/db.php")
?>

<?php

if($_POST)
{               


        /*--------------------------------- ETAT HOLIDAY -------------------------------------*/
        $ids_c=$_POST['id_salles'];
        $id_m = $_POST['id_materiel'];
        $statut=0; //en maintenance
        // echo $nom.'</br>';
        // echo $type_conger.'</br>';
        // echo $start_time.'</br>';
        // echo $end_time.'</br>';
        // echo $motif.'</br>';


        /*--------------------------------- SAVE DATA HOLIDAY ---------------------------*/

        $query1 = "UPDATE materiel SET id_salles=:ids_c, statut=:statut where  id_materiel='$id_m' ";

        $sql1 = $db->prepare($query1);

             // Bind parameters to statement
            $sql1->bindParam(':ids_c', $ids_c);
            $sql1->bindParam(':statut', $statut);
            $sql1->execute();



                                    if($sql1)
                                    {
                                        $nom_s = "n/a";
                                        $designation = "n/a";
                                        $q = $db->query("select * from salles where id_salles='$ids_c'");
                                        while($row = $q->fetch()){
                                            $nom_s = $row['nom'];
                                        }
                                        $q = $db->query("select * from materiel where id_materiel='$id_m'");
                                        while($row = $q->fetch()){
                                            $designation = $row['designation'];
                                        }

                                        $mailler = new mailsenderclass();

                                        $subject = "Transfert d'equipement";
                                        $body = "Le materiel <b>"
                                            .$designation."</b> a ete transfere du magasin de <b>defectueux</b> pour la salle <b>"
                                            .$nom_s."</b> le "
                                            .date("d/m/Y")
                                            ." à "
                                            .date("G:i")
                                            ." par "
                                            .strtoupper($nom_user)
                                            ."<br/>
                                                         <a href='campresjonlline.net'>Voir les details</a>";

                                        $from= 'supergoal@campresjonlline.net';
                                        $from_name='CAMPREJ EQUIEPEMENT';
                                        $sql = $db->query("select * from users where (lvl = 3 or lvl = 2 or lvl = 8 or lvl = 6)");
                                        while($row = $sql->fetch()){
                                            $to = $row['email'];
                                            $mailler->mailsenderclass($to, $from, $from_name, $subject, $body);
                                        }
                                        
                                      ?>
                                        <script>
                                            alert('Equipement  a été bien transférer en salle.');
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
