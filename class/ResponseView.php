<?php
 /**
 * ResponseView.php -  View for displaying feedback page
 * 
 * View that displays feedback page.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once 'class/View.php';
class ResponseView extends View {
    //properties
        
    //methods
/**
 * Creates the view object by calling parent.
 *
 */
    public function __construct() {
        parent::__construct("ResponseView");
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
 * Replace setMessage() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function setMessage($value) {
        $this->html = str_replace('setMessage()',$value,$this->html);
    }
}
?>
