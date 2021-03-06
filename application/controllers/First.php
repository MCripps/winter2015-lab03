<?php

/**
 * Our quote page. Show the information about an individual person and their quote
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/First.php
 *
 * ------------------------------------------------------------------------
 */
class First extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    
    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // get the first quote and assign the members that are in the view to our
        // data array
        $this->setQuoteData( $this->quotes->first());

        $this->render();
    }

    function zzz(){
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // get the  quote and assign the members that are in the view to our
        // data array
        $this->setQuoteData( $this->quotes->get(1));

        $this->render();  
    }
    
    function gimme($id){
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // get the  quote and assign the members that are in the view to our
        // data array
        $this->setQuoteData( $this->quotes->get($id));

        $this->render();  
    }
}

/* End of file First.php */
/* Location: application/controllers/First.php */