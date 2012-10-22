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

class SuxxErrorController extends SuxxController {

   public function execute(SuxxRequest $request, SuxxResponse $response) {
       $response->trace = debug_backtrace();
       $response->error = 'An Error occoured:';
       return new SuxxErrorView();
   }
}