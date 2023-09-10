<?php

namespace Abwel\Phplace\Models\Storage;
use       Abwel\Phplace\Models\Entity\User;

class LocalDatabase {

    /**
     * @var User[] $users
     */
    private static array $users = [];

    /**
     * Adiciona um Usuario na base de dados local.
     * @param User $user
     * @return void
     */
    public static function addUser(User $user): void {
        $file    = file_get_contents(__DIR__ . '/users.json');
        $users   = json_decode($file, true);

        $users[] = [
            'name'     => $user->getName(),
            'email'    => $user->getEmail(),
            'password' => $user->getPassword()
        ];

        file_put_contents(__DIR__ . '/users.json', json_encode($users));

        //TODO mudar o retorno do metodo para bool.
    }

    /**
     * Remove um usuario da base de dados.
     * @param User $user usuario a ser removido
     * @return void
     */
    public static function removeUser(User $user): void {
        $contents = file_get_contents(__DIR__ . '/users.json');
        $users    = json_encode($contents);
        //TODO implementar
    }

    /**
     * Retorna todos os usuarios da base de dados
     * @return array todos os usuarios da base de dados
     */
    public static function getUsers(): array {
        //TODO implementar
        return [];
    }

    /**
     * Verifica se um usuario existe por email e senha.
     * @param string $email email do usuario.
     * @param string $password senha do usuario.
     * @return bool true se existe, falso caso nao exista.
     */
    public static function userExists(string $email, string $password): bool {
        $content = file_get_contents(__DIR__ . '/users.json');
        $users   = json_decode($content, true);

        foreach ($users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verifica se um email existe.
     * @param string $email para ser verificado
     * @return bool true se existe, false se nao existe.
     */
    private static function emailExists(string $email): bool {
        $content = file_get_contents(__DIR__ . '/users.json');
        $users   = json_decode($content, true);

        foreach ($users as $user) {
            if ($user['email'] === $email) {
                return true;
            }
        }

        return false;
    }

    /**
     * Verifica se uma senha existe.
     * @param string $password senha para ser verificada.
     * @return bool true se existe, false se nao existe.
     */
    private static function passwordExists(string $password): bool {
        $content = file_get_contents(__DIR__ . '/users.json');
        $users   = json_decode($content, true);

        foreach ($users as $user) {
            if ($user['password'] === $password) {
                return true;
            }
        }

        return false;
    }
}