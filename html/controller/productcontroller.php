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

class SuxxProductController extends SuxxController {

   public function execute(SuxxRequest $request, SuxxResponse $response) {
      $db = $this->factory->getDatabase(DSN);
      $res = $db->query(
         'select * from products where PID="%s"',
         $request->getValue('pid')
      );
      $response->product = $res->fetch_object();

      $res = $db->query(
         'select * from comments where PID="%s"',
         $request->getValue('pid')
      );
      $response->comments = $res->getAll();

      return new SuxxStaticView(__DIR__ . '/../pages/product.xhtml');
   }

}