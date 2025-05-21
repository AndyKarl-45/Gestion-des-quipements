<?php

//$r = [
//    'title' => 'DRH',
//    'icon' => 'fas fa-cubes',
//    'name'=>'Espace Projets',
//    'link' => 'projets.php',
//                ];
//
//$nouveau_projet = [
//    'name'=>'Nouveau Projet',
//    'link' => 'ajouter_projet.php',
//];
//
//$groupement = [
//    'name'=>'Liste des Groupements',
//    'link' => 'liste_groupements.php',
//];
//
//$nouveau_groupement = [
//    'name'=>'Nouveau Groupement',
//    'link' => 'ajouter_groupement.php',
//];
//
//
//$contrat = [
//    'title' => 'Contrat',
//    'icon' => 'far fa-file-alt',
//    'name'=>'Liste des Contrats',
//    'link' => 'liste_contrats.php',
//];
//
//$nouveau_contrat = [
//    'name'=>'Nouveau Contrat',
//    'link' => 'ajouter_contrat.php',
//];
//
//$entite = [
//    'title' => 'Entités',
//    'icon' => 'fas fa-building',
//    'name'=>'Liste des Entités',
//    'link' => 'liste_entites.php',
//];
//
//$nouveau_entite = [
//    'name'=>'Nouvelle Entité',
//    'link' => 'ajouter_entite.php',
//];
//
//$contact = [
//    'name'=>'Liste des Contacts',
//    'link' => 'liste_contacts.php',
//];
//
//$personnel = [
//    'title' => 'Personnel Interne',
//    'icon' => 'fas fa-users',
//    'name'=>'Liste du Personnel',
//    'link' => 'liste_personnels.php',
//];
//
//$nouveau_personnel = [
//    'name'=>'Nouveau Personnel',
//    'link' => 'ajouter_personnel.php',
//];
//
//$courrier = [
//    'title' => 'Courrier',
//    'icon' => 'fas fa-envelope',
//    'name'=>'Service des Courriers',
//    'link' => 'courrier.php',
//];
//
//$agenda = [
//    'title' => 'Agenda',
//    'icon' => 'fas fa-book',
//    'name'=>'Service Agenda',
//    'link' => 'agenda.php',
//];
//

$magasin = [
    'title' => 'Magasins',
    'icon' => 'fas fa-cubes',

    //  'option2_name'=>'Clients',
    // 'option2_link'=>'liste_client',
];
$magasin_centrale = [
    'title' => 'Mag Centrale',
    'icon' => 'fas fa-cubes',

    'option1_name'=>'Equipements ',
    'option1_link'=>'liste_materiaux.php',

    'option2_name'=>'Mouvement d\'entrée ',
    'option2_link'=>'liste_mag_centrale_input.php',

    'option3_name'=>'Mouvement de sortie',
    'option3_link'=>'liste_mag_centrale_output.php',

    'option4_name'=>'Transfert',
    'option4_link'=>'liste_transfert_mag.php',
];

$materiaux = [
    'title' => 'Equipements',
    'icon' => 'fas fa-cubes',

    // 'option1_name'=>'Nouvelle',
    'option1_link'=>'nouveau_materiaux.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_materiaux.php',
];

$magasin_save = [
    'title' => 'Mag Enregistrement',
    'icon' => 'fas fa-cubes',

    'option1_name'=>'Equipements',
    'option1_link'=>'liste_materiaux_save.php',

    'option2_name'=>'Mouvement d\'entrée ',
    'option2_link'=>'liste_mag_save_input.php',

    'option3_name'=>'Mouvement de sortie',
    'option3_link'=>'liste_mag_save_output.php',

    'option4_name'=>'Transfert',
    'option4_link'=>'liste_transfert_mag_save.php',
];

$magasin_congo = [
    'title' => 'Mag congo',
    'icon' => 'fas fa-cubes',

    'option1_name'=>'Equipements',
    'option1_link'=>'liste_materiaux_congo.php',

    'option2_name'=>'Mouvement d\'entrée ',
    'option2_link'=>'liste_mag_congo_input.php',

    'option3_name'=>'Mouvement de sortie',
    'option3_link'=>'liste_mag_congo_output.php',

    'option4_name'=>'Transfert',
    'option4_link'=>'liste_transfert_mag_congo.php',
];


$chantier = [
    'title' => 'Chantiers',
    'icon' => 'fas fa-building',

    // 'option1_name'=>'Nouvelle',
    'option1_link'=>'nouveau_chantier.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_chantier.php',
];

$etape = [
    'title' => 'Etapes',
    'icon' => 'fas fa-book',

    // 'option1_name'=>'Nouvelle',
    'option1_link'=>'nouvelle_etape.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_etape.php',
];


$intervention = [
    'title' => 'Interventions',
    'icon' => 'fas fa-file-alt',

    // 'option1_name'=>'Nouvelle',
    'option1_link'=>'nouvelle_intervention.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_intervention.php',
];

