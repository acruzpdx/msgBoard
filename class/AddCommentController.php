<?php
 /**
 * AddCommentController.php -  Controller for adding comments page
 * 
 * Controller that manages page that adds comments.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
require_once(BASE_DIR.'class/Controller.php');
class AddCommentController extends Controller {
    //properties
/**
 * Holds id of message to add comment to.
 *
 * @var string $msgID ID of mesage to add comment to.
 */
    private $msgId = NULL;
    //methods
/**
 * Creates the controller object based on input from caller.
 *
 * @param string $paramString The 'rt' value from the query string.
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
 * Validates formData array values
 * 
 * Although this code and the code in Add Comment are the same,
 * I have it in both places for now in case I need to verify
 * data that is unique to the add Comment or add Message forms.
 *
 * @return boolean true if values exist and and non-empty strings
 */
    private function checkData() {
        $returnVal = true;
        if ( (!isset($this->formData['heading'])) || empty($this->formData['heading']))
        {
            $returnVal = false;
        }
        if ( (!isset($this->formData['body'])) || empty($this->formData['body']) )
        {
            $returnVal = false;
        }
        return $returnVal;
    }
/**
 * Processing instructions for retrieving model data and updating view.
 *
 */
    public function doIt() {
        $errorMessage = "";

        //set the window/tab title
        $this->view->setTitle("AddCommentController");
        //set the Heading
        $this->view->setHeading("This is the AddCommentController");

        //Check data, if valid add to database
        $goodData = $this->checkData();
        if($this->formData['submit']=="Submit" && $goodData) {
            // SUBMIT BUTTON PRESSED
            if($this->model->addComment($this->formData)) {
                //INSERT was successful
                header("Location:".BASE_URL."response/success");
            } else {
                //INSERT was NOT successful
                header("Location:".BASE_URL."response/failure");
            }
        } else if ($this->formData['submit'] == "Cancel" ) {
                // SUBMIT BUTTON PRESSED
                //redirect to Cancel page
                header("Location:".BASE_URL."response/cancel");
        } else {
            // DRAW THE FORM
            //draw the form with sticky data if available
            if(!empty($this->formData['heading'])){
                $tempString = $this->formData['heading'];
            } else {
                $tempString = "";
            }
            $this->view->commentHeading($tempString);
            if(!empty($this->formData['body'])){
                $tempString = $this->formData['body'];
            } else {
                $tempString = "";
            }
            $this->view->msgID($this->msgId);
            if($this->formData['submit']=="Submit" && !$goodData) {
                $errorMessage = "Please fill all fields.";
            }
            $this->view->errorMessage($errorMessage);
            $this->view->commentBody($tempString);
            $this->view->setCopyright();
            $this->view->show();
        }
    }
}
?>
