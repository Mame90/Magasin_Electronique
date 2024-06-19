<?php
// Inclure la bibliothèque TCPDF
require_once('tcpdf/tcpdf.php');

// Vérifiez si un identifiant de facture est passé via GET
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

    // Récupérez les informations de la facture
    $result = $conn->query("SELECT * FROM factures WHERE id = $factureId");

    if ($result->num_rows > 0) {
        $facture = $result->fetch_assoc();

        // Créer un nouvel objet TCPDF
        $pdf = new TCPDF();

        // Ajouter une page
        $pdf->AddPage();

        // Écrire du texte sur la page
        $pdf->Write(10, 'Informations du Client :');
        $pdf->Write(10, "\n");
        $pdf->Write(10, 'Nom du Client : ' . $facture['nomClient']);
        $pdf->Write(10, "\n");
        $pdf->Write(10, 'Désignation : ' . $facture['designation']);

        // Télécharger le fichier PDF
        $pdf->Output('facture.pdf', 'I');

    } else {
        echo "<p>Facture non trouvée.</p>";
    }

    $conn->close();
} else {
    echo "<p>Identifiant de la facture non spécifié.</p>";
}
?>
