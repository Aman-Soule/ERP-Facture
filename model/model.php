<?php

class Database
{
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $password;
    private $pdo;

    public function __construct()
    {
        // Détection automatique de l'environnement
        $isRender = isset($_SERVER['RENDER']) || getenv('RENDER');

        if ($isRender) {
            // CONFIGURATION RENDER (PostgreSQL)
            $this->host = getenv('DB_HOST') ?: 'dpg-d4o0ginpm1nc73fng7dg-a';
            $this->port = getenv('DB_PORT') ?: '5432';
            $this->dbname = getenv('DB_NAME') ?: 'gestion_yyrb';
            $this->user = getenv('DB_USER') ?: 'aman';
            $this->password = getenv('DB_PASSWORD') ?: 'y6D8Iou46JBEg30QqRfsALPVd6z8k8Lq';
        } else {
            // CONFIGURATION LOCALE (PostgreSQL local)
            $this->host = "localhost";
            $this->port = "5432";
            $this->dbname = "crud_ajax";
            $this->user = "postgres";
            $this->password = "tarte07?";
        }

        try {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname}";
            $this->pdo = new PDO($dsn, $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

            // Charset UTF-8
            $this->pdo->exec("SET NAMES 'UTF8'");

        } catch (PDOException $e) {
            // Meilleure gestion des erreurs
            error_log("Erreur DB: " . $e->getMessage());

            if ($isRender) {
                die("Erreur de connexion à la base de données Render");
            } else {
                die("Erreur de connexion locale : " . $e->getMessage());
            }
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}

// Classe Employe (adaptée)
class Employe {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function getAllEmployes() {
        try {
            $sql = "SELECT e.id_employe, e.nom, e.prenom, r.nom_role
                    FROM employe e
                    JOIN role r ON e.id_role = r.id_role
                    ORDER BY e.id_employe DESC";

            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erreur getAllEmployes: " . $e->getMessage());
            return [];
        }
    }
}

// Classe Facture (adaptée)
class Facture {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function getAllFactures() {
        try {
            $sql = "SELECT id, customer, cashier, amount, received, returned, 
                           date_facture, status 
                    FROM factures 
                    ORDER BY id DESC";

            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Erreur getAllFactures: " . $e->getMessage());
            return [];
        }
    }

    public function countBills() {
        try {
            $stmt = $this->pdo->query("SELECT COUNT(*) FROM factures");
            return (int) $stmt->fetchColumn();
        } catch (PDOException $e) {
            error_log("Erreur countBills: " . $e->getMessage());
            return 0;
        }
    }

    public function read() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM factures");
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            error_log("Erreur read factures: " . $e->getMessage());
            return [];
        }
    }

    public function createFacture($customer, $cashier, $amount, $received, $returned, $status) {
        try {
            $sql = "INSERT INTO factures (customer, cashier, amount, received, returned, status) 
                    VALUES (:customer, :cashier, :amount, :received, :returned, :status)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':customer', $customer);
            $stmt->bindParam(':cashier', $cashier);
            $stmt->bindParam(':amount', $amount);
            $stmt->bindParam(':received', $received);
            $stmt->bindParam(':returned', $returned);
            $stmt->bindParam(':status', $status);

            return $stmt->execute();

        } catch (PDOException $e) {
            error_log("Erreur createFacture: " . $e->getMessage());
            return false;
        }
    }

    public function deleteFacture($id) {
        try {
            $sql = "DELETE FROM factures WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            return $stmt->execute();

        } catch (PDOException $e) {
            error_log("Erreur deleteFacture: " . $e->getMessage());
            return false;
        }
    }
}
?>