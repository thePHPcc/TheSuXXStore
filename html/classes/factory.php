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

class SuxxFactory {

   protected $defaultController = 'SuxxErrorController';

   public function setDefaultController($default) {
      $this->defaultController = $default;
   }

   public function getController($name) {
      $name = 'Suxx' . ucfirst($name).'Controller';
      if (!class_exists($name)) {
         return new $this->defaultController($this);
      }
      return new $name($this);
   }

   public function getDatabase($dsn) {
      return new SuxxDatabase($dsn);
   }
}