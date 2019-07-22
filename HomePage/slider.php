
<!-- Cart Overlay -->
<div class="cart-overlay"></div>

<!-- Hero Section Start -->
<div class="hero-section section mb-30">
	<div class="container">
		<div class="row">
			<div class="col">

				<!-- Hero Slider Start -->
				<div class="hero-slider hero-slider-one">

					<!-- Hero Item Start -->
					<?php 

					$slidersor=$db->prepare("SELECT * FROM slider WHERE slider_alignment ORDER by slider_alignment asc");
					$slidersor->execute();
					while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) {

						?>
						<div class="hero-item">
							<div class="row align-items-center justify-content-between">

								<!-- Hero Content -->
								<div class="hero-content col">

									<h2>ACELE ET!</h2>
									<h1><span><?php echo $slidercek['slider_name'] ?></span></h1>
									<h1> <span class="big">29%</span> Durumda</h1>
							

								</div>

								<!-- Hero Image -->
								<div class="hero-image col">
									<img src="admin/<?php echo $slidercek['slider_path']; ?>" alt="Hero Image">
								</div>

							</div>     
						</div><!-- Hero Item End -->
					<?php }?>

				</div><!-- Hero Slider End -->
