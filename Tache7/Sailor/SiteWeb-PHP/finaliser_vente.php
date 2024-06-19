<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_authentification";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
    $productIds = array_keys($_SESSION['panier']);
    foreach ($productIds as $productId) {
        $quantite = $_SESSION['panier'][$productId];
        $conn->query("INSERT INTO factures (productId, quantite) VALUES ($productId, $quantite)");
        $conn->query("UPDATE produits SET nombreElement = nombreElement - $quantite WHERE id = $productId");
    }
    unset($_SESSION['panier']);
    $_SESSION['success_message'] = "Vente finalisée avec succès !";
} else {
    $_SESSION['success_message'] = "Votre panier est vide.";
}

$conn->close();
header('Location: edit_facture.php');
exit();
?>
