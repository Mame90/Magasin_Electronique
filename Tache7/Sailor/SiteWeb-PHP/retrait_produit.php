<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Retrait de Produit</title>

    <!-- Styles -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-fv8WchckWyp8JPmIDJ6xI6YTwVMUu5RvsO5SLSlMBo1UqDTUx50Wb70zy9pXW5b/wST5SfcK6Pv6r4Utkzt+Lw==" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Style CSS personnalisé -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 100px;
            padding: 20px;
        }

        .container {
            max-width: auto;
            margin: 0 auto;
        }

        .product-details,
        .withdraw-form {
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

        .product-details p {
            margin: 10px 0;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
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

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.html">Bakeli</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo me-auto"><img src="assets/img/bakeli.png" alt="" class="img-fluid"></a>

      <!-- <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="active">Accueil</a></li>

          <li class="dropdown"><a href="#"><span>A propos</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.html">A propos</a></li>
              <li><a href="team.html">Equipe</a></li>
              <li><a href="testimonials.html">Temoignage</a></li>

              <li class="dropdown"><a href="#"><span>Nos offres </span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Postuler pour un emploi</a></li>
                  <li><a href="#">Autres</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="services.html">Services</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li><a href="inscription.html">Inscription</a></li>
          <li><a href="blog.html">Blog</a></li>

          <li><a href="contact.html">Nous-contactez</a></li>
          <li><a href="index.html" class="getstarted">Lancez-vous</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>.navbar -->

      <nav id="navbar" class="navbar">
        <ul>
          <!-- <li><a href="index.html" class="active">Accueil</a></li> -->

          <!-- <li class="dropdown"><a href="#"><span>A propos</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="./about.html">A propos</a></li>
              <li><a href="./team.html">Equipe</a></li>
              <li><a href="./testimonials.html">Temoignage</a></li>

              <li class="dropdown"><a href="#"><span>Nos offres </span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Postuler pour un emploi</a></li>
                  <li><a href="#">Autres</a></li>
                </ul>
              </li>
            </ul>
          </li> -->
          <!-- <li><a href="services.html">Services</a></li> -->
          <!-- <li><a href="portfolio.html">Portfolio</a></li> -->
          <li><a href="contact.html" class="getstarted bg-primary">Ajoutez-Produit</a></li>
          <li><a href="affichage_stock.php" class="getstarted bg-primary">Listes-Produit</a></li>
          <li><a href="historique_vente.php" class="getstarted bg-primary">Historique-vente</a></li>
          <li><a href="logout.php" class="getstarted bg-danger">Déconnexion</a></li>
          <!-- <li><a href="dblog.html">Blog</a></li> -->
          
          
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    <!-- Section principale du corps de la page -->
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bd_authentification";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Échec de la connexion à la base de données : " . $conn->connect_error);
        }

        if (isset($_GET['id'])) {
            $productId = $_GET['id'];

            // Récupération des informations sur le produit
            $result = $conn->query("SELECT * FROM produits WHERE id = $productId");

            if ($result->num_rows > 0) {
                $product = $result->fetch_assoc();
                ?>
                <div class="product-details">
                    <h2>Détails du produit à Vendre</h2>
                    <p><strong>Nom du Produit :</strong> <?= $product["nomProduit"] ?></p>
                    <p><strong>Prix du Produit :</strong> <?= $product["prixProduit"] ?> .Fcfa</p>
                    <p><strong>Quantité disponible en Stock :</strong> <?= $product["nombreElement"] ?></p>
                    <p><strong>Catégorie de produit :</strong> <?= $product["categorie"] ?></p>
                    <p><strong>Description du produit :</strong> <?= $product["message1"] ?></p>
                </div>

                <!-- Formulaire pour spécifier la quantité à retirer -->
                <div class="withdraw-form">
                    <form action='traitement_retrait.php' method='post'>
                        <input type='hidden' name='productId' value='<?= $product["id"] ?>'>
                        <label for='quantite'>Nombre d'éléments à Vendre :</label>
                        <input type='number' name='quantity' id='quantity'required>
                        <button type='submit'>Vendre</button>
                    </form>
                    <p id='totalAmount'>Montant Total : <?= $product["prixProduit"] * $product["quantity"] ?> Fcfa</p>
                </div>

                <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Récupérez les éléments du DOM nécessaires
        var quantityInput = document.getElementById('quantity');
        var totalAmount = document.getElementById('totalAmount');

        // Ajoutez un écouteur d'événements pour détecter les changements de quantité
        quantityInput.addEventListener('input', function () {
            // Mettez à jour le montant total en temps réel
            var prixProduit = <?= $product["prixProduit"] ?>;
            var quantity = parseInt(quantityInput.value) || 0; // Initialisez à 0 si non défini
            var montantTotal = prixProduit * quantity;

            // Affichez le montant total mis à jour
            totalAmount.textContent = 'Montant Total : ' + montantTotal + ' Fcfa';
        });
    });
</script>

        <?php
            } else {
                echo "<p class='error-message'>Produit non trouvé.</p>";
            }
        } else {
            echo "<p class='error-message'>Identifiant du produit non spécifié.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>
