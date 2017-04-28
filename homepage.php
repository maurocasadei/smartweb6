

   <!-- Section: Pricing -->
   <section id="pricing" class="bg-silver-light">
     <div class="container pb-30">
       <div class="section-title text-center">
         <div class="row">
           <div class="col-md-8 col-md-offset-2">
             <h2 class="text-uppercase mt-0 line-height-1">Pricing</h2>
             <div class="title-icon">
               <img class="mb-10" src="images/title-icon.png" alt="">
             </div>
             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
           </div>
         </div>
       </div>
       <div class="section-content">
         <div class="row">
           <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30 wow fadeInLeft animation-delay1">
             <div class="pricing-table style1 bg-white border-10px text-center">
               <div class="pricing-icon">
                 <i class="flaticon-medical-teeth1"></i>
               </div>
               <div class="p-40">
                 <h3 class="package-type mt-90">Dental Care</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                 <h1 class="price text-theme-colored mb-10">24<span class="font-48">%</span></h1>
                 <h4 class="">Discount</h4>
                 <a class="btn btn-colored btn-theme-colored text-uppercase mt-30" href="#">Get Offer!</a><br>
               </div>
             </div>
           </div>
           <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30 wow fadeInUp animation-delay1">
             <div class="pricing-table style1 bg-white border-10px text-center">
               <div class="pricing-icon">
                 <i class="flaticon-medical-hospital35"></i>
               </div>
               <div class="p-40">
                 <h3 class="package-type mt-90">Blood Test</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                 <h1 class="price text-theme-colored mb-10">15<span class="font-48">%</span></h1>
                 <h4 class="">Discount</h4>
                 <a class="btn btn-colored btn-theme-colored text-uppercase mt-30" href="#">Get Offer!</a><br>
               </div>
             </div>
           </div>
           <div class="col-xs-12 col-sm-6 col-md-4 hvr-float-shadow mb-sm-30 wow fadeInRight animation-delay1">
             <div class="pricing-table style1 bg-white border-10px text-center">
               <div class="pricing-icon">
                 <i class="flaticon-medical-stethoscopes"></i>
               </div>
               <div class="p-40">
                 <h3 class="package-type mt-90">Medical Care</h3>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                 <h2 class="price text-theme-colored mb-10">30<span class="font-48">%</span></h2>
                 <h4 class="">Discount</h4>
                 <a class="btn btn-colored btn-theme-colored text-uppercase mt-30" href="#">Get Offer!</a><br>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>

   <!-- Section: Departments -->
   <section>
     <div class="container pb-40">
       <div class="section-title text-center">
         <div class="row">
           <div class="col-md-8 col-md-offset-2">
             <h2 class="text-uppercase mt-0 line-height-1">News</h2>
             <div class="title-icon">
               <img class="mb-10" src="images/title-icon.png" alt="">
             </div>
             <p>Lista di Notizie<br> Aggiornate!</p>
           </div>
         </div>
       </div>
       <div class="row multi-row-clearfix">
         <div class="col-md-12">
           <div class="owl-carousel-4col" data-nav="true">
             <?php
             $nometabella="news";$campoID="nw_IDNews";$prefix="nw_";
             $db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
             $db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $meta->ActualLang);
             $db->where ("nw_inevidenza", 1);
             $result=$db->get ("{$nometabella} p");
             if ($db->count > 0) {
               foreach ($result as $r) {
                 ?>
                   <div class="item">
                     <div class="project mb-30">
                       <div class="thumb">
                         <img class="img-fullwidth" alt="" src="<?php echo $config["siteurl"].iflang().$r["nw_immagine"] ?>">
                         <div class="hover-link">
                           <a href="<?php echo $config["siteurl"].iflang()."newsdett/".$r["nw_IDNews"] ?>"><i class="flaticon-medical-hospital16"></i></a>
                         </div>
                       </div>
                       <div class="project-details p-15 pt-10 pb-10">
                         <h5 class="sub-title font-14 font-weight-500 mb-5"><?php echo $r["nw_claim"] ?></h5>
                         <h4 class="title font-weight-700 text-uppercase mt-0"><?php echo $r["nw_titolo"] ?></h4>
                       </div>
                     </div>
                   </div>
                   <?php
                   }
                 }
                    ?>
           </div>
         </div>
       </div>
     </div>
   </section>

   <!-- Divider: Funfact -->
   <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="http://placehold.it/1920x1280" data-parallax-ratio="0.7">
     <div class="container pt-60 pb-60">
       <div class="row">
         <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
           <div class="funfact text-center">
             <i class="pe-7s-smile mt-5 text-white"></i>
             <h2 data-animation-duration="2000" data-value="1754" class="animate-number text-white font-42 font-weight-500">0</h2>
             <h5 class="text-white text-uppercase font-weight-600">Happy Patients</h5>
           </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
           <div class="funfact text-center">
             <i class="pe-7s-rocket mt-5 text-white"></i>
             <h2 data-animation-duration="2000" data-value="675" class="animate-number text-white font-42 font-weight-500">0</h2>
             <h5 class="text-white text-uppercase font-weight-600">Our Services</h5>
           </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
           <div class="funfact text-center">
             <i class="pe-7s-add-user mt-5 text-white"></i>
             <h2 data-animation-duration="2000" data-value="248" class="animate-number text-white font-42 font-weight-500">0</h2>
             <h5 class="text-white text-uppercase font-weight-600">Our Doctors</h5>
           </div>
         </div>
         <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
           <div class="funfact text-center">
             <i class="pe-7s-global mt-5 text-white"></i>
             <h2 data-animation-duration="2000" data-value="24" class="animate-number text-white font-42 font-weight-500">0</h2>
             <h5 class="text-white text-uppercase font-weight-600">Service Points</h5>
           </div>
         </div>
       </div>
     </div>
   </section>

   <!-- Section: team -->
   <section id="team">
     <div class="container">
       <div class="row mtli-row-clearfix">
         <div class="col-md-12">
           <div class="owl-carousel-4col">
             <div class="item">
               <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                 <div class="team-thumb">
                   <img class="img-fullwidth" alt="" src="http://placehold.it/275x370">
                   <div class="team-overlay"></div>
                 </div>
                 <div class="team-details bg-silver-light pt-10 pb-10">
                   <h4 class="text-uppercase font-weight-600 m-5">Dr. Sakib Jhon</h4>
                   <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Mbbs Doctor</h6>
                   <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                     <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fa fa-skype"></i></a></li>
                   </ul>
                 </div>
               </div>
             </div>
             <div class="item">
               <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                 <div class="team-thumb">
                   <img class="img-fullwidth" alt="" src="http://placehold.it/275x370">
                   <div class="team-overlay"></div>
                 </div>
                 <div class="team-details bg-silver-light pt-10 pb-10">
                   <h4 class="text-uppercase font-weight-600 m-5">Dr. Smail Jhon</h4>
                   <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Mbbs Doctor</h6>
                   <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                     <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fa fa-skype"></i></a></li>
                   </ul>
                 </div>
               </div>
             </div>
             <div class="item">
               <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                 <div class="team-thumb">
                   <img class="img-fullwidth" alt="" src="http://placehold.it/275x370">
                   <div class="team-overlay"></div>
                 </div>
                 <div class="team-details bg-silver-light pt-10 pb-10">
                   <h4 class="text-uppercase font-weight-600 m-5">Dr. Sakib Jhon</h4>
                   <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Mbbs Doctor</h6>
                   <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                     <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fa fa-skype"></i></a></li>
                   </ul>
                 </div>
               </div>
             </div>
             <div class="item">
               <div class="team-members border-bottom-theme-color-2px text-center maxwidth400">
                 <div class="team-thumb">
                   <img class="img-fullwidth" alt="" src="http://placehold.it/275x370">
                   <div class="team-overlay"></div>
                 </div>
                 <div class="team-details bg-silver-light pt-10 pb-10">
                   <h4 class="text-uppercase font-weight-600 m-5">Dr. Smail Jhon</h4>
                   <h6 class="text-theme-colored font-15 font-weight-400 mt-0">Mbbs Doctor</h6>
                   <ul class="styled-icons icon-theme-colored icon-dark icon-circled icon-sm">
                     <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                     <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                     <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                     <li><a href="#"><i class="fa fa-skype"></i></a></li>
                   </ul>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </section>
