<?php

/* * ***** ****** ****** ****** ****** ******
 *
 * Author       :   Shafiul Azam
 *              :   ishafiul@gmail.com
 *              :   Project Manager, 
 *              :   PROGmaatic Developer Network
 * Page         :
 * Description  :   
 * Last Updated :
 *
 * ****** ****** ****** ****** ****** ***** */

class Login extends CoreForm {
    
    function __construct($core) {
        // MUST call parent's constructor
        parent::__construct($this, $core);
        // Set form properties here.
        $this->action = url("login/submit");
        $this->submitButtonText = "Log In!";
        $this->tableCellSpacing = "10px";
    }
    
    function createElements(){
        // This function should be present
        // Generate form elements
        
        $this->element('email', "Email", "email");
        $this->elementHTML('email', $this->input("email"));
        
        $this->element('passwd', "Password", "required|htmlspecialchars");
        $this->elementHTML('passwd', $this->input('passwd', 'password'));
        
        $this->element('comment', "Comment (optional)", "htmlspecialchars");
        $this->elementHTML('comment', $this->textarea("comment"));
    }
    
    
    
}

?>