<?php
 /**
 * Model.php -  Class for accessing database
 * 
 * Class that handles database access.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
class Model {
    //properties
    private $user = "guest";    // Would be set based on login info in real system
    private $db = null;
    ////methods
/**
 * Creates the database access variable using PDO
 *
 */
    public function __construct() {
        try {
          # MySQL with PDO_MYSQL
          //$this->db = new PDO("mysql:host=localhost;dbname=msgBoard;port=3306", DB_USER, DB_PW);
          $this->db = new PDO(DSN, DB_USER, DB_PW);
          $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         
        }catch(PDOException $e) {
         echo $e->getMessage();
        }
    }

/**
 * Issues SQL query to retrieve message $id
 *
 * @param string $id ID of message to retrieve
 */
    public function getMessage($id) {
        $query =' SELECT id, heading, author, body FROM messages  WHERE id="' . $id . '"ORDER BY id' ;
        //echo $query;
        try {
        $results = $this->db->query($query);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }

        $message = $results->fetch(PDO::FETCH_OBJ);

        return $message;
    }

/**
 * Issues SQL query to retrieve comments based on message $id
 *
 * @param string $id ID of message to retrieve comments for
 */
    public function getComments($msg_id) {
        try {
        $results = $this->db->query('
                SELECT id, author, heading, body
                FROM comments WHERE msg_id="'.$msg_id.'"  ORDER BY id');
        } catch (Exception $e) {
            exit;
        }

        $messages = $results->fetchAll(PDO::FETCH_ASSOC);

        return $messages;
    }

/**
 * Issues SQL query to retrieve all message
 *
 */
    public function getMessages() {
        try {
        $results = $this->db->query("
                SELECT id, heading, author, body
                FROM messages
                ORDER BY id");
        } catch (Exception $e) {
            exit;
        }

        $messages = $results->fetchAll(PDO::FETCH_ASSOC);

        return $messages;
    }
/**
 * Issues SQL query to insert message 
 *
 * @param array $formData $_POST data to use for new message
 */
    public function addMessage($formData) {
        $heading = $formData['heading'];
        $body = $formData['body'];
        
        $stmt = $this->db->prepare("INSERT INTO messages (author, heading, body) VALUES (:author, :heading, :body)");
        $stmt->bindValue(':author',$this->user);
        $stmt->bindValue(':heading',$heading);
        $stmt->bindValue(':body',$body);
        return $stmt->execute();
    }
/**
 * Issues SQL query to insert commment 
 *
 * @param array $formData $_POST data to use for new message
 */
    public function addComment($formData) {
        $heading = $formData['heading'];
        $body = $formData['body'];
        $msg_id = $formData['msg_id'];
        
        $stmt = $this->db->prepare("INSERT INTO comments (msg_id, author, heading, body) VALUES (:msg_id, :author, :heading, :body)");
        $stmt->bindValue(':msg_id',$msg_id);
        $stmt->bindValue(':author',$this->user);
        $stmt->bindValue(':heading',$heading);
        $stmt->bindValue(':body',$body);
        return $stmt->execute();
    }
}
?>
