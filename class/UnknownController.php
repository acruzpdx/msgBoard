<?php
 /**
 * UnknownController.php -  Controller for informing users of incorrect URL.
 * 
 * Controller that  displays message for incorrect URL.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once 'class/Controller.php';
require_once 'class/UnknownView.php';
class UnknownController extends Controller {
    // no properties
    // methods
/**
 * Calls parent class to instantiate object
 *
 * @param array $paramArray  Parsed values from the rt string
 */
    public function __construct($paramArray) {
        parent::__construct($paramArray);
    }
/**
 * Processing instructions for creating feedback message and updating view.
 *
 */
    public function doIt() {
        //set the Heading
        $this->view->setHeading("This is the UnknownController");
        //set the window/tab title
        $this->view->setTitle("UnknownController");
        // set the Nav
        $tempString = '</div>';
        $tempString .= '<a href="'.BASE_URL.'">';
        $tempString .= '<div class="nav_button">RETURN TO MAIN</div>';
        $tempString .= '</a>';
        $this->view->setNav($tempString);
        //set the Heading
        //Prepare error message
        $tempString  =  "Sorry. We could not find the file you were ";
        $tempString .= "requesting. Please click above to return to the Main Page.";
        $this->view->setMessage($tempString);
        $this->view->setCopyright();
        $this->view->show();
    }
}
?>

