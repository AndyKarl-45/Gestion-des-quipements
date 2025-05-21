 <?php

try{
    $db = new PDO('mysql:host=localhost;dbname=cp1519775p16_rh;charset=utf8', 'cp1519775p16_root', 'J-}%[#D(.&sW');

}catch(PDOException $e){
    die('Erreur: '.$e->getMessage());
}
?>