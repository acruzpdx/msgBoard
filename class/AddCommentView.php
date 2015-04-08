<?php
 /**
 * AddCommentView.php -  View for adding comment page
 * 
 * View that displays page that adds comment.
 *  
 * @author Agapito Cruz <agapito.cruz@gmail.com>
 * @package msgBoard
 * @copyright Agapito Cruz
 */

// *****************************************************************************
require_once 'class/View.php';
class AddCommentView extends View {
    //properties
        
    //methods
/**
 * Creates the view object by calling parent.
 *
 */
    public function __construct() {
        parent::__construct("AddCommentView");
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
 * Replace commmentHeading() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function commentHeading($value) {
        $this->html = str_replace('commentHeading()',$value,$this->html);
    }
/**
 * Replace commentBody() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function commentBody($value) {
        $this->html = str_replace('commentBody()',$value,$this->html);
    }
/**
 * Replace msgID() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function msgID($value) {
        $this->html = str_replace('msgID()',$value,$this->html);
    }
/**
 * Replace setHeading() placeholder with value of $value
 *
 * @param string $value String used to replace placeholder
 */
    public function errorMessage($value) {
        $this->html = str_replace('errorMessage()',$value,$this->html);
    }
}
?>
