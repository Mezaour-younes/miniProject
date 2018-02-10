<?php
//Ajouter une nouvelle tache
if (isset($_POST['nomTacheName'])) {
    $resultat = array(
        "nomTache" => $_POST['nomTacheName'],
        "descTache" => $_POST['descTacheName'],
        "etat" => "false"
    );
    $resu = file_get_contents('stockages.json');
    $data = json_decode($resu, true);
    array_push($data, $resultat);
    $a = json_encode($data);
    file_put_contents('stockages.json', $a);

}
//suprimer une tache
if (isset($_GET['nom'])) {
    $resultat = array(
        "nomTache" => $_GET['nom'],
        "descTache" => $_GET['des'],
        "etat" => $_GET['etat']
    );

    $resu = file_get_contents('stockages.json');
    $data = json_decode($resu, true);

    foreach ($data as $key => $value) {
        if ($value === $resultat) {
            unset($data[$key]);
        }
    }
    $a = json_encode($data);
    file_put_contents('stockages.json', $a);

}

//Changer l'etat d'une tache
if (isset($_GET['nomT'])) {
    $resultat = array(
        "nomTache" => $_GET['nomT'],
        "descTache" => $_GET['descT'],
        "etat" => "false"
    );

    $resu = file_get_contents('stockages.json');
    $data = json_decode($resu, true);
    foreach ($data as $key => $value) {
        if ($value === $resultat) {
            $data[$key] = array(
                "nomTache" => $_GET['nomT'],
                "descTache" => $_GET['descT'],
                "etat" => "true"
            );
        }
    }

    $a = json_encode($data);
    file_put_contents('stockages.json', $a);

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<div style="" class="container-fluid">

    <div class="row">

        <div class="col-sm-5 col-sm-offset-3 ">
            <div id="imaginary_container">
                <div>
                    <img src="img.jpg" class="img-responsive" alt="">
                </div>
                <div style="margin-top: 2%" class="input-group stylish-input-group">
                    <input type="text" id="tacheName" class="form-control" placeholder="Creer une nouvelle tache">
                    <span class="input-group-addon">
                        <a href="#" data-toggle="modal" data-target="#monModal">
                            <button type="submit" id="addBtn">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </a>
                    </span>
                </div>
            </div>

            <div style="margin-top: 2%" class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Affichage
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a href="#">
                            <button class="btn btn-danger" id="tacheFaire">Taches a faire</button>
                        </a></li>
                    <li><a href="#">
                            <button class="btn btn-danger" id="tacheFini">Taches finis</button>
                        </a></li>
                    <li><a href="index.php">
                            <button class="btn btn-danger" id="tacheTT">Toutes les taches</button>
                        </a></li>
                </ul>
            </div>
            <div style="margin-top: 2%">
                <table id="tableTache" class='table'>
                    <div id="see"></div>
                </table>
            </div>
            <div class="modal fade" id="monModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
                            <h5 class="modal-title" id="exampleModalLabel"><i class="glyphicon glyphicon-pushpin"> </i>
                                Nouvelle tache</h5>

                        </div>
                        <div class="modal-body" id="tache">
                            <form action="index.php" method="post">
                                <div class="form-group">

                                    <input type="text" id="nomTachel" name="nomTacheName">

                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="text-muted">Description</label>
                                    <textarea class="form-control" id="message-text" name="descTacheName"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler
                                    </button>
                                    <button type="submit" name="action" id="createTache" class="btn btn-primary">Creer
                                        tache
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>

