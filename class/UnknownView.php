<?php
 /**
 * Unknown.php -  View for displaying unknown URL page
 * 
 * View that displays unknown URL page.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once 'class/View.php';
class UnknownView extends View {
    //properties
        
    //methods
/**
 * Creates the view object by calling parent.
 *
 */
    public function __construct() {
        parent::__construct("UnknownView");
    }
/**
 * Replace setName() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function setname($value) {
        $this->html = str_replace('setname()',$value,$this->html);
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
