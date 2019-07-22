<?php include 'header.php'; ?>
<div class="contact-section section mt-90 mb-40">
    <div class="container">
        <div class="row">
            
            <!-- Contact Page Title -->
            <div class="contact-page-title col mb-40">
                <h1>Merhaba <br>Bize Burdan Ulaşabilirsiniz</h1>
            </div>
        </div>
        <div class="row">
            
            <!-- Contact Tab List -->
            <div class="col-lg-4 col-12 mb-50">
                <ul class="contact-tab-list nav">
                    <li><a class="active" data-toggle="tab" href="#contact-address">İletisim Bilgileri</a></li>
                    <li><a data-toggle="tab" href="#contact-form-tab">Mesaj Yolla</a></li>
                   
                </ul>
            </div>
            
            <!-- Contact Tab Content -->
            <div class="col-lg-8 col-12">
                <div class="tab-content">
                    
                    <!-- Contact Address Tab -->
                    <div class="tab-pane fade show active row d-flex" id="contact-address">
                       
                        <div class="col-lg-4 col-md-6 col-12 mb-50">
                            <div class="contact-information">
                                <h4>Adres</h4>
                                <p><?php echo $adrescek['adress']; ?></p>
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-md-6 col-12 mb-50">
                            <div class="contact-information">
                                <h4>Telefon</h4>
                                <p><a href="tel:#"><?php echo $adrescek['phone']; ?></a><a href="tel:#"><?php echo $adrescek['phone']; ?></a></p>
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-md-6 col-12 mb-50">
                            <div class="contact-information">
                                <h4>Email</h4>
                                <p><a href="#"><?php echo $adrescek['email']; ?></a><a href="#">www.saysoft.com</a></p>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Contact Form Tab -->
                       <div class="tab-pane fade row d-flex" id="contact-form-tab">
                        <div class="col">
                            
                            <form id="contact-form" action="admin/sql/islem.php" method="POST" class="contact-form mb-50">
                                <div class="row">
                                    <div class="col-md-6 col-12 mb-25">
                                        <label for="users_name">İsim*</label>
                                        <input id="users_name" type="text" name="users_name">
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                        <label for="messages_subject">Konu*</label>
                                        <input id="messages_subject" type="text" name="messages_subject">
                                    </div>
                                    <div class="col-md-6 col-12 mb-25">
                                        <label for="users_email">Email*</label>
                                        <input id="users_email" type="email" name="users_email">
                                    </div>
                                   <!--  <div class="col-md-6 col-12 mb-25">
                                        <label for="phone_number">Telefon*</label>
                                        <input id="phone_number" type="text" name="phone_number">
                                    </div> -->
                                    <div class="col-12 mb-25">
                                        <label for="messages_content">Mesaj*</label>
                                        <textarea id="messages_content" name="messages_content"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input href="contact.php" type="submit" name="mesajgonder" value="GÖNDER">
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                            
                        </div>
                    </div>
                    
                    <!-- Contact Stores Tab -->
                    <div class="tab-pane fade row d-flex" id="store-location">

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Contact Section End -->

<?php include 'footer.php' ?>