<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Édition de Facture</title>

    <!-- Styles -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            padding: 100px 20px 20px;
        }
        .container {
            max-width: auto;
            margin: 0 auto;
        }
        .form-section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
        }
        button:hover {
            background-color: #45a049;
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
                <li><a href="logout.php" class="getstarted bg-danger">Déconnexion</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>

<div class="container">
    <div class="form-section">
        <?php
        if (isset($_GET['factureId'])) {
            $factureId = $_GET['factureId'];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bd_authentification";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Échec de la connexion à la base de données : " . $conn->connect_error);
            }

            $result = $conn->query("SELECT * FROM factures WHERE id = $factureId");
            if ($result->num_rows > 0) {
                $facture = $result->fetch_assoc();
                ?>
                <h2>Édition de Facture</h2>
                <form action="update_facture.php" method="post">
                    <input type="hidden" name="factureId" value="<?= $factureId ?>">
                    <label for="nomClient">Nom du Client :</label>
                    <input type="text" name="nomClient" value="<?= $facture['nomClient'] ?>" required>
                    <label for="designation">Désignation :</label>
                    <textarea name="designation" id="designation" cols="30" rows="5" required><?= $facture['designation'] ?></textarea>
                    <button type="submit">Enregistrer</button>
                </form>
                <?php
            } else {
                echo "<p>Facture non trouvée.</p>";
            }
            $conn->close();
        } else {
            echo "<p>Identifiant de la facture non spécifié.</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
