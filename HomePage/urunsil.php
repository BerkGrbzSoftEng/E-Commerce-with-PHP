<?php
    include 'header.php';
    $id = $_GET['id'];
    $sepetsor = $db->prepare("delete from basket where basket_id=:id");
    $sepetsor->execute(array(
        'id' => $id
    ));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>