<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimer Facture</title>
</head>
<body>
    <!-- Formulaire invisible pour soumettre l'ID de la facture -->
    <form id="printForm" action="print_facture.php" method="get" style="display: none;">
        <input type="text" name="factureId" id="factureId">
    </form>

    <!-- JavaScript pour remplir l'ID de la facture et soumettre le formulaire automatiquement -->
    <script>
        // Récupérer l'ID de la facture depuis l'URL
        var factureId = "<?php echo $_GET['factureId']; ?>";

        // Remplir l'ID de la facture dans le formulaire
        document.getElementById('factureId').value = factureId;

        // Soumettre automatiquement le formulaire
        document.getElementById('printForm').submit();
    </script>
</body>
</html>
