<?php
 /**
 * config.php -  Constants
 * 
 * Constants for database and file/url access.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
    define("BASE_URL", "/test/");
    define("BASE_DIR",$_SERVER['DOCUMENT_ROOT']."/test/");
    define("DB_USER","root");
    define("DB_PW","root");
    define("DSN","mysql:host=localhost;dbname=msgBoard;port=3306");
?>
