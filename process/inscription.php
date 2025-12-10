<?php
session_start();
require_once("../config/database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $etablissement = $_POST['etablissement'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $idrolef = $_POST['idrolef'] ?? 2;
    $terms = isset($_POST['terms']) ? true : false;

    // Validation des champs obligatoires
    if (empty($nom) || empty($email) || empty($password) || empty($confirm_password)) {
        header('Location: ../page/inscription.php?error=Tous les champs obligatoires doivent être remplis');
        exit();
    }

    // Vérification de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../page/inscription.php?error=Adresse email invalide');
        exit();
    }

    // Vérification des mots de passe
    if ($password !== $confirm_password) {
        header('Location: ../page/inscription.php?error=Les mots de passe ne correspondent pas');
        exit();
    }

    // Vérification de la longueur du mot de passe
    if (strlen($password) < 8) {
        header('Location: ../page/inscription.php?error=Le mot de passe doit contenir au moins 8 caractères');
        exit();
    }

    // Vérification des conditions d'utilisation
    if (!$terms) {
        header('Location: ../page/inscription.php?error=Vous devez accepter les conditions d\'utilisation');
        exit();
    }

    try {
        $conn = getConnection();

        // Vérifier si l'email existe déjà
        $checkQuery = "SELECT id FROM utilisateurs WHERE email = :email";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bindParam(':email', $email);
        $checkStmt->execute();

        if ($checkStmt->fetch()) {
            header('Location: ../page/inscription.php?error=Cet email existe deja');
            exit();
        }

        // Hachage du mot de passe
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertion dans la base de données
        $query = "INSERT INTO utilisateurs 
                 (nom, email, tel, adresse, etablissement, password, idrolef, date_creation) 
                 VALUES 
                 (:nom, :email, :tel, :adresse, :etablissement, :password, :idrolef, NOW())";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':adresse', $adresse);
        $stmt->bindParam(':etablissement', $etablissement);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':idrolef', $idrolef);

        if ($stmt->execute()) {
            // Récupérer l'utilisateur nouvellement créé
            $userId = $conn->lastInsertId();

            $query = "SELECT * FROM utilisateurs WHERE id = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Créer la session comme dans login.php
            // Méthode 1 : Toutes les colonnes comme variables séparées
            foreach ($user as $key => $value) {
                $_SESSION[$key] = $value;
            }

            // Méthode 2 : ET stockez aussi dans un tableau user (recommandé)
            $_SESSION['user'] = $user;

            // Stockez aussi les données fréquemment utilisées
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['adresse'] = $user['adresse'];
            $_SESSION['tel'] = $user['tel'];
            $_SESSION['etablissement'] = $user['etablissement'] ?? '';

            // Redirection vers la page d'accueil
            header('Location: ../index.php');
            exit();
        } else {
            header('Location: ../page/inscription.php?error=Erreur lors de la création du compte');
            exit();
        }

    } catch(PDOException $e) {
        // Log de l'erreur pour débogage
        error_log("Erreur inscription: " . $e->getMessage());

        // Message d'erreur générique pour l'utilisateur
        header('Location: ../page/inscription.php?error=Une erreur est survenue lors de l\'inscription');
        exit();
    }
} else {
    // Redirection si l'accès n'est pas via POST
    header('Location: ../page/inscription.php');
    exit();
}
