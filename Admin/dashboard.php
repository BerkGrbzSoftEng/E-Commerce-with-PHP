    <?php include 'header.php';
    $ksor=$db->prepare("SELECT * FROM users");
    $ksor->execute();
    $say2=$ksor->rowCount();
    $kcek=$ksor->fetch(PDO::FETCH_ASSOC);

    $psor=$db->prepare("SELECT p.product_name as isim,SUM(basket_piece) as 'TOPLAM' FROM basket b INNER JOIN product p on p.product_id=b.basket_productid WHERE b.basket_status=1 GROUP by b.basket_productid ORDER by toplam desc limit 5");
    $psor->execute();
    $pcek=$psor->fetchAll(PDO::FETCH_ASSOC);

    $csor=$db->prepare("SELECT c.category_id as cisim,c.category_name as isim,SUM(b.basket_piece) as 'TOPLAM' FROM basket b INNER JOIN product p on p.product_id=b.basket_productid INNER JOIN category c on c.category_id=p.product_categoryid WHERE b.basket_status=1 GROUP by c.category_id ORDER by toplam desc limit 5 ");
    $csor->execute();
    $ccek=$csor->fetchAll(PDO::FETCH_ASSOC);

    $esor=$db->prepare("SELECT p.product_name as isim,SUM(basket_piece) as 'TOPLAM' FROM basket b INNER JOIN product p on p.product_id=b.basket_productid WHERE b.basket_status=0 GROUP by b.basket_productid ORDER by toplam desc limit 5");
    $esor->execute();
    $ecek=$esor->fetchAll(PDO::FETCH_ASSOC);

    $ipsor=$db->prepare("SELECT counter_sayac as 'TOPLAM' from counter GROUP BY counter_sayac");
    $ipsor->execute();
    $ipcek=$ipsor->fetch(PDO::FETCH_ASSOC);

    $tsor=$db->prepare("SELECT SUM(basket_piece) as 'TOPLAM' FROM basket b INNER JOIN product p on p.product_id=b.basket_productid WHERE b.basket_status=1");
    $tsor->execute();
    $tcek=$tsor->fetch(PDO::FETCH_ASSOC);




    ?>


    <div class="right_col" role="main">
      <!-- top tiles -->
      <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-star-o"></i>TOPLAM ZİYARETÇİ</span>
          <div class="count"><?php echo $ipcek['TOPLAM']; ?></div>

        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> TOPLAM ÜYE</span>
          <div class="count green"><?php echo $kcek['users_id']; ?></div>
          
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
          <span class="count_top"><i class="fa fa-plus"></i> TOPLAM SATILAN ÜRÜN</span>
          <div class="count green"><?php echo $tcek['TOPLAM']; ?></div>
          
        </div>
  

      </div>

      <br />

      <div class="clearfix"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>EN ÇOK  <small>SATIŞ YAPILAN ÜRÜNLER</small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Ürün Ad</th>
                  <th>Ürün Adet</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <?php 

                  $say=0;

                  foreach ($pcek as $key)  { $say++?>
                    <th scope="row"><?php echo $say ?></th>
                    <td><?php echo $key['isim'] ?></td>
                    <td><?php  echo $key['TOPLAM']?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>EN ÇOK  <small>SATIŞ YAPILAN KATEGORİLER</small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kategori Ad</th>
                  <th>Kategori Adet</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <?php 

                  $say=0;

                  foreach ($ccek as $key)  { $say++?>
                    <th scope="row"><?php echo $say ?></th>
                    <td><?php echo $key['isim'] ?></td>
                    <td><?php  echo $key['TOPLAM']?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>EN ÇOK  <small>SEPETE EKLENE ÜRÜNLER</small></h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kategori Ad</th>
                  <th>Kategori Adet</th>
                </tr>
              </thead>
              <tbody>
                <tr>

                  <?php 

                  $say=0;

                  foreach ($ecek as $key)  { $say++?>
                    <th scope="row"><?php echo $say ?></th>
                    <td><?php echo $key['isim'] ?></td>
                    <td><?php  echo $key['TOPLAM']?></td>

                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>

    </div>

    <?php include 'footer.php' ?>