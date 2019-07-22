<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$mesajsor=$db->prepare("SELECT * from messages m inner join roles r on r.roles_id=m.messages_roleid");
$say=$kullanicisor->rowCount();
$mesajsor->execute();

$kullanicisor=$db->prepare("SELECT * from users s inner join roles r on r.roles_id=s.users_roleid");
$kullanicisor->execute();
$say=$kullanicisor->rowCount();
$kullanicicekim=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mesaj Listeleme <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>M.Sıra</th>

                  <th>Gönderen İsim</th>
                  <th>Gönderen Mail</th>
                  <th>Mesaj İçeriği</th>
                  <th>Gönderen Tip</th>
                  <th>Gönderme Tarihi</th>

                </tr>
              </thead>

              <tbody>

                <?php 
                $say=0;
                while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)) {$say++?>


                  <tr>
                    <td width="20"><?php echo $say ?></td>
                    <td><?php echo $mesajcek['messages_name'] ?></td>
                    <td><?php echo $mesajcek['messages_email'] ?></td>
                    <td><?php echo $mesajcek['messages_content'] ?></td>
                    <td><?php if($mesajcek['messages_roleid']==2){echo $mesajcek['roles_name'];} else if($mesajcek['messages_roleid']==0) {echo $mesajcek['roles_name'];} ?></td>
                    <td><?php echo $mesajcek['messages_date'] ?></td>


                  </tr>



                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>