
<?php require_once __DIR__ . '/includes/header.php'; ?>
<main class="page-main">

      <div class="section-banner">
        <div class="section-banner__bg" style="background-image: url(./../assets/frontend/img/bg-banner-listing-item.jpg)">
          <div class="uk-container">
            <div class="section-banner__content">
              <div class="uk-grid uk-child-width-auto@m uk-flex-bottom" data-uk-grid>
                <div class="uk-width-expand@m">
                  <div class="section-banner__breadcrumb">
                    <ul class="uk-breadcrumb">
                      <li><a href="#">My Dashboard</a></li>
                      <li><span>Restaurant <?php echo isset($restaurantInfo->name) ? $restaurantInfo->name:''; ?></span></li>
                    </ul>
                  </div>
                  <div class="section-banner__title">Restaurant <?php echo isset($restaurantInfo->name) ? $restaurantInfo->name:''; ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <<div class="page-content">

        <div class="uk-section-large uk-container">
          <div class="uk-grid uk-grid-medium" data-uk-grid>
            <div class="uk-width-2-3@m">
              <div class="section-city-place">
                <div class="uk-h3"><img class="logo__img" src="<?php echo base_url(); ?>assets/frontend/img/iconpicture.png" width="30" height="30" alt="Doremi">&nbsp Photo</div>
                <div data-uk-slideshow="min-height: 500; max-height: 700">
                  <div class="uk-position-relative">
                    <ul class="uk-slideshow-items uk-child-width-1-1" data-uk-lightbox="animation: scale">
                      <li class="uk-border-rounded"><?php if (isset($restaurantInfo->restaurant_photo) and !empty($restaurantInfo->restaurant_photo)): ?><img class="uk-width-1-1" src="<?php echo base_url() .'uploads/'. $restaurantInfo->restaurant_photo ?>" alt="img-gallery" data-uk-cover><?php endif; ?></li>
                      
                  </div>
                  
                </div>
              </div>
                <hr class="uk-margin-large">
              <div class="section-city-place">
                <div class="uk-h3"><img class="logo__img" src="<?php echo base_url(); ?>assets/frontend/img/icondiamond.png" width="40" height="40" alt="Doremi">&nbsp Business ID</div>
                <?php echo isset($restaurantInfo->business_id) ? $restaurantInfo->business_id: ''; ?>
                <div class="uk-visible@m">
                      <div class="uk-flex uk-flex-middle uk-flex-center uk-height-1-1"></div>
                    </div>
                  <hr class="uk-margin-large">
              <div class="section-city-place">
                <div class="uk-h3"><img class="logo__img" src="<?php echo base_url(); ?>assets/frontend/img/iconcontact.png" width="30" height="30" alt="Doremi">&nbsp Contact</div>
                Address - <br><?php echo isset($restaurantInfo->address)? $restaurantInfo->address:''; ?><br><br>
                Location - <br><?php echo isset($restaurantInfo->location) ? $restaurantInfo->location: ''; ?><br><br>

                Contact Number - <br><?php echo isset( $restaurantInfo->contact_number) ?  $restaurantInfo->contact_number:''; ?>

                <hr class="uk-margin-large">
              <div class="section-city-place">
                <div class="uk-h3"><img class="logo__img" src="<?php echo base_url(); ?>assets/frontend/img/icondetails.png" width="30" height="30" alt="Doremi">&nbsp Details</div>
                Operating Day: <?php echo isset($restaurantInfo->operating_day) ? $restaurantInfo->operating_day: ''; ?>
                <br><br>Operating Hour <br>Start - <?php echo isset($restaurantInfo->operatinghr_start) ? $restaurantInfo->operatinghr_start: ''; ?><br>End - <?php echo isset($restaurantInfo->operatinghr_end)? $restaurantInfo->operatinghr_end:''; ?>

                <hr class="uk-margin-large">
              <div class="section-city-place">
                <div class="uk-h3"><img class="logo__img" src="<?php echo base_url(); ?>assets/frontend/img/icondetails.png" width="30" height="30" alt="Doremi">&nbsp Restaurant Description</div>
                <?php echo isset($restaurantInfo->description) ? $restaurantInfo->description: ''; ?>

                <hr class="uk-margin-large">
              <div class="section-city-place">
                <div class="uk-h3"><img class="logo__img" src="<?php echo base_url(); ?>assets/frontend/img/icondetails.png" width="30" height="30" alt="Doremi">&nbsp Restaurant Intro</div>
                <?php echo isset($restaurantInfo->intro) ? $restaurantInfo->intro: ''; ?>
                <hr class="uk-margin-large">
              <div class="section-city-place">
                <div class="uk-h3"><img class="logo__img" src="<?php echo base_url(); ?>assets/frontend/img/iconclock.png" width="30" height="30" alt="Doremi">&nbsp Waiting Time</div>
                <?php echo isset($restaurantInfo->waiting_time) ? $restaurantInfo->waiting_time: ''; ?> minutes

            </div>
        </div>
    </div>
</main>
