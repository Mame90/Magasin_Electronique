<?php
// ajouter_au_panier.php

// Démarrez la session
session_start();

// Vérifiez si le produit ID est passé en POST
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Si le panier n'existe pas, créez-le
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    // Ajoutez le produit au panier
    if (!isset($_SESSION['panier'][$productId])) {
        $_SESSION['panier'][$productId] = 1; // Ajoutez le produit avec une quantité initiale de 1
    } else {
        $_SESSION['panier'][$productId]++; // Incrémentez la quantité si le produit est déjà dans le panier
    }

    echo "Produit ajouté au panier";
} else {
    echo "Erreur : aucun produit sélectionné";
}
?>
