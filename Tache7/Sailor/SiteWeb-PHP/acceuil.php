<?php
// Votre code de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_authentification";


// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Préparez la requête SQL pour récupérer les informations des tables Facture et Produits
$sql = "SELECT factures.*, produits.*
        FROM factures 
        JOIN produits  ON factures.id = produits.id";

// Exécutez la requête SQL
$result = $conn->query($sql);

// Vérifiez si la requête a renvoyé des résultats
if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    while($row = $result->fetch_assoc()) {
        // Afficher les informations de la facture
        echo "ID de la facture: " . $row["productId"] . "<br>";
        echo "Nom du client: " . $row["nomClient"] . "<br>";
        echo "Date de la facture: " . $row["dateFacture"] . "<br>";
        echo "Quantité: " . $row["quantite"] . "<br>";
        echo "Désignation: " . $row["designation"] . "<br>";
        echo "Prix unitaire: " . $row["prixUnitaire"] . "<br>";
        echo "Prix total: " . $row["prixTotal"] . "<br>";

        // Afficher les informations du produit
        echo "ID du produit: " . $row["productId"] . "<br>";
        echo "Nom du produit: " . $row["nomProduit"] . "<br>";
        echo "Prix du produit: " . $row["prixProduit"] . "<br>";
        echo "Date d'enregistrement: " . $row["date_enregistrement"] . "<br>";

        echo "<hr>";
    }
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
