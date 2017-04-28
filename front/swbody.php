  <body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
	<?php include($config["internalurlfront"]."../menu.php");?>
  <!-- Start main-content -->
  <div class="main-content">
    	<?php

    		if (is_file($meta->Pagename)){
    			include_once($meta->Pagename);
    		}else{

    			echo "404 Pagina non trovata o metodo non supportato";
    		}
    	?>
  </div>
  <!-- end main-content -->

	<?php include_once($config["internalurlfront"]."../footer.php");?>
    </body>
</html>
