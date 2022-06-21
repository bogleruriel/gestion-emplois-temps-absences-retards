<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Connexion Projet Ecole</title>
</head>
<body>
    <div class="container ">
        <div class="row">
            <div class="col ofsset-3">
                <div class="row">
                    <div class="col col-6 offset-md-3 py-5">
                    <div class="card card-primary">
              <div class="card-header">
                <div class="row logo">
                  <div class="col text-center">
                    <a href="connexion.html">
                       <img class="logo-connexion" src="../images/logo_carmel.png" alt="logo_carmel">
                    </a>
                    <h2 class="mt-3 mb-3 text-center">Se connecter</h2>
                  </div>
                </div>
              </div>
              <form id="quickForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Adresse mail</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Entrer votre mail">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mot de passe</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Entrer votre mot de passe">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">J'accepte les <a href="#">conditions d'utilisation</a>.</label>
                    </div>
                    <div class="row mb-3">
                                <div class="col">
                                    <a class="inscription" href="créer_un_compte.html">Inscription</a>
                                </div>
        
                                <div class="col alignement">
                                    <a class="mot-de-passe-oublié" href="mot_de_passe_oublié.html">Mot de passe oublié</a>
                                </div>
        
                            </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Se connecter</button>
                </div>
              </form>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>