$demande_eq = [
    'title' => 'Demande équipement',
    'icon' => 'fas fa-envelope',

    // 'option1_name'=>'Nouvelle',
    //'option1_link'=>'nouvelle_demande.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_demande_eq.php',
];
$demande_in = [
    'title' => 'Demande intervention',
    'icon' => 'fas fa-envelope',

    // 'option1_name'=>'Nouvelle',
    //'option1_link'=>'nouvelle_demande.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_demande_in.php',
];

$magasin_main = [
    'title' => 'Mag. maintenance',
    'icon' => 'fas fa-cubes',

    'option1_name'=>'Equipements',
    'option1_link'=>'liste_mag_main.php',

    'option2_name'=>'Mouvement d\'entrée ',
    'option2_link'=>'liste_mag_main_input.php',

    'option3_name'=>'Mouvement de sortie',
    'option3_link'=>'liste_mag_main_output.php',

    'option4_name'=>'Transfert',
    'option4_link'=>'liste_transfert_mag_main.php',
];
$magasin_def = [
    'title' => 'Mag. défectueux',
    'icon' => 'fas fa-cubes',

    // 'option1_name'=>'Nouvelle',
    // 'option1_link'=>'nouvelle_demande.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_mag_def.php',
];
$fournisseur = [
    'title' => 'Fournisseurs',
    'icon' => 'fas fa-user',

    // 'option1_name'=>'Nouveau',
    'option1_link'=>'nouveau_fournisseur.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_fournisseur.php',
];

$engin = [
    'title' => 'Engins',
    'icon' => 'fas fa-bus',

    // 'option1_name'=>'Nouvelle',
    'option1_link'=>'nouveau_engin.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_engin.php',
];

$conf = [
    'title' => 'Configuration',
    'icon' => 'fas fa-cogs',

    // 'option1_name'=>'Nouvelle',
    // 'option1_link'=>'nouvelle_sanction',

    // 'option2_name'=>'Liste',
    // 'option2_link'=>'liste_sanction',
];

//Paramètre
$liste = [
    'title' => 'Listes Prédéfinies',
    'icon' => 'fas fa-list-ul',

    'option1_name'=>'Type de client',
    'option1_link'=>'liste_type_client.php',

    'option2_name'=>'Compte bancaire',
    'option2_link'=>'liste_compte_bank.php',


    'option3_name'=>'Etape de chantier',
    'option3_link'=>'liste_etape_chantier.php',


    'option4_name'=>'Profession',
    'option4_link'=>'liste_profession.php',

    'option5_name'=>'Poste',
    'option5_link'=>'liste_poste.php',

    'option6_name'=>'Catégorie de matériaux',
    'option6_link'=>'liste_cat_materiel.php',

    'option7_name'=>'Mode de paiement',
    'option7_link'=>'liste_mode_paiement.php',

    'option8_name'=>'Catégorie d\'engins',
    'option8_link'=>'liste_cat_engin.php',

    'option9_name'=>'Marque des engins',
    'option9_link'=>'liste_marque_engin.php',

    'option10_name'=>'Pays',
    'option10_link'=>'liste_pays.php',

    'option11_name'=>'Ville',
    'option11_link'=>'liste_ville.php',

    'option12_name'=>'Quartier',
    'option12_link'=>'liste_quartier.php',

];

$salle = [
    'title' => 'Salles',
    'icon' => 'fas fa-home',

    // 'option1_name'=>'Nouvelle',
    'option1_link'=>'nouvelle_salle.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_salle.php',
];



$secteur = [
    'title' => 'Secteurs',
    'icon' => 'fas fa-building',

    'option1_name'=>'Nouveau',
    'option1_link'=>'nouveau_secteur.php',

    'option2_name'=>'Liste',
    'option2_link'=>'liste_secteur.php',
];

$agenda = [
    'title' => 'Agenda',
    'icon' => 'fas fa-book',
    'name'=>'Service Agenda',
    'link' => 'agenda.php',
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
    'option1_link'=>'nouveau_quartier.php',

    // 'option2_name'=>'Liste',
    'option2_link'=>'liste_quartier.php',
];


$utilisateur = [
    'title' => 'Utilisateurs',
    'icon' => 'fas fa-user',

    'option1_name'=>'#',
    'option1_link'=>'liste_utilisateurs.php',


];

// $activite = [
//     'title' => 'MES ACTIVITES',
//     'icon' => 'fas fa-cogs',

//     'option1_name'=>'Mes Pointages',
//     'option1_link'=>'mes_pointages',

//     'option2_name'=>'Mes Congés',
//     'option2_link'=>'mes_conges',

//     'option3_name'=>'Mes Crédits',
//     'option3_link'=>'mes_credits',
// ];

// $credit = [

//     'option1_name'=>'Credit à valider',
//     'option1_link'=>'liste_credit_valide',

//     'option2_name'=>'Liste des crédits',
//     'option2_link'=>'liste_credit',

//     'option3_name'=>'Etats des pointages',
//     'option3_link'=>'etat_pointages',

// ];

// $conger = [

//     'option1_name'=>'Congé à valider',
//     'option1_link'=>'liste_conger_valide',

//     'option2_name'=>'Liste des congés',
//     'option2_link'=>'liste_conger',

// ];

?>