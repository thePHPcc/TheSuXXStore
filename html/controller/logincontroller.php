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

class SuxxLoginController extends SuxxController {

   public function execute(SuxxRequest $request, SuxxResponse $response) {
      $db = $this->factory->getDatabase(DSN);
      if ($request->getValue('SuxxUser')) {
         $_SESSION['user'] = unserialize($request->getValue('SuxxUser'));
      } else {
         $res = $db->query(
            'select * from user where username="%s" and passwd="%s"',
            $request->getValue('username'),
            $request->getValue('passwd')
         );
         if ($res->num_rows != 1) {
            return new SuxxStaticView(__DIR__ . '/../pages/loginfailed.xhtml');
         }
         $_SESSION['user'] =  $res->fetch_object();
         setcookie('SuxxUser', serialize($_SESSION['user']),time()+60*60*24*31, '/');
      }
      header('Location: /suxx/home',302);
      die();
   }

}
