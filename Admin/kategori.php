<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$kategorisor=$db->prepare("SELECT * FROM category");
$kategorisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Listeleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="kategori-ekle.php"><button class="btn btn-success btn-xs"> Kategori Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Kategori Ad</th>  
                  <th>Kategori Sira</th>
                  <th>Kategori Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $kategoricek['category_name'] ?></td>                
                 <td><?php echo $kategoricek['category_alignment'] ?></td>

                 <td><center><?php 

                  if ($kategoricek['category_status']==1) {?>

                  <a href="../sql/islem.php?category_id=<?php echo $kategoricek['category_id'] ?>&category_sts=0&category_status=ok"><button class="btn btn-success btn-xs">Aktif</button>

                <?php }elseif ($kategoricek['category_status']==0) {?>

                <a href="../sql/islem.php?category_id=<?php echo $kategoricek['category_id'] ?>&category_sts=1&category_status=ok"><button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>


            <td><center><a href="kategori-duzenle.php?category_id=<?php echo $kategoricek['category_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
            <td><center><a href="../sql/islem.php?category_id=<?php echo $kategoricek['category_id']; ?>&kategorisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
