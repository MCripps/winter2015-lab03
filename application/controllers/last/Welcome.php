<?php

/**
 * Our quote page. Show the information about an individual person and their quote
 * Our quotes model has been autoloaded, because we use it everywhere.
 * 
 * controllers/last/Welcome.php
 *
 * ------------------------------------------------------------------------
 */
class Welcome extends Application {

    function __construct() {
        parent::__construct();
    }

    //-------------------------------------------------------------
    //  The normal pages
    //-------------------------------------------------------------

    
    function index() {
        $this->data['pagebody'] = 'justone';    // this is the view we want shown
        
        // get the last quote and assign the members that are in the view to our
        // data array
        $this->setQuoteData( $this->quotes->last());

        $this->render();
    }

}

/* End of file Welcome.php */
/* Location: application/controllers/last/Welcome.php */