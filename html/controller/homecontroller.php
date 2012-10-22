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
 * @author Arne Blankerts <arne@thephp.cc>
 * @copyright 2011 thePHP.cc - the PHP consulting company, Germany
 *
 */

class SuxxHomeController extends SuxxController {

   protected $viewFile =  '/../pages/homepage.xhtml';

   public function execute(SuxxRequest $request, SuxxResponse $response) {
      $db = $this->factory->getDatabase(DSN);
      $res = $db->query('select * from products limit %s, 3', $request->getValue('start',0));
      $response->products = $res->getAll();

      return new SuxxStaticView(__DIR__ . $this->viewFile);
   }

}