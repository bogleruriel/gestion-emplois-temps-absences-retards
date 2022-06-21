<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Se connecter Projet Ecole</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/AdminLTE-master/plugins/fontawesome-free/css/all.min.css">
    <!-- Icheck Bootstrap -->
    <link rel="stylesheet" href="../public/AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme Style-->
    <link rel="stylesheet" href="../public/AdminLTE-master/dist/css/adminlte.min.css">
</head>
<body class="">
        <div class="row">
            <div class="col ofsset-3">
                <div class="row">
                    <div class="col  offset-md-3">
                    <div class="col-sm-5 col-md-7">
                        <div class="card card-outline card-primary">
                            <div class="card-header text-center">
                                <div class="row logo">
                                    <div class="col text-center">
                                        <a href="connexion.html">
                                            <img class="logo-connexion" src="../images/logo_carmel.png" alt="logo_carmel">
                                        </a>
                                    </div>
                                </div>

                                <!-- Code PHP -->
                                <?php

                                $erreurs = array();

                                $donnees = array();

                                $message = array();

                                if (isset($_GET["erreurs"]) && !empty($_GET["erreurs"])) {
                                    $erreurs = json_decode($_GET["erreurs"], true);
                                }

                                if (isset($_GET["donnees"]) && !empty($_GET["donnees"])) {
                                    $donnees = json_decode($_GET["donnees"], true);
                                }

                                if (isset($_GET["message"]) && !empty($_GET["message"])) {
                                    $message = json_decode($_GET["message"], true);
                                }

                                ?>
                                <div class="card-body">

                                <?php

                                if(isset($message["statut"]) && 0 == $message["statut"]){

                                    ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $message["message"]; ?>
                                        </div>
                                    <?php

                                }else if(isset($message["statut"]) && 1 == $message["statut"]){

                                    ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= $message["message"]; ?>
                                        </div>
                                    <?php
                                    
                                }

                            ?>

                                    <p class="login-box-msg">Enregistrer un utilisateur </p>
                                    <form action="../actions.php/inscriptionAction.php" method="post" novalidate>
                                        <div class="col-sm-12 mb-3"><label for="inscription-nom">Nom:<span class="text-danger">(*)</span></label>
                                            <div class="input-group">
                                                <input type="text" name="nom" id="inscription-nom" class="form-control" placeholder="Veuillez entrer votre nom" value="" required="">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fas fa-user"></span></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">

                                            <?php

                                            if (isset($erreurs["nom"]) && !empty($erreurs["nom"])) {
                                                echo $erreurs["nom"];
                                            }

                                            ?>

                                            </span>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label for="inscription-prenom"> Prénom:<span class="text-danger">(*)</span></label>
                                            <div class="input-group">
                                                <input type="text" name="prenom" id="inscription-prenom" class="form-control" placeholder="Veuillez entrer votre prénom"
                                                 value="<?= (isset($donnees["nom"]) && !empty($donnees["nom"])) ? $donnees["nom"] : ""; ?>" required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fas fa-user"></span></div>
                                                </div>
                                            </div>
                                            <span class="text-danger">
                 
                                            <?php

                                            if (isset($erreurs["prenom"]) && !empty($erreurs["prenom"])) {
                                                echo $erreurs["prenom"];
                                            }

                                            ?>
                                            </span>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label for="inscription-sexe">Sexe:<span class="text-danger">(*)</span></label>
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" name="sexe" checked="" id="sexe-m" value="M"><label for="sexe-m">M</label>
                                                </div>
                                                <div class="icheck-primary d-inline">
                                                    <input type="radio" name="sexe" checked="" id="sexe-f" value="F">
                                                    <label for="sexe-f">F</label>
                                                </div>
                                            </div>
                                            <span class="text-danger">
                                            <?php

                                            if (isset($erreurs["sexe"]) && !empty($erreurs["sexe"])) {
                                                echo $erreurs["sexe"];
                                            }

?>
                                            </span>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label for="inscription-date-naissance">Date de naissance:<span class="text-danger">(*)</span></label>
                                            <div class="input-group mb-3">
                                                <input type="date" name="date-naissance" id="inscription-date-naissance" class="form-control"
                                                 placeholder="Veuillez entrer votre date de naissance"
                                                 value="<?= (isset($donnees["date-naissance"]) && !empty($donnees["date-naissance"])) ? $donnees["date-naissance"] : ""; ?>"
                                                 required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="text-danger">
                                            <?php

                                            if (isset($erreurs["date-naissance"]) && !empty($erreurs["date-naissance"])) {
                                                echo $erreurs["date-naissance"];
                                            }

                                            ?>
                                            </span>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label for="inscription-email">Email:<span class="text-danger">(*)</span></label>
                                            <div class="input-group mb-3">
                                                <input type="email" name="email" id="inscription-email" class="form-control" placeholder="Veuillex entrer votre address email" value="" required="">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="text-danger">
                                            <?php

                                            if (isset($erreurs["email"]) && !empty($erreurs["email"])) {
                                                echo $erreurs["email"];
                                            }

                                            ?>
                                            </span>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label for="inscription-nom-utilisateur">Nom d'utilisateur:<span class="text-danger">(*)</span>                </label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="nom-utilisateur" id="inscription-nom-utilisateur" class="form-control"
                                                 placeholder="Veuillez entrer votre nom d'utilisateur"
                                                 value="<?= (isset($donnees["email"]) && !empty($donnees["email"])) ? $donnees["email"] : ""; ?>"
                                                 required="">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label for="inscription-mot-passe">Mot de passe:<span class="text-danger">(*)</span></label>
                                            <div class="input-group mb-3">
                                                <input type="password" name="mot-passe" id="inscription-mot-passe" class="form-control" placeholder="Veuillez entrer votre mot de passe"
                                                 value="<?= (isset($donnees["mot-passe"]) && !empty($donnees["mot-passe"])) ? $donnees["mot-passe"] : ""; ?>"
                                                 required>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="text-danger">
                                            <?php

                                            if (isset($erreurs["mot-passe"]) && !empty($erreurs["mot-passe"])) {
                                                echo $erreurs["mot-passe"];
                                            }

                                            ?>
                                            </span>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <label for="inscription-retapez-mot-passe">Confirmer mot de passe<span class="text-danger">(*)</span></label>
                                            <div class="input-group mb-3">
                                                <input type="password" name="retapez-mot-passe" id="inscription-retapez-mot-passe" class="form-control" placeholder="Veuillez confirmer votre mot de passe"
                                                 value="<?= (isset($donnees["retapez-mot-passe"]) && !empty($donnees["retapez-mot-passe"])) ? $donnees["retapez-mot-passe"] : ""; ?>"
                                                 required=>
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-lock"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">

                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                                            </div>
                                        </div>

                                    </form>
                                    <a href="connexion.php" class="text-center mt-3">J'ai deja un compte!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>