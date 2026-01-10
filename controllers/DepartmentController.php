<?php
class DepartmentController {

    public static function index() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM departments ORDER BY id DESC");
        $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require 'views/departments/index.php';
    }

    public static function store($data) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO departments(name, description) VALUES(?, ?)");
        $stmt->execute([
            $data['name'],
            $data['description']
        ]);

        header("Location: index.php?page=departments");
        exit;
    }

    public static function delete($id) {
        $db = Database::connect();
        $stmt = $db->prepare("DELETE FROM departments WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: index.php?page=departments");
        exit;
    }
}
