<?php
require_once 'config/Database.php';
require_once 'models/Contact.php';

class ContactController {
    private $contact;

    public function __construct() {
        $db = (new Database())->connect();
        $this->contact = new Contact($db);
    }

    public function index() {
        $data = $this->contact->getAll();
        include 'views/contact/index.php';
    }

    public function store() {
        $this->contact->create($_POST);
        header("Location: index.php");
    }

    public function delete() {
        $this->contact->delete($_GET['id']);
        header("Location: index.php");
    }

    public function updateStatus() {
        $this->contact->updateStatus($_GET['id'], $_GET['status']);
        header("Location: index.php");
    }

    public function updateProject() {
        $this->contact->updateProject($_GET['id'], $_GET['project']);
        header("Location: index.php");
    }
}
