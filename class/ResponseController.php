<?php
 /**
 * ResponseController.php -  Controller for displaying feedback to user.
 * 
 * Controller that manages displaying feedback to users.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
require_once(BASE_DIR.'class/Controller.php');
class ResponseController extends Controller {
    //properties
/**
 * Holds the type of message to display
 *
 * @var string $msg type of message
 */
    private $msg = NULL;
    //methods
/**
 * Calls parent class to instantiate object
 *
 * @param array $paramArray  Parsed values from the rt string
 */
    public function __construct($paramArray) {
        parent::__construct($paramArray);
        if (isset($paramArray[0])) {
            $this->msg = $paramArray[0];
        } else {
            $this->msg = NULL;
        }
    }
/**
 * Processing instructions for creating feedback message and updating view.
 *
 */
    public function doIt() {
        //set the Heading
        $this->view->setHeading("This is the ResponseController");
        //set the window/tab title
        $this->view->setTitle("ResponseController");
        //set the Heading
        switch ($this->msg) {
            case "cancel":
                $tempString = 'Your operation has been cancelled, please click above to return to the Main Page.';
                break;
            case "failure":
                $tempString = 'Your operation failed, please click above to return to the Main Page.';
                break;
            case "success":
                $tempString = 'Your operation was successful, please click above to return to the Main Page.';
                break;
            default:
                $tempString = 'You have reached this page in error, please click above to return to the Main Page.';
        }
        $this->view->setMessage($tempString);
        //set the Navigation
        $tempString  = '<a href="'.BASE_URL.'">';
        $tempString .= '<div class="nav_button">RETURN TO MAIN</div>';
        $tempString .= '</a>';
        $this->view->setNav($tempString);
        //get the messages
        $this->view->setCopyright();
        $this->view->show();
    }
}
?>
