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

class SuxxRegisterController extends SuxxController {

   public function execute(SuxxRequest $request, SuxxResponse $response) {
      $db = $this->factory->getDatabase(DSN);
      $res = $db->query(
         'insert into user (USERNAME,PASSWD,EMAIL,NAME) values ("%s","%s","%s","%s")',
         $request->getValue('username'),
         $request->getValue('passwd'),
         $request->getValue('email'),
         $request->getValue('name')
         );
      $msg   = 'Welcome '.$request->getValue('name') . "\n";
      $msg  .= 'Your Login: '.$request->getValue('username') . "\n";
      $msg  .= 'Your Password: '.$request->getValue('passwd') . "\n";
      $msg  .= "\n\nEnjoy your stay!";
      //mail($request->getValue('email'), 'welcome to SuXX', $msg, 'From: housekeeping@suxx.mobile');
      header('Location: /suxx/home?message=Welcome,%20please%20login!',302);
      die();
   }

}