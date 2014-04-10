<?php
s is first
/**
 * Class Docblock
 *
 * This class controls all the methods 
 * 
 *
 * @category Post Model
 * @author   Soleha Ahmed <soleha@ranium.in>
 */
class Post extends AppModel {

  var $name = 'Post';
  //var $actsAs = array ('Searchable');


  var $hasAndBelongsToMany = array('Tag' =>
                               array('className'    => 'Tag',
                                     'joinTable'    => 'posts_tags',
                                     'foreignKey'   => 'post_id',
                                     'associationForeignKey'=> 'tag_id',
                                     'unique'       => true,
                                  
                               )
                               );


    public $hasMany = 'Comment';


  /**
   * To apply validation to title and body 
   *
   * @var array
   */
  public $validate = array(
      'title' => array(
          'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'Title is required', 
         
      ),
    ),

      'body' => array(
        'required' => array(
          'rule' => array('notEmpty'),
            'message' =>'Content is required', 
      ))
  );


 /**
   * this variable checks for the validation of comment.
   *
   * @var array
   */
  public $validateCom = array(
   'comment' => array(
          'required' => array(
            'rule' => array('notEmpty'),
            'message' => 'Title is required', 
         
      )
    ),
    
  );


  /**
   * Method to check ownnership of the post
   *
   * This method checks whether user is authorized to edit or delete the post
   *
   * @param int post
   * @param int user
   *
   * @return 
   */
  public function isOwnedBy($post, $user) {
    
    return $this->field('id', array('id' => $post, 'user_id' => $user)) === $post;
  }


}

