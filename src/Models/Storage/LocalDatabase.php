<?php

namespace Abwel\Phplace\Models\Storage;


use Abwel\Phplace\Models\Entity\User;

class LocalDatabase {

    /**
     * @var User[] $users
     */
    private static $users = [];

    /**
     * @param User $user
     * @return void
     */
    public static function addUser($user) {
        $file = file_get_contents(__DIR__ . '/users.json');
        $users   = json_decode($file, true);
        $users[] = [
            'name'     => $user->getName(),
            'email'    => $user->getEmail(),
            'password' => $user->getPassword()
        ];
        file_put_contents(__DIR__ . '/users.json', json_encode($users));
    }

    /**
     * @param User $user
     * @return void
     */
    public static function removeUser($user) {
    }

    public static function getUsers() {
        return self::$users;
    }

    /**
     * @param User $user
     * @return bool
     */
    public static function userExists($email, $password) {
        $content = file_get_contents(__DIR__ . '/users.json');
        $users   = json_decode($content, true);
        foreach ($users as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                return true;
            }
        }
        return false;
    }

    private static function emailExists($email) {
        $content = file_get_contents(__DIR__ . '/users.json');
        $users   = json_decode($content, true);
        foreach ($users as $user) {
            if ($user['email'] === $email) {
                return true;
            }
        }
        return false;
    }

    private static function passwordExists($password) {
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