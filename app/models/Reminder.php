<?php

class Reminder {

    public function get_all_reminders() {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM notes ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create_reminder($user_id, $subject) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO notes (user_id, subject) VALUES (?, ?)");
        return $stmt->execute([$user_id, $subject]);
    }

    public function delete_reminder($id) {
        $db = db_connect();
        $stmt = $db->prepare("DELETE FROM notes WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function update_reminder($id, $subject) {
        $db = db_connect();
        $stmt = $db->prepare("UPDATE notes SET subject = ? WHERE id = ?");
        return $stmt->execute([$subject, $id]);
    }

    public function get_reminder_by_id($id) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM notes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function get_user_reminders($user_id) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM notes WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
