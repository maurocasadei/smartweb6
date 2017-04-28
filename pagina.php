  <?php include($config["internalurlfront"]."../breadcrumbs.php");?>
  <section>
    <div class="container mt-30 mb-30 pt-30 pb-30">
      <div class="row ">
        <div class="col-md-10 col-md-offset-1">
          <div class="blog-posts">
            <div class="col-md-12">
              <div class="row list-dashed">
                <?php
                //$db->setTrace(true);
                $nometabella="contenuto";$campoID="cn_IDContenuto";$prefix="cn_";
                $db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
                $db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $meta->ActualLang);
                $db->where ("p.cn_IDContenuto", $meta->ID);
                $result=$db->get ("{$nometabella} p");
                //var_dump($db->trace);die;
                //print $db->count;
                if ($db->count > 0) {
                  foreach ($result as $r) {
                    ?>
                  <div class="entry-content p-20 pr-10">
                    <div class="entry-meta media mt-0 no-bg no-border">
                      <div class="media-body pl-15">
                        <div class="event-content pull-left flip">
                          <h1 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#"><?php echo $r["cn_titolo"] ?></a></h1>
                        </div>
                      </div>
                    </div>
                    <div class="mt-10" id="cedit"><?php echo $r["cn_testo"] ?></div>
                    <div class="clearfix"></div>
                  </div>
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
