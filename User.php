<?php


// uses passwordhasher to encrypt password
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');


/**
 * Class Docblock
 *
 * This class checks for validation function for users and apply password hashing function
 * 
 * @category User model
 * @author   Soleha Ahmed <soleha@ranium.in>
 */
class User extends AppModel {


  /**
   * this variable checks for the validation username ,password for login.
   *
   * @var array
   */
  public $validate = array(
    'username' => array(
        'rule' => array('notEmpty'),
          'message' =>'A username is required', 

    ),
    'password' => array(
      'required' => array(
          'rule' => array('notEmpty'),
            'message' => 'A password is required'
        )
      ),
    );

	
  /**
   * this variable checks for the validation username ,password and role.
   *
   * @var array
   */
	public $validateRegister = array(
		'username' => array(
      'alphaNumeric' => array(
          'rule'     => 'alphaNumeric',
          'required' => true,
          'message'  => 'Alphabets and numbers only'
      )
    ),
		'password' => array(
      'rule'    => array('minLength', '4'),
      'message' => 'Minimum 4 characters long'
    ),
		'role' => array(
			'valid' => array(
				'rule' => array('inList', array('admin', 'author')),
				'message' => 'Please enter a valid role',
				'allowEmpty' => false
			)
		)
	);

  
  /**
  * Method to add password hashing to password
  *
  * This method applies password hashing
  *
  *
  * @return boolean value
  */
	public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
      $passwordHasher = new SimplePasswordHasher();
      $this->data[$this->alias]['password'] = $passwordHasher->hash(
        $this->data[$this->alias]['password']
      );
    }
    return true;
	}


  /**
   * Method to check ownnership of user
   *
   * This method checks whether user is authorized to edit or delete himself
   *
   * @param int post
   * @param int user
   *
   * @return 
   */
  public function isOwnedBy($post, $user) {
    
    return $this->field('id', array('id' => $post, 'id' => $user)) === $user;
  }

}



