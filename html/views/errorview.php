<?php

/**
 * This code is part of the Suxx security demo application
 *
 * *** DO NOT USE IN ANY TYPE OF PRODUCTION ***
 *
 * The application is stripped down and contains various security issues to be found
 * by course attendees. It is not meant to be used as an actual shop application or a
 * base for one.
 *
 * @author Arne Blankerts <arne.blankerts@thephp.cc>
 * @copyright 2011-2012 thePHP.cc - The PHP Consulting Company, Germany
 *
 */

class SuxxErrorView implements SuxxViewInterface {

   public function render(SuxxRequest $request, SuxxResponse $response) {
       header('Content-type: text/plain');
       $output = "An Error occoured.\n";
       $output .= print_r($request, true);
       $output .= print_r($response, true);
       return $output;
   }

}