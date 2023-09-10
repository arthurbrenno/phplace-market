<?php

namespace Abwel\Phplace\Models\Entity;

/**
 * Representa um usuario do supermercado
 */
class User {

    /**
     * @var string $name
     */
    private string $name;

    /**
     * @var string $email
     */
    private string $email;

    /**
     * Eu sei que é terrivel guardar senhas assim kkkkkkk, mas nao temos BD nesse projeto.
     * @var string $password
     */
    private string $password;

    /**
     * @var bool $loginStatus status do login do usuario.
     */
    private $loginStatus = false;

    /**
     * Construtor.
     * @param string $name
     * @param string $email
     * @param string $password
     */
    private function __construct(string $name, string $email, string $password) {
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
    }

    /**
     * Factory Method. Cria um novo usuario.
     * @param string $name
     * @param string $email
     * @param string $password
     * @return self
     */
    public static function createUser(string $name, string $email, string $password): User {
        return new self($name, $email, $password);
    }

    /**
     * Setter. Seta o status de login do Usuario.
     * @param bool $status
     * @return void
     */
    public function setLoginStatus(bool $status) {
        $this->loginStatus = $status;
    }

    /**
     * Getter. Obtem o status de login do usuario.
     * @return bool
     */
    public function getLoginStatus(): bool {
        return $this->loginStatus;
    }

    /**
     * Getter. Obtem o nome do usuario.
     * @return string nome do usuario.
     */
    public function getName() {
        return $this->name;
    }

    /**
     * (Sim, não é seguro kkk)
     * Getter. Obtem a senha do usuario.
     * @return string senha do usuario
     */
    public function getPassword(): string {
        return $this->password;
    }

    /**
     * Getter. Obtem o email do usuario.
     * @return string email do usuario.
     */
    public function getEmail(): string {
        return $this->email;
    }

}