<!-- Header -->
<header id="header" class="header">
  <div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
      <div class="container">
        <nav id="menuzord-right" class="menuzord blue bg-lightest">
          <a class="menuzord-brand pull-left flip" href="javascript:void(0)">
            <img src="images/logo-wide.png" alt="">
          </a>
          <div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-gray"></i></a></div>
          <ul class="menuzord-menu">
            <?php
            //$db->setTrace(true);
            $nometabella="menu";$campoID="mn_IDMenu";$prefix="mn_";
            $db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
            $db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $meta->ActualLang);
            $db->where ("mn_livello", 1);
            $result=$db->get ("{$nometabella} p");
            //var_dump($db->trace);die;
            if ($db->count > 0) {
              foreach ($result as $r) {
                $r["mn_nome"];
                $pagename=trovaContenutoDaMenu($r["mn_IDMenu"]);
                echo "<li class=\"active\"><a href=\"{$pagename}\">{$r["mn_nome"]}</a>";
                  //2 livello
                  $db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
                  $db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $config["languageprimary"]);
                  $db->where ("mn_livello", 2);
                  $db->where ("mn_IDPadre", $r["mn_IDMenu"]);
                  $result2=$db->get ("{$nometabella} p");
                  if ($db->count > 0) {
                    echo "<ul class=\"dropdown\">";
                    foreach ($result2 as $r2) {
                      $pagename=trovaContenutoDaMenu($r2["mn_IDMenu"]);
                      echo "<li><a href=\"{$pagename}\">{$r2["mn_nome"]}</a>";
                        //3 livello
                        $db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
                        $db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $config["languageprimary"]);
                        $db->where ("mn_livello", 3);
                        $db->where ("mn_IDPadre", $r2["mn_IDMenu"]);
                        $result3=$db->get ("{$nometabella} p");
                        if ($db->count > 0) {
                          echo "<ul class=\"dropdown\">";
                          foreach ($result3 as $r3) {
                            $pagename=trovaContenutoDaMenu($r3["mn_IDMenu"]);
                            echo "<li><a href=\"{$pagename}\">{$r3["mn_nome"]}</a></li>";
                          }
                          echo "</ul>";
                        }
                      echo "</li>";
                    }
                    echo "</ul>";
                  }
                echo "</li>";
              }
            }
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>
