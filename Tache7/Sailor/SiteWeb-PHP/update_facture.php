<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $factureId = $_POST['factureId'];
    $nomClient = $_POST['nomClient'];
    $designation = $_POST['designation'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_authentification";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    $sql = "UPDATE factures SET nomClient=?, designation=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nomClient, $designation, $factureId);
    
    if ($stmt->execute()) {
        echo "Facture mise à jour avec succès.";
    } else {
        echo "Erreur : " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
    header('Location: affichage_stock.php');
    exit();
}
?>
