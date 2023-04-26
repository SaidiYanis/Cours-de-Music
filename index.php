<?php
// Inclure les fichiers de configuration et les fonctions
require_once 'config.php';
require_once 'database.php';
require_once 'functions.php';

// Démarrez une session pour gérer les données utilisateur
session_start();

// Récupérez l'action de l'utilisateur à partir de la requête (par défaut, affichez la page d'accueil)
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Traitez l'action de l'utilisateur et incluez le fichier de template correspondant
switch ($action) {
    case 'index':
        require 'templates/index.html';
        break;
    case 'register':
        require 'templates/register.php';
        break;
    case 'login':
        require 'templates/login.php';
        break;
    case 'logout':
        require 'templates/logout.php';
        break;
    case 'profil':
        require 'templates/profil.php';
        break;
    case 'cours':
        require 'templates/cours.php';
        break;
    case 'prof':
        require 'templates/prof.php';
        break;
    case 'meetings':
        require 'templates/meetings.html';
        break;
    case 'meetings-details':
        require 'templates/meetings-details.html';
        break;
    case 'reservation':
        require 'templates/reservation.php';
        break;
    default:
        // Si l'action n'est pas reconnue, redirigez vers la page d'accueil
        header('Location: index.php?action=index');
        exit();
}