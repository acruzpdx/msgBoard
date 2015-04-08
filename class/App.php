<?php
 /**
 * App.php -  Encapsulating class for controller.
 * 
 * Code for App class that sets up the creation
 * of the proper controller object based on the
 * route string derived in the index.php.
 *  
 * This class also provides a method for injecting
 * POST data into the controller object
 *
 * Finally, this class also kicks off the processing
 * of the php code.
 *
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
require_once(BASE_DIR .'class/ControllerFactory.php');
class App {
    ////properties
/**
 * Holds the requested controller object
 *
 * @var string $msg type of message
 */
    private $controller = null;    

    ////methods
/**
 * Creates the controller object based on input from caller.
 *
 * @param string $paramString The 'rt' value from the query string.
 */
    public function __construct($paramString) {
        // strip any trailing '/'
        $paramString = rtrim($paramString,'/');
        $paramArray = explode('/', $paramString);

        // Create the correct controller & view
        try {
            
                // Check that the Routing Table has
                // valid entries, i.e. the files
                // actually exist to create the various
                // objects.
                ControllerFactory::validateRoutingTable();
        } catch (Exception $e) {
            // the ControllerFactory routing table was invalid
            // TODO: Make this more robust
            echo "Error: " . $e->getMessage();
       }
        $this->controller = ControllerFactory::getController($paramArray);


    }
/**
 * Passes form data to the controller to use.
 *
 * @param array $formData The $_POST array
 */
    public function addData($formData) {
        $this->controller->addData($formData);
    }
    public function doIt() {
/**
 * Calls the controller processing method
 *
 */
        // Process controller/view/model interaction
        $this->controller->doIt();
    }
}
?>
