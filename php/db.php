 <?php

try{
    $db = new PDO('mysql:host=localhost;dbname=apfood_equipe_andy;charset=utf8', 'root', '');

}catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}
?>