
<!-- Popup Subscribe Section Start -->
<div class="popup-subscribe-section section bg-gray pt-55 pb-55" data-modal="popup-modal">
   
    <!-- Popup Subscribe Wrap Start -->
    <div class="popup-subscribe-wrap">
        
        <button class="close-popup">X</button>
       <?php 

                    $duyurusor=$db->prepare("SELECT * FROM mainnotification ");
                    $duyurusor->execute();

                    while($duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC)) {

                        ?>
        <!-- Popup Subscribe Banner -->
      
          <div class="popup-subscribe-banner banner">
            <a href="#"><img src="admin/<?php echo $duyurucek['mainnotification_path']; ?>" alt="Banner"></a>
        </div>

        <!-- Popup Subscribe Form Wrap Start -->
        
        <div class="popup-subscribe-form-wrap">
            
            <h1><?php echo $duyurucek['mainnotification_name'] ?></h1>
           
           
            <!-- Newsletter Form -->
            <form action="#" method="post" class="popup-subscribe-form validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <label for="popup_subscribe" class="d-none">Subscribe to our mailing list</label>
                        
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                    
                </div>
            </form>
            
            <p><?php echo $duyurucek['mainnotification_content'] ?></p>
            
        </div><!-- Popup Subscribe Form Wrap End -->

    </div><!-- Popup Subscribe Wrap End -->
    <?php }?>
</div><!-- Popup Subscribe Section End -->
