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
        self::$users[] = $user;
    }

    /**
     * @param User $user
     * @return void
     */
    public static function removeUser($user) {
        $index = array_search($user, self::$users);
        if ($index !== false) {
            unset(self::$users[$index]);
        }
    }

    /**
     * @return User[]
     */
    public static function getUsers() {
        return self::$users;
    }
}