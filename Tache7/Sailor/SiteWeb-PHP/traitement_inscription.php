<?php
// Connexion à la base de données avec PDO
try {
    $serveur = "localhost";
    $utilisateur = "root";
    $motdepasse = "";
    $base_de_donnees = "bd_authentification";
    
    $connexion = new PDO("mysql:host=$serveur;dbname=$base_de_donnees", $utilisateur, $motdepasse);
    
    // Gestion des exceptions PDO
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion à la base de données : " . $e->getMessage());
}

// Traitement de l'inscription
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["inscription"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $login = $_POST["login"];
    $motdepasse = $_POST["motdepasse"];
    $confirmpassword = $_POST["confirmpassword"];

    // Vérification des mots de passe
    if ($motdepasse !== $confirmpassword) {
        // die("Les mots de passe ne correspondent pas.");
        header('Location: inscription1.html?message=Bienvenue '. $resultat["nom"]);
    }

    // Hachage du mot de passe (utilisez une méthode de hachage sécurisée en production)
    $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

    // Insertion des données dans la table "Utilisateurs"
    $sql = "INSERT INTO utilisateurs (nom, prenom, login, motdepasse) VALUES (?, ?, ?, ?)";
    $requete = $connexion->prepare($sql);

    if ($requete) {
        try {
            $requete->execute([$nom, $prenom, $login, $motdepasse_hache]);
            header('Location: blog.html?message=Bienvenue '. $resultat["nom"]);
            
        } catch (PDOException $e) {
            echo "Erreur lors de l'inscription : " . $e->getMessage();
        }
    } else {
        echo "Erreur de préparation de la requête : ";
    }
}

// Traitement de la connexion
// ...

// Traitement de la connexion
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["connexion"])) {
    $login = $_POST["login"];
    $motdepasse = $_POST["motdepasse"];

    // Recherche de l'utilisateur dans la table "Utilisateurs"
    $sql = "SELECT id, login, motdepasse, nom FROM utilisateurs WHERE login = ?";
    $requete = $connexion->prepare($sql);

    if ($requete) {
        try {
            $requete->execute([$login]);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);

            if ($resultat) {
                if (password_verify($motdepasse, $resultat["motdepasse"])) {
                    // Authentification réussie, redirection vers acceuil.php
                    header('Location: auth_reussi.html?message=Bienvenue '. $resultat["nom"]);
                    
                    exit();
                } else {
                    // Mot de passe incorrect
                     
                    header('Location: redirection_auth.html?message=Mot de passe incorrect');
                    echo "Les identifiants ne sont pas corrects.";
                }
            } else {
                // Login incorrect
                // echo "Les identifiants ne sont pas corrects.";
                header('Location: redirection_auth.html?message=Mot de passe incorrect');
                echo "Les identifiants ne sont pas corrects.";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la préparation de la requête : " . $e->getMessage();
        }
    } else {
        echo "Erreur de préparation de la requête.";
    }
}

// ...

// Fermeture de la connexion à la base de données
$connexion = null;
?>
