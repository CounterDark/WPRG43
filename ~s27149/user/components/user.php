<?php
class User {
    private $id;
    private $login;
    private $name;
    private $role;

    public function __construct($id, $login, $name, $role) {
        $this->id = $id;
        $this->login = $login;
        $this->name = $name;
        $this->role = $role;
    }

    public function getId() {
        return $this->id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getName() {
        return $this->name;
    }

    public function getRole() {
        return $this->role;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}
?>