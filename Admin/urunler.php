<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$urunsor=$db->prepare("SELECT c.*,p.* FROM category c INNER JOIN product p on c.category_id=p.product_categoryid  ");
$urunsor->execute();

$stoksor=$db->prepare("SELECT * FROM stock s INNER JOIN product p on p.product_id=s.stock_productid");
$stoksor->execute();
$stokcek=$stoksor->fetch(PDO::FETCH_ASSOC)


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Listeleme <small>

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
              <a href="urun-ekle.php"><button class="btn btn-success btn-xs"> Ürün Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ürun Ad</th>  
                  <th>Ürun Fiyat</th>
                  <th>Ürün İcerik</th>
                  <th>Ürün Adet</th>
                  <th>Kategori Ad</th>
                  <th>Ürün Resim</th> 
                  <th>Stok İslemleri<th>               
                  <th>Ürun Durum</th>
                  
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td><?php echo $uruncek['product_name'] ?></td>                
                   <td><?php echo $uruncek['product_price'] ?></td>
                   <td><?php echo $uruncek['product_content'] ?></td>
                   <td><?php echo $uruncek['category_name'] ?></td>
                   <td><center><a href="urun-galeri.php?product_id=<?php echo $uruncek['product_id'] ?>"><button class="btn btn-success btn-xs">Resim İşlemleri</button></a></center></td>
                   
                   <td><center><a href="stokekle.php?product_id=<?php echo $uruncek['product_id'] ?>"><button class="btn btn-primary btn-xs">Stok İşlemleri</button></a></center></td>

                   <td><center><?php if ($uruncek['product_status']==1) {?>

                    <a href="../sql/islem.php?product_id=<?php echo $uruncek['product_id'] ?>&product_sts=0&product_status=ok"><button class="btn btn-success btn-xs">Aktif</button>

                    <?php }elseif ($uruncek['product_status']==0) {?>

                      <a href="../sql/islem.php?product_id=<?php echo $uruncek['product_id'] ?>&product_sts=1&product_status=ok"><button class="btn btn-danger btn-xs">Pasif</button>


                      <?php } ?>
                    </center>


                  </td>


                  <td><center><a href="urun-duzenle.php?product_id=<?php echo $uruncek['product_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../sql/islem.php?product_id=<?php echo $uruncek['product_id']; ?>&urunsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
