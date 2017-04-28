  <?php include_once("createFields.php"); ?>
	<?php include_once("{$config["includepathadmin"]}general/header.php");?>
  <?php if (! isset($_GET["modal"])){?> 
  <main class="qpc-main-content">
  <?php }?>  
	<?php include_once("{$config["includepathadmin"]}config/menu.php");?>
  <div class="content-wrapper">
    <ol class="breadcrumb breadcrumb-qpc">
      <li><a href="index.php">Home</a></li>
      <li class="active"><?php printLabel($config["lang"],$titolo); ?></li>
      <li class="active"><?php printLabel($config["lang"],$sottotitolo); ?></li>
    </ol>
  	<div class="">
  
  		<?php
        //imposto un fieldattruniqueform per i raggrupare tutti i controlli del medesimo form
        $ssfieldattruniqueform=rand(101, 200);
  			//le form sono dentro al dett del plugin relativo
  			$lev2="";
  			if (isset($_GET["lev2"])){$lev2=$_GET["lev2"];}
  			switch ($lev2){
  				case "":
  					//è in inserimento o in modifica
  					form_dv();
  					break;
  				case "salva":
  					//ha premuto salva da upd o ins
  					salva();
  					break;
  				case "remove":
  					//ha premuto salva da upd o ins
  					remove();
  					break;
  			}
  		?>
  
  	</div> 
	</div> <!-- /.content-wrapper -->
<?php if (! isset($_GET["modal"])){?> 
</main> <!-- .qpc-main-content -->
<?php }?>  
</body>
