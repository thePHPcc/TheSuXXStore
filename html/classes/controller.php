<?php

/**
 * This code is part of the Suxx security demo application
 *
 * *** DO NOT USE IN ANY TYPE OF PRODUCTION ***
 *
 * The application is stripped down and contains various security issues to be found
 * by course attendees. It is not ment to be used as an actual shop application or a
 * base for one.
 *
 * @author Arne Blankerts <arne@thephp.cc>
 * @copyright 2011 thePHP.cc - the PHP consulting company, Germany
 *
 */

abstract class SuxxController {

   protected $factory;

   public function __construct(SuxxFactory $factory) {
      $this->factory = $factory;
   }

   abstract public function execute(SuxxRequest $request, SuxxResponse $response);
}