<?php
switch ($action) {
    case 'accueil':
    {
        $message="Ce site permet d'enregistrer les participants à une épreuve.";
        include("views/v_accueil.php");
        break;
    }
    case 'lister': {
        $les_membres=$pdo->getLesMembres();
        require 'views/v_listemembres.php';
        break;
    }
    case 'saisir':
    {
        require "views/v_saisie.php";
        break;
    }
    case 'controlesaisie':
    {
        $nom = $_REQUEST['nom'];
        $prenom = $_REQUEST['prenom'];
        // affecter $prenom

        if (empty($nom) || empty($prenom)) {
            require "views/v_saisie.php";
        } else {
            $resultat = $pdo->insertMembre($nom, $prenom);
            $message="Participant ajouté";
            include("views/v_accueil.php");
        }
        break;
    }
    case 'supprimer':
        {
            if(!empty($_REQUEST)){
                $id = $_REQUEST['id'];
            }
            $resultat = $pdo->deleteMembre($id);
            $message="Participant supprimer";
            include("views/v_accueil.php");
        }
    default:
    {
        $_SESSION["message_erreur"] = "Site en construction";
        include("views/404.php");
        break;
    }


}
