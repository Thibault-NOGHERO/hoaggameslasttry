<?php
class Db {
    private $host = 'localhost';
    private $db_name = 'hoaggameslasttry';
    private $username = 'root';
    private $password = '';
    private $conn;
    
// connexion en localhost
    public function getConnection() {
        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            throw new Exception('Erreur de connexion à la base de données : '.$exception->getMessage());
        }

        return $this->conn;
    }
    //connexion sur infinityfree
    // public function getConnection() {
    //     try {
    //         $this->conn = new PDO('mysql:host=sql201.epizy.com;dbname=epiz_33988385_mobi', 'epiz_33988385', '6bDY3000NZky');
    //         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     } catch(PDOException $exception) {
    //         throw new Exception('Erreur de connexion à la base de données : '.$exception->getMessage());
    //     }
    
    //     return $this->conn;
    // }
    
    public function getUserById($id) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getFriendRequestsReceived($user_id) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare('SELECT * FROM friends WHERE friend_id = :user_id AND status = "en_attente"');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
