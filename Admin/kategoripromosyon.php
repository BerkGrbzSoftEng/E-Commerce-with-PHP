<?php
include 'header.php';
$urunsor=$db->prepare("SELECT * from product");
$urunsor->execute(array());
$say=$urunsor->rowCount();
$uruncek=$urunsor->fetchAll(PDO::FETCH_ASSOC);

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

            <h2>Kategori Promosyon <small>
            

            </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../sql/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                 

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Ad<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="category_id" required>
                  <?php foreach ($kategoricek as $key ) { ?>
                    <option value="<?php echo $key['category_id']; ?>"><?php echo $key['category_name']; ?></option>

                  <?php   }?>

                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Promosyon Yüzdesi <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="number" id="first-name" name="category_promosyon" min="1" max="100" required="required" placeholder="Yapılcak Promosyon Yüzdesini Giriniz" class="form-control col-md-7 col-xs-12">
              </div>
            </div> 
          

          <div class="ln_solid"></div>
          <div class="form-group">
            <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" name="kategoripromosyonkaydet" class="btn btn-success">Kaydet</button>
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
