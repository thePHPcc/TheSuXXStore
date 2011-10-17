<?php

/**
 * This code is part of the Suxx security demo application
 *
 * *** DO NOT USE IN ANY TYPE OF PRODUCTION ***
 *
 * The application is stripped down and contains various security issues to be found
 * by course attendees. It is not ment to be used as an actual social network or a
 * base for one.
 *
 * @author Arne Blankerts <arne@thephp.cc>
 * @copyright 2011 thePHP.cc - the PHP consulting company, Germany
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