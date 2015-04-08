<?php
 /**
 * ControllerFactory.php -  Creates controller based on string
 * 
 * Factory class that uses a routing table to map
 * the route requested to the correct Controller,View,
 * and Model set.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
class ControllerFactory {
    private static $routingTable = array(
       //    'route', 'Controller class/file', 'View class/file', 'Model class/file'
       array('main', 'MainController','MainView','Model'),
       array('message', 'MessageController','MessageView','Model'),
       array('addMessage', 'AddMessageController','AddMessageView','Model'),
       array('addComment', 'AddCommentController','AddCommentView','Model'),
       array('response', 'ResponseController','ResponseView','Model'),
       array('unknown', 'UnknownController','UnknownView','Model'),
    );

/**
 * Checks if the files for all the possible objects are available
 *
 */
    public static function validateRoutingTable() {
        // check that routing table is valid
        foreach ( self::$routingTable as list($route, $controller, $view, $model)) {
            // create file names
            $controllerFile = BASE_DIR."./class/{$controller}.php" ;
            $viewFile = BASE_DIR."./class/{$view}.php" ;
            $modelFile = BASE_DIR."./class/{$model}.php";
            // check if files exists
            $controllerFileFound = file_exists($controllerFile);
            $viewFileFound = file_exists($viewFile);
            $modelFileFound = file_exists($modelFile);
            // throw exception if necessary
            if(!$controllerFileFound || !$viewFileFound || !$modelFileFound) {
                throw new Exception("Routing Table invalid");
            }
        }
    }
/**
 * Creates and returns a fully formed controller with the correct View and Model.
 *
 * @param array $paramArray  Parsed values from the rt string
 */
    public static function getController($paramArray)
    {
        $requestedRoute = array_shift($paramArray);
        // Loop through routingTable looking for the requestsedRoute
        foreach ( self::$routingTable as list($route, $controller, $view, $model)) {
            if ($requestedRoute === $route) {
                break;
            }
        } 
        // create file names
        $controllerFile = BASE_DIR."class/{$controller}.php";
        $viewFile = BASE_DIR."class/{$view}.php";
        $modelFile = BASE_DIR."class/{$model}.php";
        // import the files
        require_once($viewFile);
        require_once($modelFile);
        require_once($controllerFile);
        // instantiate the objects and wire them up
        $newController = new $controller($paramArray);
        $newController->setView(new $view());
        $newController->setModel(new $model());
        return $newController;
    }       
}
?>
