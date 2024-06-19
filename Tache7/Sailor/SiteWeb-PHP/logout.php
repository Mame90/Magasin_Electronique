<?php
// Démarrez la session (assurez-vous que vous avez démarré la session où c'est nécessaire)
session_start();

// Ajoutez un message à afficher après la déconnexion
$_SESSION['logout_message'] = "Déconnexion réussie !";

// Détruisez toutes les variables de session
session_unset();

// Détruisez la session
session_destroy();

// Redirigez l'utilisateur vers la page de connexion (ou une autre page de votre choix)
header("Location: index.php");
exit();
?>
