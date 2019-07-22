<?php
include 'header.php';
$adminsor=$db->prepare("SELECT * FROM admin");
$adminsor->execute();
$say=$adminsor->rowCount();
$admincek=$adminsor->fetch(PDO::FETCH_ASSOC);


?>
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Profil <small>

            </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



                    <div class="col-md-4 col-sm-4 col-xs-12 profile_details ">
                        <div class="well profile_view">
                          <div class="col-sm-12">
                            <h4 class="brief"><i>Profil Kart</i></h4>
                            <div class="left col-xs-7">
                              <h2><?php echo $admincek['name']; ?>&nbsp;<?php echo $admincek['surname']; ?></h2>
                              <p><strong>Hakkinda: </strong> <?php echo $admincek['about']; ?></p>
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i> Address: <?php echo $admincek['address']; ?></li>
                                <li><i class="fa fa-phone"></i> Phone #: <?php echo $admincek['phone']; ?></li>
                                <li><i class="fa fa-envelope"></i> Email #: <?php echo $admincek['email']; ?></li>
                              </ul>
                            </div>
                            <div class="right col-xs-5 text-center">
                              <img src="images/saysoft.jpg" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom text-center">
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <p class="ratings">
                                <a>4.0</a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star"></span></a>
                                <a href="#"><span class="fa fa-star-o"></span></a>
                              </p>
                            </div>
                            <div class="col-xs-12 col-sm-6 emphasis">
                              <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-comments-o"></i> </button>
                              <button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-user"> </i> Profil Göster
                              </button>
                            </div>
                          </div>
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