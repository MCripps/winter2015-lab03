<?php

/**
 * Our quote page. Show the information about an individual person and their quote
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/Bingo.php
 *
 * ------------------------------------------------------------------------
 */
class Bingo extends Application {

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
        $this->setQuoteData( $this->quotes->get(5));

        $this->render();  
    }
    
    function wisdom() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // get the first quote and assign the members that are in the view to our
        // data array
        $this->setQuoteData( $this->quotes->get(6));

        $this->render();  
    }
}

/* End of file Bingo.php */
/* Location: application/controllers/Bingo.php */