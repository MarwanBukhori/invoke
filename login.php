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
                      <li><a href="#">Login</a></li>
                      <li><span>Restaurants Login</span></li>
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

          
          <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo base_url(); ?>"><b>Restaurant System</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><strong>Sign In</strong></p>
        <?php $this->load->helper('form'); ?>
        <div class="row">
            <div class="col-md-12">
                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
            </div>
        </div>
        <?php
        $this->load->helper('form');
        $error = $this->session->flashdata('error');
        if($error)
        {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error; ?>                    
            </div>
        <?php }
        $success = $this->session->flashdata('success');
        if($success)
        {
            ?>
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $success; ?>                    
            </div>
        <?php } ?>
        <form action="<?php echo base_url(); ?>loginMe" method="post">
        <div class="uk-first-column">
          <div class="form-group has-feedback">
            <input type="email" class="uk-input form-control" placeholder="Email" name="email" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          </div>
          <div class="uk-grid-margin uk-first-column">
          <div class="form-group has-feedback">
            <input type="password" class="uk-input form-control" placeholder="Password" name="password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          </div>
          <div class="uk-grid-margin uk-first-column">
          <div class="row">
            <div class="col-xs-8">    
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>  -->                       
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn uk-button btn-primary btn-block btn-flat" value="Sign In" />
            </div><!-- /.col -->
          </div>
        </div>
        </form>

        <a href="<?php echo base_url() ?>register">Register</a><br>
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    

          </div> 
        </div> 
    </div>
</main>

