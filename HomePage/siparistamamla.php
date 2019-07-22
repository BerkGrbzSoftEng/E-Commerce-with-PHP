<?php
    include 'header.php';
    $userId = $_GET['id'];
$sepetsor = $db->prepare("select basket_productid as id, basket_piece as piece from basket where basket_status=0 and basket_userid=:id");
$sepetsor->execute(array(
    'id' => $userId
));
$say=$sepetsor->rowCount();
$sepetcek=$sepetsor->fetchAll(PDO::FETCH_ASSOC);


foreach ($sepetcek as $item => $val)
{
    $sql = $db->prepare("update stock set stock_total=stock_total-".$val['piece']." where stock_productid=:id");
    $sql->execute(
        [
            'id' => $val['id']
        ]
    );
}

    $sepetsor = $db->prepare("update basket set basket_status=1 where basket_userid=:id");
    $sepetsor->execute(array(
        'id' => $userId
    ));


    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>