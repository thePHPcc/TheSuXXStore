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

class SuxxCommentController extends SuxxController {

   public function execute(SuxxRequest $request, SuxxResponse $response) {
      $db = $this->factory->getDatabase(DSN);

      $picture = isset($_FILES['picture']) ? $_FILES['picture']['name'] : '';
      $res = $db->query(
         'insert into comments (PID,AUTHOR,COMMENT,PICTURE) values ("%s","%s","%s","%s")',
         $request->getValue('product'),
         $request->getValue('user')->NAME,
         $request->getValue('comment'),
         $picture
         );

      if ($picture) {
          $cid = $res->getInsertId();
          $path = __DIR__.'/../comments/' . $cid . '_' . $picture;
          move_uploaded_file($_FILES['picture']['tmp_name'], $path);
      }

      header('Location: /suxx/product?pid='.$request->getValue('product'),302);
      die();
   }

}