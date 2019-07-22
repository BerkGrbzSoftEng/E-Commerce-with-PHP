<?php
include 'admin/sql/baglan.php';
function sayac(){  
    global $db;
  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
  
    $kontrol = $db->prepare("SELECT * FROM counter");
            $kontrol->execute(array());
    $tablo_dolumu = $kontrol->rowCount();
  
    if (!$tablo_dolumu) {
      
        $query = $db->prepare("INSERT INTO counter SET
        counter_sayac = ?");
        $insert = $query->execute(array(
         "0"
        ));
              
    }
  
    $sql = $db->prepare("SELECT * FROM counter_ip");
            $sql->execute(array());
            $row=$sql->fetch(PDO::FETCH_ASSOC);
          
          
    if ($row['counterip_ip'] != $ip) {
      
        $query = $db->prepare("INSERT INTO counter_ip SET
        counterip_ip = ?");
        $insert = $query->execute(array(
             $ip
        ));
      
        $sql = $db->prepare("SELECT * FROM counter WHERE counter_id =?");
            $sql->execute(array('1'));
 
            $row=$sql->fetch(PDO::FETCH_ASSOC);
            $artir = $row['counter_sayac']+1;
          
          
            $guncelle = $db->prepare("UPDATE counter SET counter_sayac=? WHERE counter_id = ?");
            $guncelle->execute(array(
            $artir,'1'));
          
    } else {
        $sql = $db->prepare("SELECT * FROM counter WHERE counter_id= ?");
        $sql->execute(array(
            '1'
        ));

        $row=$sql->fetch(PDO::FETCH_ASSOC);
        echo $row['counter_sayac'];
    }
}

?>
<?php sayac(); ?>