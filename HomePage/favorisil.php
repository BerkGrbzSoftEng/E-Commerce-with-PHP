<?php
    include 'header.php';
    $id = $_GET['id'];
    $sepetsor = $db->prepare("delete from favorite where favorite_id=:id");
    $sepetsor->execute(array(
        'id' => $id
    ));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>