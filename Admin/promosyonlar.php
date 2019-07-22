<?php include 'header.php' ?>


  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              

           
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                <div class="x_title">
            <h2>Promosyon Listeleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>
           
          </div>

                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing ">
                            <div class="title">
                              <h3>Kategori Bazli İndirim</h3>

                            </div>
                            <div class="x_content">
                              <div class="">
                               
                              </div>
                              <div class="pricing_footer">
                                <a href="kategoripromosyon.php" class="btn btn-success btn-block" role="button">Git</a>
                              
                              </div>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing ">
                            <div class="title">
                              <h3>Ürün Bazli İndirim</h3>

                            </div>
                            <div class="x_content">
                              <div class="">
                               
                              </div>
                              <div class="pricing_footer">
                                <a href="urunpromosyon.php" class="btn btn-success btn-block" role="button">Git</a>
                              
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

  

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


<?php include 'footer.php' ?>