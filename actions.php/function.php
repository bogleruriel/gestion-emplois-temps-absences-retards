
<?php


/**
 * Cette fonction permet de se connecter a une base de donnée.
 * Elle retourne l'instance / objet de la base de donnée, si la connexion a la base de donnée est succès.
 * 
 * @return object $db L'instance / objet de la base de donnée.
 */
function connect_db(){

    $db = null;

    try
    {
        $db = new PDO('mysql:host=localhost;dbname=gestion_ecole;charset=utf8;', 'root', '');
    }catch(Exception $e){
        die("'Une erreur a été trouvée.");
    }

    return $db;

}


/**
 * Cette fonction permet de verifier si un utilisateur dans la base de donnée ne possède pas cette adresse mail.
 * @param string $email L'email a vérifié.
 * 
 * @return bool $check
 */
function check_email_exist_in_db($email){

    $check = false;

    $db = connect_db();

    $requette = "SELECT count(*) as nbr_utilisateur FROM utilisateur WHERE e_mail = :e_mail";

    $verifier_email = $db->prepare($requette);

    $resultat = $verifier_email->execute([
        'e_mail' => $email,
    ]);

    if($resultat ){

        $nbr_utilisateur = $verifier_email->fetch(PDO::FETCH_ASSOC)["nbr_utilisateur"];

        $check = ($nbr_utilisateur > 0) ? true : false;

    }

    return $check;

}


/**
 * Cette fonction permet de verifier si un utilisateur dans la base de donnée ne possède pas ce nom d'utilisateur.
 * @param string $nom_utilisateur Le nom d'utilisateur a vérifié.
 * 
 * @return bool $check
 */
function check_user_name_exist_in_db($nom_utilisateur){

    $check = false;

    $db = connect_db();

    $requette = "SELECT count(*) as nbr_utilisateur FROM utilisateur WHERE nom_utilisateur = :nom_utilisateur";

    $verifier_nom_utilisateur = $db->prepare($requette);

    $resultat = $verifier_nom_utilisateur->execute([
        'nom_utilisateur' => $nom_utilisateur,
    ]);

    if($resultat ){

        $nbr_utilisateur = $verifier_nom_utilisateur->fetch(PDO::FETCH_ASSOC)["nbr_utilisateur"];

        $check = ($nbr_utilisateur > 0) ? true : false;
        
    }

    return $check;

}