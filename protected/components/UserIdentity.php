<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    private $_id ;
    private $name ;
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/

        $user = Users::model()->findByAttributes(array('username' => $this->username));//uploading users model
        //    echo $this->password; exit;
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($user->password != md5($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$user->id;

            $role=Role::model()->findByPk($user->role_id);
            $this->setState('role', $role->description);
            $name = Yii::app()->db->createCommand()
                ->select('name')
                ->from('espl_employee_details as e')
                ->join('users as u', 'u.id=e.user_id')
                ->where('id=:id', array(':id'=>$user->id))
                ->queryRow();
            $this->setState('name', $name->name);
            $this->errorCode=self::ERROR_NONE;

        }
        return !$this->errorCode;



        return !$this->errorCode;
	}

    public function getId() {
        return $this->_id ;
    }
    public function getFirstName() {
        return $this->_name;
    }


}