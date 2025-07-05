<?php

class Reminders extends Controller {

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            echo "Unauthorized";
            return;
        }
    
        $reminderModel = $this->model('Reminder');
        $data = $reminderModel->get_user_reminders($_SESSION['user_id']);
        $this->view('reminders/index', ['reminders' => $data]);
    }
    

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reminderModel = $this->model('Reminder');

            if (isset($_SESSION['user_id'])) {
                $reminderModel->create_reminder($_SESSION['user_id'], $_POST['subject']);
                header("Location: /index.php?url=reminders/index");
                exit;
            }

            echo "Unauthorized";
        } else {
            $this->view('reminders/create');
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
            $reminderModel = $this->model('Reminder');
            $reminderModel->delete_reminder($_POST['id']);
            header("Location: index.php?url=reminders/index");
            exit;
        }
    }

    public function update() {
        $reminderModel = $this->model('Reminder');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'], $_POST['subject'])) {
            $reminderModel->update_reminder($_POST['id'], $_POST['subject']);
            header("Location: index.php?url=reminders/index");
            exit;
        }

        if (isset($_GET['id'])) {
            $reminder = $reminderModel->get_reminder_by_id($_GET['id']);
            $this->view('reminders/update', ['reminder' => $reminder]);
        }
    }
    public function get_user_reminders($user_id) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
