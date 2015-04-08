<?php
 /**
 * MessageController.php -  Controller for display of message.
 * 
 * Controller that manages display of message.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
require_once(BASE_DIR.'class/Controller.php');
class MessageController extends Controller {
    //properties
    private $msgId = NULL;
    //methods
/**
 * Calls parent class to instantiate object
 *
 * @param array $paramArray  Parsed values from the rt string
 */
    public function __construct($paramArray) {
        parent::__construct($paramArray);
        if (isset($paramArray[0])) {
            $this->msgId = $paramArray[0];
        } else {
            $this->msgId = NULL;
        }
    }
/**
 * Processing instructions for retrieving model data and updating view.
 *
 */
    public function doIt() {
        //set the window/tab title
        $this->view->setTitle("MessageController");
        //set the Heading
        $this->view->setHeading("This is the MessageController");
        //set the Navigation
        $tempString  = '<div class="nav_button">';
        $tempString  .= '<a href="'.BASE_URL.'addComment/'.$this->msgId.'">';
        $tempString .= 'ADD COMMENT</a>';
        $tempString .= '</div>';
        $tempString .= '<a href="'.BASE_URL.'">';
        $tempString .= '<div class="nav_button">RETURN TO MAIN</div>';
        $tempString .= '</a>';
        $this->view->setNav($tempString);
        //get the message
        $message = $this->model->getMessage($this->msgId);
        $tempString  = '<div id="message">';
        $tempString .= '<span class="label">ID:</span><span class="info">'. $message->id."</span><br>";
        $tempString .= '<span class="label">HEADING:</span><span class="info">' . $message->heading . "</span><br>";
        $tempString .= '<span class="label">AUTHOR:</span><span class="info">' . $message->author. "</span><br>";
        $tempString .= '<span class="label">TEXT:</span><span class="info">'. $message->body . "</span><br>";
        $tempString .= '</div>';
        $comments = $this->model->getComments($this->msgId);
        if (!empty($comments)) {
            foreach ($comments as $comment) {
                $tempString .= '<div class="comment">';
                $tempString .= '<span class="label">ID:</span><span class="info">'.$comment['id'].'</span><br>';
                $tempString .= '<span class="label">HEADING:</span><span class="info">'.$comment['heading'].'</span><br>';
                $tempString .= '<span class="label">AUTHOR:</span><span class="info">'.$comment['author'].'</span><br>';
                $tempString .= '</div>';
            }
        }
        //Insert the messages (and posssibly comments) into HTML
        $this->view->fillContent($tempString);
        $this->view->setCopyright();
        $this->view->show();
    }
}
?>
