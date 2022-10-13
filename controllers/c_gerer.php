<?php
switch ($action) {
    case 'accueil':
    {
        // $message="Ce site permet d'enregistrer les participants à une épreuve.";
        // include("views/v_accueil.php");

        if(isset($_SESSION['login'])) {
            $message = "Connecter";
           header("views/v_listemembres.php");
        }
        else {
            include("views/v_connexion.php");
        }

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
            
            break;
        }

    case 'modifier':
        {
            if (!empty($_REQUEST['id'])) {
                $id = ($_REQUEST['id']);
            }
            
            
            if (!empty($_REQUEST['nom'])) {
                $nom = ($_REQUEST['nom']);
            }
            if (!empty($_REQUEST['prenom'])) {
                $prenom = ($_REQUEST['prenom']);
            }
            
            if (empty($nom) || empty($prenom)) {
                include("views/v_modifierMembre.php");
            } else {
                $resultat = $pdo->modifier($id, $nom, $prenom);
                $message="Participant modifié";
                include("views/v_accueil.php");
            }
            break;
        }
    
    
        case 'demandeConnexion':
            {
                include("views/v_connexion.php");
                break;
            }
            case 'valideConnexion':
            {
                $login = $_REQUEST['login'];
                $mdp = $_REQUEST['mdp'];
                $visiteur = $pdo->getInfosVisiteur($login, $mdp);
                if (!is_array($visiteur)) {
                    include("views/v_connexion.php");
                } else {
                    $_SESSION ['login'] = $visiteur['login'];
                    $message = "Bienvenu";
                    $les_membres=$pdo->getLesMembres();
                    include("views/v_listemembres.php");
                }
                break;
            }

    default:
    {
        $_SESSION["message_erreur"] = "Site en construction";
        include("views/404.php");
        break;
    }


}
