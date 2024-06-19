<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Produit</title>

    <!-- Lien vers votre propre fichier CSS ou une bibliothèque comme Bootstrap -->
    <link rel="stylesheet" href="path/to/your/custom.css">

    <!-- Styles personnalisés pour le formulaire -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
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
            display: inline-block;
            margin-right: 10px; /* Ajustez la marge selon vos besoins */
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

<?php
// Le reste du code PHP reste inchangé
?>

<?php
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

    // Récupération des informations sur le produit
    $result = $conn->query("SELECT * FROM produits WHERE id = $productId");

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        ?>
        <h2>Modifier le Produit</h2>
        <form action='traitement_modification.php' method='post'>
            <input type='hidden' name='productId' value='<?= $product["id"] ?>'>
            <label for='nomProduit'>Nom du Produit :</label>
            <input type='text' name='nomProduit' value='<?= $product["nomProduit"] ?>' required>

            <label for='prixProduit'>Prix du Produit :</label>
            <input type='number' name='prixProduit' value='<?= $product["prixProduit"] ?>' required>

            <label for='nombreElement'>Quantité disponible en Stock :</label>
            <input type='number' name='nombreElement' value='<?= $product["nombreElement"] ?>' required>

            <label for='message1'>Description du produit :</label>
<textarea name='message1' required><?= htmlspecialchars($product["message1"]) ?></textarea>

            <label for='categorie'>Catégorie de produit :</label>
            <select name='categorie'>
    <option value='Portable' <?= $product["categorie"] === 'Portable' ? 'selected' : '' ?>>Portable</option>
    <option value='Ventilateur' <?= $product["categorie"] === 'Ventilateur' ? 'selected' : '' ?>>Ventilateur</option>
    <option value='Chargeur' <?= $product["categorie"] === 'Chargeur' ? 'selected' : '' ?>>Chargeur</option>
    <option value='Ecouteur' <?= $product["categorie"] === 'Ecouteur' ? 'selected' : '' ?>>Ecouteur</option>
    <option value='Tablette' <?= $product["categorie"] === 'Tablette' ? 'selected' : '' ?>>Tablette</option>
    <option value='Ordinateur' <?= $product["categorie"] === 'Ordinateur' ? 'selected' : '' ?>>Ordinateur</option>
    <option value='Ecouteur Bluetooth' <?= $product["categorie"] === 'Ecouteur Bluetooth' ? 'selected' : '' ?>>Ecouteur Bluetooth</option>
    <option value='Protége' <?= $product["categorie"] === 'Protége' ? 'selected' : '' ?>>Protége</option>
    <option value='Ralonge' <?= $product["categorie"] === 'Ralonge' ? 'selected' : '' ?>>Ralonge</option>
    <option value='Télécommande' <?= $product["categorie"] === 'Télécommande' ? 'selected' : '' ?>>Télécommande</option>
    <option value='Carte Mémoire' <?= $product["categorie"] === 'Carte Mémoire' ? 'selected' : '' ?>>Carte Mémoire</option>
    <option value='Projecteurs' <?= $product["categorie"] === 'Projecteurs' ? 'selected' : '' ?>>Projecteurs</option>
    <option value='Cles USB' <?= $product["categorie"] === 'Cles USB' ? 'selected' : '' ?>>Cles USB</option>
    <option value='Cable' <?= $product["categorie"] === 'Cable' ? 'selected' : '' ?>>Cable</option>
    <option value='Batterie' <?= $product["categorie"] === 'Batterie' ? 'selected' : '' ?>>Batterie</option>
    <option value='Materiels-Electroniques' <?= $product["categorie"] === 'Materiels-Electroniques' ? 'selected' : '' ?>>Materiels-Electroniques</option>
</select>


            <!-- Ajoutez d'autres champs pour les modifications nécessaires -->

            <button type='submit'>Enregistrer les modifications</button>
            
        </form>
        
        <a href='affichage_stock.php' style="display: inline-block; padding: 10px 15px;margin-left:10px; background-color: red; color: white; text-decoration: none; border-radius: 5px;">Retour</a>

    <?php
    } else {
        echo "<p>Produit non trouvé.</p>";
    }
} else {
    echo "<p>Identifiant du produit non spécifié.</p>";
}

// Fermer la connexion à la base de données à la fin du fichier
$conn->close();
?>
</body>

</html>
