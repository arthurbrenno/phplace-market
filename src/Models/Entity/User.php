<?php

namespace Abwel\Phplace\Models\Entity;

class User {

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $email
     */
    private $email;

    /**
     * Eu sei que é terrivel guardar senhas assim kkkkkkk, mas nao temos BD nesse projeto.
     * @var string $password
     */
    private $password;

    private $loginStatus = false;

    private function __construct($name, $email, $password) {
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
    }

    public static function createUser($name, $email, $password) {
        return new self($name, $email, $password);
    }

    public function setLoginStatus(bool $status) {
        $this->loginStatus = $status;
    }

    public function getLoginStatus() {
        return $this->loginStatus;
    }

    public function getName() {
        return $this->name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

}