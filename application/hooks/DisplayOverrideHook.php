<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DisplayOverrideHook
 *
 * @author Marcus
 */
class DisplayOverrideHook {

    protected $CI;

    public function __construct() {
        // Assign the CodeIgniter super-object
        $this->CI = &get_instance();
    }

    public function display_override() {
        // get the data we are about to display
        $display_data = $this->CI->output->get_output();     
        
        // now modify the data before sending it ot the output
        $startSrch = '<p class="lead">';
        $endSrch = '</p>';
        $startSrchLen = strlen($startSrch);
        $startPos = 0;
        $newDisplayData = array();
        // loop through the text looking for "lead" paragraphs and process
        // the text in those paragraphs using wrapUCase(), adding the result
        // to $newDisplayData
        do    {
            // find a lead paragraph
            $pos = strpos($display_data, $startSrch, $startPos);
            if ($pos != FALSE) {
                // if this is the first one we have found, initialise the new 
                // string with text up to this point
                if ($startPos == 0 ){
                    $newDisplayData[] = substr($display_data, $startPos, $pos + $startSrchLen);
                }
                // reset the start to be the first character of the paragraph text
                $startPos = $pos + $startSrchLen;

                // now find the end of the paragraph
                $endPos = strpos($display_data, $endSrch, $startPos); 
                
                // extract the text and make every capital letter bold
                $newDisplayData[] = $this->wrapUCase(substr($display_data, $startPos, $endPos-$startPos));
                $startPos = $endPos;
            }
            else{
                // there are no more paragraphs matching to copy the remainder of the text
                $newDisplayData[] = substr($display_data, $startPos);
            }
        } while ($pos != FALSE);

        // if we found any matching paragraphs replace $displayData with the new
        // data that incorporates the modifications
        if ($startPos > 0 ){
            $display_data = implode($newDisplayData);
        }
    
        // now put the data back into the output to be displayed
        $this->CI->output->set_output($display_data);
    }
    
    // This function encloses any uppercase characters in the string with the 
    // <strong> tag
    protected function wrapUCase($str){
        // first split the string into an array of characters
        $chars = str_split($str);
        // then look for uppercase letters and surround these with <strong>
        for ($i = 0 ; $i<count($chars); $i++){
            if (strstr("ABCDEFGHIJKLMNOPQRSTUVWXYZ", $chars[$i])!=FALSE){
                $chars[$i] = "<strong>" . $chars[$i] . "</strong>";
            }
        }
        // collapse the elements back into a single string
        return implode($chars);
    }

}
