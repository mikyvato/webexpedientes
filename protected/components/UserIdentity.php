<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username=strtolower($this->username);
		$user=Usuarios::model()->find('LOWER(username)=?',array($username));
		if($user===null)
		 $this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
		 $this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id=$user->id_usuario;
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;

			$info_usuario = Usuarios::model()->find('LOWER(username)=?', array($user->username));
			$this->setState('last_login',$info_usuario->last_login);
			$sql = "UPDATE `usuarios` SET last_login = NOW() WHERE username = '$user->username'";
			$connection = Yii::app() -> db;
			$command = $connection -> createCommand($sql);
			$command -> execute();
            }
	    return $this->errorCode==self::ERROR_NONE;
	}

	    public function getId()
	    {
	    	return $this->_id;
	    }
		
}