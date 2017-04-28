  <?php include($config["internalurlfront"]."../breadcrumbs.php");?>
  <section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
      <div class="row ">
        <div class="col-md-10 col-md-offset-1">
          <div class="blog-posts">
            <div class="col-md-12">
              <div class="row list-dashed">
                <?php
                $nometabella="news";$campoID="nw_IDNews";$prefix="nw_";
                $db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
                $db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $meta->ActualLang);
                //$db->where ("mn_livello", 1);
                $result=$db->get ("{$nometabella} p");
                if ($db->count > 0) {
                  foreach ($result as $r) {
                    ?>

                    <article class="post clearfix mb-30 bg-lighter">
                  <div class="entry-header">
                    <div class="post-thumb thumb">
                      <img src="<?php echo $r["nw_immagine"] ?>" alt="" class="img-responsive img-fullwidth">
                    </div>
                  </div>
                  <div class="entry-content p-20 pr-10">
                    <div class="entry-meta media mt-0 no-bg no-border">
                      <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                        <ul>
                          <li class="font-16 text-white font-weight-600">28</li>
                          <li class="font-12 text-white text-uppercase">Feb</li>
                        </ul>
                      </div>
                      <div class="media-body pl-15">
                        <div class="event-content pull-left flip">
                          <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#"><?php echo $r["nw_titolo"] ?></a></h4>
                          <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>
                          <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
                        </div>
                      </div>
                    </div>
                    <p class="mt-10"><?php echo $r["nw_claim"] ?></p>
                    <a href="<?php echo $config["siteurl"].iflang()."newsdett/".$r["nw_IDNews"] ?>" class="btn-read-more">Read more</a>
                    <div class="clearfix"></div>
                  </div>
                </article>
                  <?php
                  }
                }
                   ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
