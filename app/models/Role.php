<?php


namespace App\models;




use Delight\Auth\Auth;

final class Role
{
    private $auth;
    const ADMIN     =  \Delight\Auth\Role::ADMIN;
    const MODERATOR =  \Delight\Auth\Role::MODERATOR;
    const USER      =  \Delight\Auth\Role::AUTHOR;
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }
    public function isAdmin()
    {
        return $this->auth->hasRole(self::ADMIN);
    }

    public function checkRoles()
    {
        return $this->auth->hasAnyRole(self::ADMIN, self::MODERATOR);
    }

    public function changeRole($currentRole, $newRole, $userId)
    {
        try {
            $this->auth->admin()->removeRoleForUserById($userId, $currentRole);
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            flash()->error('Unknown user ID');
        }

        try {
            $this->auth->admin()->addRoleForUserById($userId, $newRole);
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            die('Unknown user ID');
        }
        return true;
    }

    public function getRoles()
    {
        return [
            [
                'id' => self::ADMIN,
                'title' => 'Administrator'
            ],
            [
                'id' => self::MODERATOR,
                'title' => 'Moderator'
            ],
            [
                'id' => self::USER,
                'title' => 'User'
            ]
        ];
    }

    public function getRole($value)
    {

            foreach($this->getRoles() as $role)
            {
                if($role['id'] == $value) return $role['title'];
            }

    }


}