<script type="text/javascript" src="assets/tinymce/tinymce.min.js"></script>
<script src="build/js/built.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="build/js/dataTables.min.js" type="text/javascript"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>  
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/json2/20140204/json2.min.js"></script>
<![endif]-->
	<!-- mettere come ultimo -->
<script src="core/validatore.js" type="text/javascript"></script>
<?php if (! isset($_GET["modal"])){?>
  <script src="core/jq.js" type="text/javascript"></script>
  <script src="core/jqSiModal.js" type="text/javascript"></script> 
<?php }else{ ?>
  <script src="core/jqSiModal.js" type="text/javascript"></script>
  <?php   //var_dump($_SERVER["QUERY_STRING"])?>
<?php }?>
