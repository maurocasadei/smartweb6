	<?php include_once("param.php");?>
  	<?php include_once("{$config["includepathadmin"]}general/header.php");?>
  <main class="qpc-main-content">
	<?php include_once("{$config["includepathadmin"]}config/menu.php");?>
  <div class="content-wrapper">
    <ol class="breadcrumb breadcrumb-qpc">
      <li><a href="index.php">Home</a></li>
      <li class="active"><?php printLabel($config["lang"],$titolo); ?></li>
      <li class="active"><?php printLabel($config["lang"],$sottotitolo); ?></li>
    </ol>
  	<div class="">
							<iframe  class="filemanager" width="100%" height="450" frameborder="0"
								src="filemanager/dialog.php?type=0">
							</iframe>
  	</div> 
	</div> <!-- /.content-wrapper -->
</main> <!-- .qpc-main-content -->
