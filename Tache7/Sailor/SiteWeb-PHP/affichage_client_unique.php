<?php
// Informations de connexion à la base de données
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

// Préparez la requête SQL pour récupérer les clients ayant acheté seulement un article
$sql = "SELECT f.*, p.*
        FROM factures f
        JOIN produits p ON f.productId = p.productId
        WHERE f.quantite = 1";

// Exécutez la requête SQL
$result = $conn->query($sql);

// Vérifiez si la requête a renvoyé des résultats
if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    while($row = $result->fetch_assoc()) {
        // Afficher les informations de la facture
        echo "ID de la facture: " . $row["id"] . "<br>";
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
//----------------------------------------------

<?php
// Informations de connexion à la base de données
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

// Préparez la requête SQL pour récupérer les clients ayant acheté seulement un article
$sql = "SELECT f.*, p.*
        FROM factures f
        JOIN produits p ON f.productId = p.productId
        WHERE f.quantite = 1";

// Exécutez la requête SQL
$result = $conn->query($sql);

// Vérifiez si la requête a renvoyé des résultats
if ($result->num_rows > 0) {
    // Parcourir les résultats de la requête
    echo "<div id='printArea'>";
    while($row = $result->fetch_assoc()) {
        // Afficher les informations de la facture
        echo "ID de la facture: " . $row["id"] . "<br>";
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
    echo "</div>";
    echo '<button onclick="printDiv()">Imprimer</button>';
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion à la base de données
$conn->close();
?>
<script>
function printDiv() {
    var printContents = document.getElementById('printArea').innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}
</script>
