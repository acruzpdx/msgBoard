<?php
 /**
 * MainController.php -  Class main page controller.
 * 
 * Controller that manages processing of initial msgBoard page.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
require_once(BASE_DIR.'class/Controller.php');
class MainController extends Controller {
    //no properties
    //methods
/**
 * Calls parent class to instantiate object
 *
 * @param array $paramArray  Parsed values from the rt string
 */
    public function __construct($paramArray) {
        parent::__construct($paramArray);
    }
/**
 * Processing instructions for retrieving model data and updating view.
 *
 */
    public function doIt() {
        //set the window/tab title
        $this->view->setTitle("MainController");
        //set the Heading
        $this->view->setHeading("This is the MainController");
        //set the Navigation
        $tempString  = '<div class="nav_button">';
        $tempString  .= '<a href="'.BASE_URL.'addMessage">';
        $tempString .= 'ADD MESSAGE</a>';
        $tempString .= '</div>';
        $this->view->setNav($tempString);
        //get the messages
        $messages = $this->model->getMessages();
        //create an UL with messages as LI elements
        $tempString = "<ul>\n";
        foreach ($messages as $message ) {
            $tempString .= '<a href ="'.BASE_URL."message/".$message['id'].'">';
            $tempString .= '<li>';
            $tempString .= '<span class="label">ID:</span><span class="info">'. $message['id'] . '</span><br>';
            $tempString .= '<span class="label">HEADING:</span><span class="info">'. $message['heading'] . '</span><br>';
            $tempString .= '<span class="label">AUTHOR:</span><span class="info">'. $message['author'] . '</span><br>';
            $tempString .= "</li>";
            $tempString .= "</a>";
        }
           $tempString .= "</ul>";
        //Insert the messages UL into HTML
        $this->view->fillContent($tempString);
        $this->view->setCopyright();
        $this->view->show();
    }
}
?>
