<!--¨page de teste pour les calcules d'etat de pointage horaire-->
<?php
include("first.php");


$prime = 0;
$horaire_mensuel = 0;
$sal_horaire = 0;
$month = date("Y-m");
$sanction = 0;
$dette = 0;
$salaire = 0;

$query = "SELECT * FROM personnel";
$q = $db->query($query);
while($row = $q->fetch())
{
    $id_perso = $row['id_personnel'];
    $personnel = $row['nom'].' '.$row['prenom'];
    $prime = $row['prime'];
    $sal_horaire = $row['sal_horaire'];

    $query1 = "SELECT * FROM pointage WHERE id_perso = $id_perso AND date_emission LIKE '%$month%'";
    $q1 = $db->query($query1);
    while($row1 = $q1->fetch())
    {
        $horaire_mensuel += $row1['duree_journee'];
    }

    $query2 = "SELECT * FROM sanction WHERE id_personnel = $id_perso AND date_sanction LIKE '%$month%'";
    $q2 = $db->query($query2);
    while($row2 = $q2->fetch())
    {
        $sanction += $row2['montant'];
    }

    echo 'personnel :'.$personnel.' > '.gettype($personnel).'<br/>';

    echo 'prime :'.$prime.' > '.gettype($prime).'<br/>';
    echo 'sal_horaire :'.$sal_horaire.' > '.gettype($sal_horaire).'<br/>';
    echo 'Horaire mensuel :'.$horaire_mensuel.' > '.gettype($horaire_mensuel).'<br/>';
    echo 'sanction :'.$sanction.' > '.gettype($sanction).'<br/>';

    $salaire = $prime + ($sal_horaire * $horaire_mensuel ) - $sanction;

    echo 'salaire :'.number_format($salaire).'<br/>';

    echo '********************** <br/>';

}


?>
