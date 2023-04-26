<?php
require_once 'database.php';

// Vérifie si un utilisateur est connecté
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Récupère les informations d'un utilisateur connecté
function getLoggedInUser()
{
    if (isLoggedIn()) {
        return getUserById($_SESSION['user_id']);
    }
    return null;
}

// Récupère les informations d'un utilisateur par son ID
function getUserById($user_id)
{
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM users WHERE id = :user_id';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupère la liste des cours
function getCourses()
{
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM courses';
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère la liste des professeurs
function getTeachers()
{
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM teachers';
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère l'emploi du temps d'un professeur
function getScheduleByTeacherId($teacher_id)
{
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM schedules WHERE teacher_id = :teacher_id';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupère un cours par son ID
function getCourseById($course_id)
{
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM courses WHERE id = :course_id';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupère un professeur par son ID
function getTeacherById($teacher_id)
{
    $db = getDatabaseConnection();
    $query = 'SELECT * FROM teachers WHERE id = :teacher_id';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}