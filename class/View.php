<?php
 /**
 * View.php -  Abstract parent class for all views.
 * 
 * Abstract base class with a few shared implemented methods that
 * all views use.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once('lib/config.php');
abstract class View {
    ////properties
/**
 *
 * @var string $html contents of html template
 */
    protected $html = null;
//
    ////methods
/**
 * Creates the view object based on input from caller.
 *
 * @param string $name Name of html file to read
 */
    public function __construct($name) {
        $fileToCheck = BASE_DIR.'template/'.$name.'.html';   
        if (file_exists($fileToCheck)) {
            $this->html = file_get_contents($fileToCheck);
        } else {
            echo $fileToCheck.'does not exists.<br>';
        }
    } 
/**
 * Output the html string
 *
 */
    public function show() {
        echo $this->html;
    }
/**
 * Replace setHeading() place holder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function setHeading($value) {
        $this->html = str_replace('setHeading()',$value,$this->html);
    }
/**
 * Replace setNav() place holder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function setNav($value) {
        $this->html = str_replace('setNav()',$value,$this->html);
    }
/**
 * Replace fillContent() place holder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function fillContent($value) {
        $this->html = str_replace('fillContent()',$value,$this->html);
    }
/**
 * Replace setTitle() place holder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function setTitle($newTitle) {
        $this->html = str_replace('setTitle()',$newTitle, $this->html);
    }
/**
 * Replace setCopyright() place holder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function setCopyright() {
        $this->html = str_replace('setCopyright()',date("Y") . " &copy Agapito Cruz",$this->html);
    }
}
?>
