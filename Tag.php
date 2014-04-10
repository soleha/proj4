<?php
new1
/**
 * Class Docblock
 *
 * This class controls all the methods 
 * 
 *
 * @category Post Model
 * @author   Soleha Ahmed <soleha@ranium.in>
 */
class Tag extends AppModel {

var $name = 'Tag';

  var $hasAndBelongsToMany = array('Post' =>
                               array('className'    => 'Post',
                                     'joinTable'    => 'posts_tags',
                                     'foreignKey'   => 'tag_id',
                                     'associationForeignKey'=> 'post_id',
                                 
                                     'unique'       => true,
                                 
                               ));


  /**
   * To apply validation to tag
   *
   * @var array
   */
  public $validate = array(
    'tag' => array(
      'required' => array(
        'rule' => array('notEmpty'),
          'message' => 'Tag is required', 
      ),
    ),
  );

}

