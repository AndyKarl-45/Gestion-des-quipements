<?php

//DRH

$personnel = [
    'title' => 'Personnels',
    'icon' => 'fas fa-user',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouveau_personnel.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_personnel.php',
];

$parrainage = [
    'title' => 'Parrainages',
    'icon' => 'fas fa-users',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouveau_parrainage.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_parrainage.php',
];

//-------------- PARRAIN

$parrain = [
    'title' => 'Parrains',
    'icon' => 'fas fa-users',

    // 'option1_name'=>'Nouveau',
    // 'option1_link'=>'nouveau_parrain_externe',

    // 'option2_name'=>'Liste',
    // 'option2_link'=>'liste_parrain_externe',
];

$parrain_ex = [
    'title' => 'Parrains Externes',
    'icon' => 'fas fa-user',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouveau_parrain_externe.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_parrain_externe.php',
];

$parrain_in = [
    'title' => 'Parrains Internes',
    'icon' => 'fas fa-user',


    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_parrain_interne.php',
];

$formation = [
    'title' => 'Formations',
    'icon' => 'fas fa-book',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouvelle_formation.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_formation.php',
];

$litige = [
    'title' => 'Litiges',
    'icon' => 'fas fa-bars',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouveau_litige.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_litige.php',
];



$salle = [
    'title' => 'Salles',
    'icon' => 'fas fa-home',

    // 'option1_name'=>'Nouvelle',
    'option1_link'=>'nouvelle_salle.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_salle.php',
];

$permission = [
    'title' => 'Permissions',
    'icon' => 'fas fa-file',

    'option1_name'=>'Nouvelle',
    'option1_link'=>'nouvelle_permission.php',

    'option2_name'=>'Liste',
    'option2_link'=>'liste_permission.php',
];

$secteur = [
    'title' => 'Secteurs',
    'icon' => 'fas fa-building',

    'option1_name'=>'Nouveau',
    'option1_link'=>'nouveau_secteur.php',

    'option2_name'=>'Liste',
    'option2_link'=>'liste_secteur.php',
];

$groupe_zone = [
    'title' => 'Groupe / Secteur',
    'icon' => 'fas fa-users',

    'option1_name'=>'Nouvelle',
    'option1_link'=>'nouveau_groupe_zone.php',

    'option2_name'=>'Liste',
    'option2_link'=>'#',
];

$sanction = [
    'title' => 'Sanctions',
    'icon' => 'fas fa-user',

    'option1_name'=>'Nouvelle',
    'option1_link'=>'nouvelle_sanction.php',

    'option2_name'=>'Liste',
    'option2_link'=>'liste_sanction.php',
];


//Paie
$dette = [
    'title' => 'Dettes',
    'icon' => 'fas fa-list-ul',

    'option1_name'=>'Nouvelle',
    'option1_link'=>'#',

    'option2_name'=>'Liste',
    'option2_link'=>'#',
];

$etats_salaire = [
    'title' => 'Etats des Salaires',
    'icon' => 'fas fa-list-ul',

    'option1_name'=>'Nouvelle',
    'option1_link'=>'#',

    'option2_name'=>'Liste',
    'option2_link'=>'#',
];

//Paramètre  
$liste = [
    'title' => 'Listes Prédéfinies',
    'icon' => 'fas fa-list-ul',

    'option1_name'=>'Pays',
    'option1_link'=>'liste_pays.php',

    'option2_name'=>'Profession',
    'option2_link'=>'liste_profession.php',


    'option3_name'=>'Nature dette',
    'option3_link'=>'liste_nature_dette.php',
    

     'option4_name'=>'Nature Sanction',
     'option4_link'=>'liste_nature_sanction.php',

    'option6_name'=>'Grade',
    'option6_link'=>'liste_grade.php',

    'option7_name'=>'Autres',
    'option7_link'=>'autres_configs.php',
];

//------------VILLE

$ville = [
    'title' => 'Villes',
    'icon' => 'fas fa-home',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouvelle_ville.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_ville.php',
];

//------------REGION

$region = [
    'title' => 'Régions',
    'icon' => 'fas fa-maps',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouvelle_region.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_region.php',
];

//--------------QUARTIER
$quartier = [
    'title' => 'Quartiers',
    'icon' => 'fas fa-home',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouveau_quartier',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_quartier.php',
];

$utilisateur = [
    'title' => 'Utilisateurs',
    'icon' => 'fas fa-user',

    'option1_name'=>'#',
    'option1_link'=>'liste_utilisateurs.php',


];

$activite = [
    'title' => 'Mes Activités',
    'icon' => 'bi bi-hammer',

    'option0_name'=>'Leurs Pointages',
    'option0_link'=>'leurs_pointages.php',

    'option1_name'=>'Mes Pointages',
    'option1_link'=>'mes_pointages.php',

    'option2_name'=>'Mes Congés',
    'option2_link'=>'mes_conges.php',

    'option3_name'=>'Mes Crédits',
    'option3_link'=>'mes_credits.php',
];

$credit = [

    'option1_name'=>'Credit à valider',
    'option1_link'=>'liste_credit_valide.php',

    'option2_name'=>'Liste des crédits',
    'option2_link'=>'liste_credit.php',

    'option3_name'=>'Etats des pointages',
    'option3_link'=>'etat_pointages.php',

];

$conger = [

    'option1_name'=>'Congé à valider',
    'option1_link'=>'liste_conger_valide.php',

    'option2_name'=>'Liste des congés',
    'option2_link'=>'liste_conger.php',

];

$comptabilite = [

    'title' => 'Ma Trésorerie',
    'icon' => 'fa fa-calculator',

    'option1_name'=>'Mes Opérations',
    'option1_link'=>'operations_compta_lte.php',

    'option2_name'=>'Mes Transferts',
    'option2_link'=>'transferts.php',

    'option3_name'=>'Etats Tresors',
    'option3_link'=>'etat_tresors.php',

    'option4_name'=>'Demandes d\'argent',
    'option4_link'=>'demandes_transferts.php',

];

?>