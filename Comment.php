<?php
class Comment extends AppModel {

  public $belongsTo = array('User');


   /**
   * Method to check ownnership of the comment
   *
   * This method checks whether user is authorized to edit or delete the comment
   *
   * @param int comment
   * @param int user
   *
   * @return
   */
  public function isOwnedBy($comment, $user) {

    return $this->field('id', array('id' => $comment, 'user_id' => $user)) === $comment;
  }


    
}