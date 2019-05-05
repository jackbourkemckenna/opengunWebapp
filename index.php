<?php
require ("errors.php");

require('server.php');
require("header.php");
?>

<div id="contentContainer" class="container">
  <div class="row">
    <div id="realContent" class="col-xs-12">
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 col-sm-offset-0">
          <h1>Sign Up</h1>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 col-sm-offset-0">
          <div class="well well-lg">
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="row">
                  <div class="col-xs-12">
                    <h3>Welcome</h3></div>
                </div>
                <div class="row">
                  <!-- Instructions -->
                  <div class="col-xs-12">
                    <p class="lead">Register here <span class="text-success"></span></p>
                    <ul class="list-unstyled" style="line-height: 3; font-size: 1.4em; font-weight: 500;">
                      <li><span class="fa fa-check text-success"></span>recive free text alerts</li>
                      <li><span class="fa fa-check text-success"></span>Feel more secure</li>
              
                    </ul>
                  </div>
                </div>
              </div>
              <!-- Registration Form -->
              <div class="col-sm-6 col-xs-12">
                <div class="row">
                  <div class="col-xs-12">
                    <form id="signupForm" method="post" accept-charset="UTF-8" validate method="post" action="index.php">
											<div class="input-group">
													<span class="input-group-addon"><i class="icon-envelope icon-2x"></i></span>
													<input id="email" class="form-control input-lg" placeholder="Firstname" maxlength="100" type="text" name="firstname" validate>
												</div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon-envelope icon-2x"></i></span>
                        <input id="email" class="form-control input-lg" placeholder="Lastname" maxlength="100" type="text" name="lastname" validate>
                      </div>
											<div class="input-group">
	                        <span class="input-group-addon"><i class="icon-envelope icon-2x"></i></span>
	                        <input id="email" class="form-control input-lg" placeholder="Email" maxlength="100" type="email" name="email" validate>
	                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-asterisk icon-2x"></i></span>
                        <input id="password" class="form-control input-lg" placeholder="Password" maxlength="60" type="password" name="password_1">
                      </div>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-asterisk icon-2x"></i></span>
												<input id="password" class="form-control input-lg" placeholder="Password" maxlength="60" type="password" name="password_2">
											</div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="icon-asterisk icon-2x"></i></span>
                        <input id="phone" class="form-control input-lg" placeholder="Mobile number" maxlength="60" type="number" name="phone_num">
                      </div>
                      <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LdJRxETAAAAABZT0MUNO1r5at_-JuSGeAPTqIM6"></div>
                      </div>
                      <div class="form-group">
                        <button type="submit" id="btn-signup" class="btn btn-block btn-primary btn-lg" name="reg_user">Sign Up</button>
                      </div>
                    </form>
                    <div class="form-group">
                      <div class="topCushion">Already a member? <a href="login.php">Login</a></div>
                    </div>
                  </div>
                  <!-- /.col-xs-12 -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.col-sm-6 col-xs-12 -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.well well-lg -->
        </section>
        <!-- /.col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12 col-sm-offset-0 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /#realContent -->
  </div>
  <!-- /.row -->
</div>
<!-- /#contentContainer -->
