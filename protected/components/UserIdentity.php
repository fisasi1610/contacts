<?php

/**
 * @author Nolberto Vilchez Moreno <jnolbertovm@gmail.com>
 * @package APP\Components
 */
class UserIdentity extends CUserIdentity {

  /**
   *
   * @var int 
   */
  private $_id;

  /**
   *
   * @var string 
   */
  public $message = '';

  /**
   * 
   * @return int
   */
  public function authenticate() {
    //Validar la existencia de la cuenta, si la cuenta está bloqueada temporal o permanentemente.
    $validate = User::validateUsername($this->username);
    //Si obtienen resultados y la cuenta existe y está activa
    if ($validate['existe']) {
      //Validación de la contraseña
      if (password_verify($this->password, $validate['password'])) {

        $account_ID = Utils::token("sha1", "{$this->username}~" . uniqid(), 40);

        $this->errorCode = self::ERROR_NONE;
        $this->_id       = $this->username;
        $this->setState("fullname", $validate['fullname']);
        $this->setState("account_ID", $account_ID);
        $this->setState("change_password", false);
      } else {
        $this->errorCode = self::ERROR_PASSWORD_INVALID;
        $this->message   = "La contraseña es incorrecta, Vuelva a intentar.";
      }
    } else {
      $this->errorCode = self::ERROR_USERNAME_INVALID;
      $this->message   = "No existe usuario";
    }

    return $this->errorCode;
  }

  /**
   * 
   * @return int
   */
  public function getId() {
    return $this->_id;
  }

}
