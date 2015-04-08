<?php
 /**
 * AddMessageView.php -  View for adding comment page
 * 
 * View that displays page that adds message.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once 'class/View.php';
class AddMessageView extends View {
    //properties
        
    //methods
/**
 * Creates the view object by calling parent.
 *
 */
    public function __construct() {
        parent::__construct("AddMessageView");
    }
/**
 * Replace setName() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function setName($value) {
        $this->html = str_replace('setName()',$value,$this->html);
    }
/**
 * Replace messageHeading() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function messageHeading($value) {
        $this->html = str_replace('messageHeading()',$value,$this->html);
    }
/**
 * Replace messageBody() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function messageBody($value) {
        $this->html = str_replace('messageBody()',$value,$this->html);
    }
/**
 * Replace errorMessage() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function errorMessage($value) {
        $this->html = str_replace('errorMessage()',$value,$this->html);
    }
}
?>
