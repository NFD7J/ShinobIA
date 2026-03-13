<?php
namespace App\models;

use App\entities\User;
use App\core\Dbconnect;

class AuthModel extends Dbconnect
{
    public function login(User $user)
    {
        $this->request = $this->connection->prepare("SELECT * FROM user WHERE mail = :mail");
        $this->request->execute([
            "mail" => $user->getEmail()
        ]);
        $isconnected = $this->request->fetch();
        if ($isconnected && password_verify($user->getPassword(), $isconnected->password)) {
            return $isconnected;
        }
        return false;
    }

    public function register(User $user)
    {
        $this->request = $this->connection->prepare(
            "INSERT INTO user (mail, password, name) VALUES (:mail, :password, :name)"
        );
        $this->request->execute([
            "mail" => $user->getEmail(),
            "password" => $user->getPassword(),
            "name" => $user->getName()
        ]);
    }

    public function emailExists(string $email): bool
    {
        $this->request = $this->connection->prepare("SELECT COUNT(*) as nb FROM user WHERE mail = :mail");
        $this->request->execute(["mail" => $email]);
        $result = $this->request->fetch();
        return $result->nb > 0;
    }

    public function createGuestUser(User $user): int
    {
        $this->request = $this->connection->prepare(
            "INSERT INTO user (mail, password, name) VALUES (:mail, :password, :name)"
        );
        $this->request->execute([
            "mail" => $user->getEmail(),
            "password" => $user->getPassword(),
            "name" => $user->getName()
        ]);
        
        return (int)$this->connection->lastInsertId();
    }
}
