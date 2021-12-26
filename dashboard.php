
<?php require_once __DIR__ . '/includes/header.php'; ?>
<main class="page-main">
      <div class="section-banner">
        <div class="section-banner__bg" style="background-image: url(assets/frontend/img/bg-banner-listing-item.jpg)">
          <div class="uk-container">
            <div class="section-banner__content">
              <div class="uk-grid uk-child-width-auto@m uk-flex-bottom" data-uk-grid>
                <div class="uk-width-expand@m">
                  <div class="section-banner__breadcrumb">
                    <ul class="uk-breadcrumb">
                      <li><a href="#">Restaurant</a></li>
                      <li><span>Restaurant</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <div class="page-content">
        <div class="uk-section-large uk-container">
            <div class="uk-grid uk-grid-medium uk-child-width-1-1 uk-grid-stack" data-uk-grid>
                  
            <form role="form" action="<?php echo base_url() ?>editRestaurant" method="post" enctype="multipart/form-data" id="editRestaurant">
					<input type="hidden" value="<?php echo $this->session->userdata('userId') ? $this->session->userdata('userId') : ''; ?>" name="restaurantId" id="restaurantId" />    
                        <div class="box-body">
						<div class="row"><div class="col-md-12">     
						<div class="text-center">
    			<span aria-hidden="true" class="error">*</span>&nbsp;Required field
  			</div></div>
						</div>
						
						
						<div class="row">
                                <div class=" uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="business_id">Business Id&nbsp;<span class="error">*</span></label>
                                            <input type="text" <?php echo (isset($restaurantInfo->business_id)  and !empty($restaurantInfo->business_id))? 'disabled' : ''; ?> class="form-control required uk-input" id="business_id" placeholder="Enter Business Id" value="<?php echo isset($restaurantInfo->business_id) ? $restaurantInfo->business_id : ''; ?>" name="business_id" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Email&nbsp;<span class="error">*</span></label>
                                            <input type="text" class="form-control required uk-input" id="email" placeholder="Enter Email" value="<?php echo isset( $restaurantInfo->email) ?  $restaurantInfo->email: ''; ?>" name="email" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea name="address" cols="6" rows="2" class="form-control uk-input" placeholder="Enter Address"> <?php echo isset($restaurantInfo->address) ? $restaurantInfo->address: ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="location">Location&nbsp;</label>
                                            <input type="text" class="form-control uk-input" id="location" placeholder="Enter Location" value="<?php echo isset($restaurantInfo->location) ? $restaurantInfo->location : ''; ?>" name="location" maxlength="100">
                                            <br/>
                                            <br/>   
                                            <div id='map' style='width: 100%; height: 300px;'></div>
                                            <input type="hidden" name="coordinates" value="<?php echo isset($restaurantInfo->coordinates) ? $restaurantInfo->coordinates : ''; ?>" />
                                            <script>
                                              let coordinates = $('input[name="coordinates"]').val();
                                              if (!coordinates) {
                                                    coordinates = '-79.4512, 43.6568';
                                              }
                                               mapboxgl.accessToken = 'pk.eyJ1IjoiaXJmYW44MTEiLCJhIjoiY2tiajhtYmZwMGpjaDJxcGRmZ3g5MmF5NyJ9.laxw2OAPLUlnVLsCCwRzHg';
                                                const map = new mapboxgl.Map({
                                                container: 'map',
                                                style: 'mapbox://styles/mapbox/streets-v11',
                                                center: coordinates.split(','),
                                                zoom: 13,
                                                marker: true
                                                });
                                                
                                                // Add the control to the map.
                                                let geocoder  = new MapboxGeocoder({
                                                                        accessToken: mapboxgl.accessToken,
                                                                        mapboxgl: mapboxgl,
                                                                });
                                                map.addControl(geocoder);
                                                map.on('load', () => {
                                                    geocoder.on('result', (event) => {
                                                        $('#location').val(event.result.place_name);
                                                        $('input[name="coordinates"]').val(event.result.geometry.coordinates);
                                                        
                                                    });
                                                });
                                                
                                                
                                            </script>
                                        </div>

                                    </div>
                                </div>

                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="contact_number">Contact Number&nbsp;<span class="error">*</span></label>
                                            <input type="text" class="form-control uk-input required" id="contact_number" placeholder="Enter Contact Number" value="<?php echo isset($restaurantInfo->contact_number) ? $restaurantInfo->contact_number: ''; ?>" name="contact_number" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Name&nbsp;<span class="error">*</span></label>
                                            <input type="text" class="form-control uk-input required" id="name" placeholder="Enter Name" value="<?php echo isset($restaurantInfo->name) ? $restaurantInfo->name : ''; ?>" name="name" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="operating_day">Operating Day&nbsp;<span class="error">*</span></label>
                                            <input type="text" class="form-control uk-input required" id="operating_day" placeholder="Enter Operating Day" value="<?php echo isset($restaurantInfo->operating_day) ? $restaurantInfo->operating_day: ''; ?>" name="operating_day" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="operatinghr_start">Operating Hour Start&nbsp;<span class="error">*</span></label>
                                            <input type="time" class="form-control uk-input required" id="operatinghr_start" placeholder="Enter Operating Hour Start" value="<?php echo isset($restaurantInfo->operatinghr_start) ? $restaurantInfo->operatinghr_start:''; ?>" name="operatinghr_start" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="operatinghr_start">Operating Hour End&nbsp;<span class="error">*</span></label>
                                            <input type="time" class="form-control uk-input required" id="operatinghr_end" placeholder="Enter Operating Hour End" value="<?php echo isset($restaurantInfo->operatinghr_end) ? $restaurantInfo->operatinghr_end : ''; ?>" name="operatinghr_end" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" cols="6" rows="2" class="form-control uk-textarea" placeholder="Enter Description"> <?php echo isset($restaurantInfo->description) ? $restaurantInfo->description: ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="intro">Intro</label>
                                            <textarea name="intro" cols="6" rows="2" class="form-control uk-textarea" placeholder="Enter Introduction"> <?php echo isset($restaurantInfo->intro) ? $restaurantInfo->intro: ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <h4>Image Preview</h4>
                                        <br/>
                                        <div class="preview hide">
                                            <img src="<?php echo (isset($restaurantInfo->restaurant_photo) and !empty($restaurantInfo->restaurant_photo))? base_url() . 'uploads/'.$restaurantInfo->restaurant_photo : ''  ?>" class="image_to_upload"/>
                                            <input type="hidden" name="restaurant_photo_existed" value="<?php echo (isset($restaurantInfo->restaurant_photo) and !empty($restaurantInfo->restaurant_photo))? $restaurantInfo->restaurant_photo : ''  ?>" />
                                        </div>
                                        <label for='restaurant_photo'>Restaurant Photo</label>
                                        <input type="file" accept="image/png, image/gif, image/jpeg" name="restaurant_photo" id="restaurant_photo" />
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="operating_day">Waiting Time&nbsp;</label>
                                            <input type="number" min = "0" max = "60" class="form-control uk-input required" id="waiting_time" placeholder="Table turn over duration (in minutes)" value="<?php echo isset($restaurantInfo->waiting_time) ? $restaurantInfo->waiting_time:''; ?>" name="waiting_time" maxlength="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid-margin uk-first-column">
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input <?php echo (isset($restaurantInfo->isOpenNow) and $restaurantInfo->isOpenNow == 1) ? 'checked="checked"':'' ?> type="checkbox" class="form-control uk-checkbox" id="isOpenNow"  name="isOpenNow">
                                            <label for="isOpenNow">is open now?</label>
                                        </div>
                                    </div>
                                </div>

      
							
                        </div><!-- /.box-body -->
                        <div class="uk-grid-margin uk-first-column">
                            <div class="box-footer">
                                <input type="submit" class="btn uk-button btn-primary" value="Submit" />&nbsp;&nbsp;
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</main>
