<?php
// traitement_modification.php

// Inclure le code de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_authentification";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $productId = $_POST['productId'];
    $nomProduit = $_POST['nomProduit'];
    $prixProduit = $_POST['prixProduit'];
    $nombreElement = $_POST['nombreElement'];
    $message1 = $_POST['message1'];
    $categorie = $_POST['categorie'];

    // Préparer la requête SQL de mise à jour
    $sql = "UPDATE produits SET nomProduit = '$nomProduit', prixProduit = '$prixProduit', nombreElement = '$nombreElement', message1 = '$message1', categorie = '$categorie' WHERE id = $productId";

    // Exécuter la requête
    if ($conn->query($sql) === TRUE) {
        // Ajouter un message de succès
        session_start();
        $_SESSION['success_message'] = "La modification a été effectuée avec succès.";

        // Rediriger vers la page d'affichage du stock
        header("Location: affichage_stock.php");
    } else {
        echo "Erreur lors de la modification : " . $conn->error;
    }
}

// Fermer la connexion à la base de données à la fin du fichier
$conn->close();
?>
