<?php
 /**
 * MainView.php -  View for initial page
 * 
 * View that displays initial page.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once 'class/View.php';
class MainView extends View {
    //properties
        
    //methods
/**
 * Creates the view object by calling parent.
 *
 */
    public function __construct() {
        parent::__construct("MainView");
    }
/**
 * Replace setName() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function setName($value) {
        $this->html = str_replace('setName()',$value,$this->html);
    }
}
?>
