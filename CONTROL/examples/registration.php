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

class Controller extends CoreController{
    
    private $form;
    
    function __construct($core) {
        // Call parent's constructor. 
        parent::__construct($core);
        $this->form = $this->loadForm('ExamplesRegistration');
    }
    
    function index(){
        
        $this->form->sendToView();
        $this->loadView();
    }
    
    function submit(){
        
        if($this->form->validate()){
            // form valid. Do some database work!
            // Load the model 
            $model = $this->loadModel('ExamplesUser_model');
            
            $userSubmittedData = $this->form->getAll(); // Get user submissions
            // Construct the data array to insert in database
            $data = array();
            
            $data["username"] = $userSubmittedData["username"];
            
            $data["email"] = $userSubmittedData["email"];
            $data["sex"] = $userSubmittedData["sex"];
            
            // Insert some other data
            $data["date"] = time(); //  Current time in UNIX timestamp
            
            // Okay. save it!
            $newUserId = $model->reg($data, $userSubmittedData["passwd"], array(
                'username' => $userSubmittedData["username"])
            );
            if($newUserId === false){
                // Set an error message
                $this->msg("This username already exists (id) please choose a different username", MSGBOX_WARNING);
            }else{
                $this->msg('Congratulations, registration is successful! You are our user #' . $newUserId, MSGBOX_SUCCESS);
            }
        }
        
        // Recreate the form anyway
        $this->index();
    }
}
