<!-- Footer -->
<footer id="footer" class="footer" data-bg-img="images/footer-bg.png" data-bg-color="#25272e">
  <div class="container pt-70 pb-40">
    <div class="row">
      <div class="col-sm-6 col-md-3">
        <div class="widget dark"> <img alt="" src="images/logo-wide-white.png">
          <p class="font-12 mt-10 mb-10">Medikal is a library of health and medical templates with predefined web elements which helps you to build your medical templates best site</p>
          <a class="btn btn-default btn-transparent btn-xs btn-flat mt-5" href="#">Read more</a>
          <ul class="styled-icons icon-dark icon-theme-colored icon-circled icon-sm mt-20">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-skype"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h5 class="widget-title line-bottom-theme-colored-2">Latest News</h5>
          <div class="latest-posts">
            <article class="post media-post clearfix pb-0 mb-10">
              <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
              <div class="post-right">
                <h5 class="post-title mt-0 mb-5"><a href="#">Sustainable Construction</a></h5>
                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
              </div>
            </article>
            <article class="post media-post clearfix pb-0 mb-10">
              <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
              <div class="post-right">
                <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
              </div>
            </article>
            <article class="post media-post clearfix pb-0 mb-10">
              <a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
              <div class="post-right">
                <h5 class="post-title mt-0 mb-5"><a href="#">Storefront Installations</a></h5>
                <p class="post-date mb-0 font-12">Mar 08, 2015</p>
              </div>
            </article>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h5 class="widget-title line-bottom-theme-colored-2">Quick Contact</h5>
          <form id="footer_quick_contact_form" name="footer_quick_contact_form" class="quick-contact-form" action="includes/quickcontact.php" method="post">
            <div class="form-group">
              <input name="form_email" class="form-control" type="text" required="" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <textarea name="form_message" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
            </div>
            <div class="form-group">
              <input name="form_botcheck" class="form-control" type="hidden" value="" />
              <button type="submit" class="btn btn-default btn-transparent btn-xs btn-flat mt-0" data-loading-text="Please wait...">Send Message</button>
            </div>
          </form>

          <!-- Quick Contact Form Validation-->
          <script type="text/javascript">
            $("#footer_quick_contact_form").validate({
              submitHandler: function(form) {
                var form_btn = $(form).find('button[type="submit"]');
                var form_result_div = '#form-result';
                $(form_result_div).remove();
                form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                var form_btn_old_msg = form_btn.html();
                form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                $(form).ajaxSubmit({
                  dataType:  'json',
                  success: function(data) {
                    if( data.status == 'true' ) {
                      $(form).find('.form-control').val('');
                    }
                    form_btn.prop('disabled', false).html(form_btn_old_msg);
                    $(form_result_div).html(data.message).fadeIn('slow');
                    setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                  }
                });
              }
            });
          </script>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h5 class="widget-title line-bottom-theme-colored-2">Opening Hours</h5>
          <div class="opening-hours">
            <ul class="list list-border">
              <li class="clearfix"> <span><i class="fa fa-clock-o mr-5"></i> Mond - Tuesday :</span>
                <div class="value pull-right"> 9.00 am - 10.00 pm </div>
              </li>
              <li class="clearfix"> <span class="text-theme-color-2"><i class="fa fa-clock-o mr-5"></i> Wednes - Thurs </span>
                <div class="value pull-right text-white"> 10.00 am - 8.00 pm </div>
              </li>
              <li class="clearfix"> <span><i class="fa fa-clock-o mr-5"></i> Sat - Monday :</span>
                <div class="value pull-right"> 9.00 am - 10.00 pm </div>
              </li>
              <li class="clearfix"> <span><i class="fa fa-clock-o mr-5"></i> Sunday :</span>
                <div class="value pull-right"> <span class="text-highlight bg-theme-colored text-white">Colsed</span>  </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-theme-colored p-20">
    <div class="row text-center">
      <div class="col-md-12">
        <p class="text-white font-11 m-0">Copyright &copy;2016 ThemeMascot. All Rights Reserved</p>
      </div>
    </div>
  </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<!-- external javascripts -->

<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="js/custom.js"></script>
<script src="js/smartweb6.js"></script>
</html>
