<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_authentification";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Debugging: afficher le contenu de $_POST
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    
    if (isset($_POST['productId'], $_POST['quantity'])) {
        $productId = $_POST['productId'];
        $quantityToWithdraw = $_POST['quantity'];
        

        // Récupération des informations sur le produit
        $result = $conn->query("SELECT produits.nomProduit, produits.categorie, produits.prixProduit, produits.nombreElement
                                FROM produits 
                                WHERE produits.id = $productId");

        if ($result && $result->num_rows > 0) {
            $product = $result->fetch_assoc();

            // Vérifiez si la quantité à retirer est valide
            if ($quantityToWithdraw > 0 && $quantityToWithdraw <= $product['nombreElement']) {
                // Mettez à jour la quantité en stock
                $newQuantity = $product['nombreElement'] - $quantityToWithdraw;
                if ($conn->query("UPDATE produits SET nombreElement = $newQuantity WHERE id = $productId")) {
                    // Enregistrez la transaction de vente
                    $montantTotal = $quantityToWithdraw * $product['prixProduit'];
                    if ($conn->query("INSERT INTO ventes (productId, nombreElement, MontantTotal, date, nomProduit, categorie, nomClient)
                                      VALUES ($productId, $quantityToWithdraw, $montantTotal, NOW(), '{$product['nomProduit']}', '{$product['categorie']}', '$nomClient')")) {
                        // Récupérez l'ID de la vente nouvellement insérée
                        $venteId = $conn->insert_id;

                        // Enregistrez la facturation
                        if ($conn->query("INSERT INTO factures (productId, quantite, prixUnitaire, prixTotal, dateFacture, nomClient)
                                          VALUES ($productId, $quantityToWithdraw, {$product['prixProduit']}, $montantTotal, NOW(), '$nomClient')")) {
                            // Récupérez l'ID de la facture nouvellement insérée
                            $factureId = $conn->insert_id;
                            echo "Retrait réussi !";
                            header("Location: edit_facture.php?factureId=$factureId&productId=$productId");
                            exit();
                        } else {
                            echo "Erreur lors de l'enregistrement de la facture : " . $conn->error;
                        }
                    } else {
                        echo "Erreur lors de l'enregistrement de la vente : " . $conn->error;
                    }
                } else {
                    echo "Erreur lors de la mise à jour de la quantité : " . $conn->error;
                }
            } else {
                header("Location: stockVide.php");
                exit();
            }
        } else {
            echo "Produit non trouvé.";
        }
    } else {
        echo "Les données du formulaire ne sont pas complètes.";
    }
} else {
    echo "Méthode de requête invalide.";
}

// Fermeture de la connexion à la base de données (à inclure à la fin de votre page)
$conn->close();
?>
