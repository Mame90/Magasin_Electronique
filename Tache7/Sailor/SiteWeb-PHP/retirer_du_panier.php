<?php
// retirer_du_panier.php

// Démarrez la session
session_start();

// Vérifiez si le produit ID est passé en GET
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Retirez le produit du panier
    if (isset($_SESSION['panier'][$productId])) {
        unset($_SESSION['panier'][$productId]);
    }
}

header('Location: panier.php');
exit();
?>
