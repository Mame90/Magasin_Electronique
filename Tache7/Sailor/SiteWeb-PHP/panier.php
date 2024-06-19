<?php
// panier.php

// Démarrez la session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Panier</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Poppins" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            margin: 4px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .btn-success {
            background-color: #5cb85c;
            color: #fff;
            border: 1px solid #4cae4c;
        }
        .btn-primary {
            background-color: #337ab7;
            color: #fff;
            border: 1px solid #2e6da4;
        }
        .btn-danger {
            background-color: #d9534f;
            color: #fff;
            border: 1px solid #d43f3a;
        }
    </style>
</head>
<body>
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
        <a href="index.php" class="logo me-auto"><img src="assets/img/bakeli.png" alt="" class="img-fluid"></a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="contact.html" class="getstarted bg-primary">Ajoutez-Produit</a></li>
                <li><a href="affichage_stock.php" class="getstarted bg-primary">Listes-Produit</a></li>
                <li><a href="historique_vente.php" class="getstarted bg-primary">Historique-vente</a></li>
                <li><a href="panier.php" class="getstarted bg-warning">Panier</a></li>
                <li><a href="logout.php" class="getstarted bg-danger">Déconnexion</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<h1>Votre Panier</h1>
<?php
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
    $ids = implode(',', $productIds);
    $result = $conn->query("SELECT * FROM produits WHERE id IN ($ids)");
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Nom du Produit</th><th>Prix du Produit</th><th>Quantité</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $productId = $row["id"];
            echo "<tr>";
            echo "<td>" . $row["nomProduit"] . "</td>";
            echo "<td>" . $row["prixProduit"] . "</td>";
            echo "<td>" . $_SESSION['panier'][$productId] . "</td>";
            echo "<td>";
            echo "<a href='retirer_du_panier.php?id=" . $productId . "' class='btn btn-danger'>Retirer</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<a href='finaliser_vente.php' class='btn btn-success'>Finaliser la Vente</a>";
    } else {
        echo "Votre panier est vide.";
    }
} else {
    echo "Votre panier est vide.";
}
$conn->close();
?>
</body>
</html>
