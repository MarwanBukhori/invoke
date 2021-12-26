<?php require_once __DIR__ . '/includes/header.php'; ?>


<main class="page-main">
      <div class="section-banner section-banner--home-2">
        <div class="section-banner__bg" style="background-image: url(<?php echo base_url(); ?>assets/frontend/img/bg-banner-home-2.jpg)">
          <div class="uk-container">
            <div class="section-banner__content uk-text-center">
              <div class="section-banner__title">Explore the great places</div>
              <div class="section-banner__text">Let’s discover some great stuff & places for entertainment, eat & shop</div>
              <div class="section-banner__form">
                <form action="">
                  <div class="form-search">
                    <div class="form-search__box"> <input name="search" type="text" placeholder="Find Anything ..."><button class="uk-button uk-button-danger" type="submit">SEARCH</button></div>
                  </div>
                </form>
              </div>
              <div class="section-banner__bottom">
                <div class="popular-searches"><span class="uk-margin-small-right">What’s Popular</span>
                  <ul>
                    <li><a href="#!" data-uk-tooltip="title: Restaurant; pos: bottom"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-popular-search-1.png" alt="popular-search"></a></li>
                    <li><a href="#!" data-uk-tooltip="title: Hotel; pos: bottom"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-popular-search-2.png" alt="popular-search"></a></li>
                    <li><a href="#!" data-uk-tooltip="title: Cinema; pos: bottom"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-popular-search-3.png" alt="popular-search"></a></li>
                    <li><a href="#!" data-uk-tooltip="title: Shopping; pos: bottom"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-popular-search-4.png" alt="popular-search"></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="section-featured">
        <div class="uk-background-muted">
          <div class="uk-section-large uk-container uk-container-expand">
            
            <div class="section-content">
              <div data-uk-slider="sets: true">
                <div class="uk-position-relative" tabindex="-1">
                  <ul class="uk-slider-items uk-grid uk-grid-medium uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-child-width-1-5@xl">
                    <?php if(count($restaurants) > 0): ?>
                    <?php foreach($restaurants as $restaurant): ?>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url() . 'uploads/'. $restaurant->restaurant_photo; ?>" alt="Planet Museum" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html"><?php echo $restaurant->name; ?></a></div>
                            <div class="listing-card__intro"><?php echo $restaurant->intro; ?></div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span><?php echo $restaurant->address; ?></span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span><?php echo $restaurant->contact_number; ?></span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__works"><span><?php echo $restaurant->waiting_time ?></span></div>
                            <div class="listing-card__works"><span><?php echo ($restaurant->isOpenNow) ? 'OPEN' : 'CLOSE';   ?></span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-2.jpg" alt="ZX Shopping Mall" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                            <div class="listing-card__label"> <span>FEATURED</span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">ZX Shopping Mall</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>open</span></div>
                            <div class="listing-card__price"><span>$$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-3.jpg" alt="Grandsol Hotel" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">Grandsol Hotel</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>open</span></div>
                            <div class="listing-card__price"><span>$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-4.jpg" alt="Fadisy Restaurant" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">Fadisy Restaurant</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>open</span></div>
                            <div class="listing-card__price"><span>$$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-5.jpg" alt="Caprid Cinema" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">Caprid Cinema</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>open</span></div>
                            <div class="listing-card__price"><span>$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-1.jpg" alt="Planet Museum" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">Planet Museum</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>close</span></div>
                            <div class="listing-card__price"><span>$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-2.jpg" alt="ZX Shopping Mall" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                            <div class="listing-card__label"> <span>FEATURED</span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">ZX Shopping Mall</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>open</span></div>
                            <div class="listing-card__price"><span>$$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-3.jpg" alt="Grandsol Hotel" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">Grandsol Hotel</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>open</span></div>
                            <div class="listing-card__price"><span>$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-4.jpg" alt="Fadisy Restaurant" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">Fadisy Restaurant</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>open</span></div>
                            <div class="listing-card__price"><span>$$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="listing-card">
                        <div class="listing-card__box">
                          <div class="listing-card__media shine"><a href="05_city-place.html"><img src="<?php echo base_url(); ?>assets/frontend/img/listing-thumb-5.jpg" alt="Caprid Cinema" /></a>
                            <div class="listing-card__type"><img src="<?php echo base_url(); ?>assets/frontend/img/ico-fork.svg" alt="ico-fork" /></div>
                            <div class="listing-card__bookmark"><span class="icon-pin"></span></div>
                          </div>
                          <div class="listing-card__body">
                            <div class="listing-card__title"><a href="05_city-place.html">Caprid Cinema</a></div>
                            <div class="listing-card__intro">Best relaxtion facilities with welcome</div>
                            <div class="listing-card__location"><span class="icon-location-pin"></span><span>32 Simpson Road, NY 020103</span></div>
                            <div class="listing-card__phone"><span class="icon-call-in"></span><span>+1 (009) 236 985</span></div>
                          </div>
                          <div class="listing-card__info">
                            <div class="listing-card__rating">
                              <div class="rating-box">
                                <div class="rating-box__icon"><span class="icon-star"></span></div>
                                <div class="rating-box__desc">
                                  <div class="rating-box__title">Rating<b>4.7</b></div>
                                  <div class="rating-box__reviews">(5 reviews)</div>
                                </div>
                              </div>
                            </div>
                            <div class="listing-card__works"> <span>open</span></div>
                            <div class="listing-card__price"><span>$$</span></div>
                          </div>
                        </div>
                      </div>
                    </li> -->
                  </ul>
                </div>
                <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section-download">
        <div class="uk-container uk-container-large">
          <div class="section-download__box">
            <div class="section-download__content">
              <h3 class="uk-h3">Download The App</h3>
              <p>By using our app it’s all fun to discover some great stuff<br> & places for entertainment, eat, shop & Travel.</p>
              <div class="uk-margin-medium-top">
                <div class="uk-grid uk-grid-small uk-child-width-auto@s uk-text-center" data-uk-grid>
                  <div><img src="<?php echo base_url(); ?>assets/frontend/img/AppStore-accent.svg" alt="AppStore"></div>
                  <div><img src="<?php echo base_url(); ?>assets/frontend/img/PlayStore-accent.svg" alt="PlayStore"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="section-blog">
        <div class="uk-section-large uk-container">
          <div class="section-title uk-text-center"><span>Places & Cities Must Visit This Summer</span>
            <h3 class="uk-h3">Travel Guides </h3>
          </div>
          <div class="section-content">
            <div data-uk-slider>
              <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                <ul class="uk-slider-items uk-grid uk-grid-medium uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m">
                  <li>
                    <div class="blog-card">
                      <div class="blog-card__box">
                        <div class="blog-card__media shine"><a href="09_blog-post.html"><img src="<?php echo base_url(); ?>assets/frontend/img/blog-thumb-1.jpg" alt="How To Spend Vacations" /></a></div>
                        <div class="blog-card__body">
                          <div class="blog-card__info">
                            <div class="blog-card__category">Vacations, Break</div>
                            <div class="blog-card__author">Ben Jason</div>
                          </div>
                          <div class="blog-card__title"> <a href="09_blog-post.html">How To Spend Vacations</a></div>
                          <div class="blog-card__intro">
                            <p>Eiusmod temporl incididunt utys labore dolore magna aliqua sed enim audy</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="blog-card">
                      <div class="blog-card__box">
                        <div class="blog-card__media shine"><a href="09_blog-post.html"><img src="<?php echo base_url(); ?>assets/frontend/img/blog-thumb-2.jpg" alt="Going Around Fun-Time" /></a></div>
                        <div class="blog-card__body">
                          <div class="blog-card__info">
                            <div class="blog-card__category">Road Trips, Traveling</div>
                            <div class="blog-card__author">Ben Jason</div>
                          </div>
                          <div class="blog-card__title"> <a href="09_blog-post.html">Going Around Fun-Time</a></div>
                          <div class="blog-card__intro">
                            <p>Eiusmod temporl incididunt utys labore dolore magna aliqua sed enim audy</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="blog-card">
                      <div class="blog-card__box">
                        <div class="blog-card__media shine"><a href="09_blog-post.html"><img src="<?php echo base_url(); ?>assets/frontend/img/blog-thumb-3.jpg" alt="Watch Movies Drama in NY" /></a></div>
                        <div class="blog-card__body">
                          <div class="blog-card__info">
                            <div class="blog-card__category">Entertainment</div>
                            <div class="blog-card__author">Ben Jason</div>
                          </div>
                          <div class="blog-card__title"> <a href="09_blog-post.html">Watch Movies Drama in NY</a></div>
                          <div class="blog-card__intro">
                            <p>Eiusmod temporl incididunt utys labore dolore magna aliqua sed enim audy</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin-medium-top"></ul>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>