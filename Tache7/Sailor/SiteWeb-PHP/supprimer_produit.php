<?php
// supprimer_produit.php

// Inclure le code de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_authentification";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Vérifier si l'identifiant du produit est spécifié dans l'URL
if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Supprimer les factures associées à la vente
$conn->query("DELETE FROM factures WHERE venteId IN (SELECT id FROM ventes WHERE productId = $productId)");

// Supprimer les ventes associées au produit
$conn->query("DELETE FROM ventes WHERE productId = $productId");

// Supprimer le produit
$conn->query("DELETE FROM produits WHERE id = $productId");

    // Rediriger vers la page d'affichage du stock avec un message de succès
    $_SESSION['success_message'] = "Le produit a été supprimé avec succès.";
    header("Location: affichage_stock.php");
} else {
    echo "<p>Identifiant du produit non spécifié.</p>";
}

// Fermer la connexion à la base de données à la fin du fichier
$conn->close();
?>
