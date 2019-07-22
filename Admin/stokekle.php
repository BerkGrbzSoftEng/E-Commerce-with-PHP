<?php
include 'header.php';
$urunsor=$db->prepare("SELECT * from product where product_id=:product_id");
$urunsor->execute(array(
'product_id' => $_GET['product_id']
));
$say=$urunsor->rowCount();
$uruncek2=$urunsor->fetch(PDO::FETCH_ASSOC);

$kategorisor=$db->prepare("SELECT * from category ");
$kategorisor->execute(array());
$say=$kategorisor->rowCount();
$kategoricek=$kategorisor->fetchAll(PDO::FETCH_ASSOC);



?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">

            <h2>Ürün Ekleme <small>

            </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../sql/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="product_name" disabled required="required" placeholder="<?php  echo $uruncek2['product_name']; ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

    

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Adet <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="stock_total"  placeholder="Ürün Adet Giriniz" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <input type="hidden" name="prod_id" value="<?php echo $uruncek2['product_id']; ?>"> 


          <div class="ln_solid"></div>
          <div class="form-group">
            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="stokkaydet" class="btn btn-success">Kaydet</button>
            </div>
          </div>

        </form>



      </div>
    </div>
  </div>
</div>



</div>
</div>





<?php include 'footer.php' ?>
