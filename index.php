<?php
require_once 'controllers/ContactController.php';

$controller = new ContactController();

$action = $_GET['action'] ?? 'index';

switch($action) {
    case 'store':
        $controller->store();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'status':
        $controller->updateStatus();
        break;
    case 'project':
        $controller->updateProject();
        break;
    default:
        $controller->index();
}
