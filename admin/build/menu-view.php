<!doctype html>
<html lang="it-IT" class="no-js" prefix="og: http://ogp.me/ns" >
<head>
<meta charset="UTF-8">
<title>qpc admin panel</title>
<link rel="canonical" href="http://localhost:8888/qpc_dev/qpc_admin_panel" />
<meta property="fb:app_id" content="245341035557973">
<meta property="og:locale" content="it_IT" />
<meta property="og:type" content="website" />
<meta property="og:title" content="qpc admin panel" />
<meta property="og:description" content="" />
<meta property="og:url" content="http://localhost:8888/qpc_dev/qpc_admin_panel" />
<meta property="og:site_name" content="qpc admin panel" />
<meta property="og:image" content="" />
<meta property="og:image" content="" />
<meta property="og:image" content="" />
<meta property="og:image" content="" />
<meta name="description" content="" />
<meta name="keywords" content=""/>
 <?php
include_once("link.php");
?>
</head>
<body class="">
<?php
   include_once("header.php");
?>
<?php
 include_once("menu.php");
?>
		<div class="content-wrapper">

<ol class="breadcrumb breadcrumb-qpc">
  <li><a href="index.php">Home</a></li>
  <li class="active">Gestione menu</li>
</ol>

<h1>Sidious Cms</h1>

<div id="toolbar">
   <a data-toggle="modal" class="btn btn-primary" data-show="true" href="gestione-menu.php" data-target="#myModal">
       <i class="glyphicon glyphicon-plus"></i> Inserisci
   </a>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

              <ol class='nested_with_switch vertical'>
                <li>
                  Item 1
                  <div class="wrap-icon-menu">
                    <a class="btn-margin insert btn-sm btn-primary" href="javascript:void(0)"  title="insert">
            				 <i class="glyphicon glyphicon-plus"></i>
            				</a>
            				<a class="btn-margin duplicate btn-sm btn-info" href="javascript:void(0)" title="duplicate">
            				<i class="glyphicon glyphicon-duplicate"></i>
            				</a>
            				<a class="btn-margin remove btn-sm btn-danger" href="javascript:void(0)" title="Remove">
            				<i class="glyphicon glyphicon-remove"></i>
            				</a>
                 </div>
                  <ol></ol>
                </li>
                <li>
                  Item 2
                  <div class="wrap-icon-menu">
                    <a class="btn-margin insert btn-sm btn-primary" href="javascript:void(0)"  title="insert">
                     <i class="glyphicon glyphicon-plus"></i>
                    </a>
                    <a class="btn-margin duplicate btn-sm btn-info" href="javascript:void(0)" title="duplicate">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    </a>
                    <a class="btn-margin remove btn-sm btn-danger" href="javascript:void(0)" title="Remove">
                    <i class="glyphicon glyphicon-remove"></i>
                    </a>
                 </div>
                    <ol></ol>
                </li>
                <li>
                  Item 3
                  <div class="wrap-icon-menu">
                    <a class="btn-margin insert btn-sm btn-primary" href="javascript:void(0)"  title="insert">
                     <i class="glyphicon glyphicon-plus"></i>
                    </a>
                    <a class="btn-margin duplicate btn-sm btn-info" href="javascript:void(0)" title="duplicate">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    </a>
                    <a class="btn-margin remove btn-sm btn-danger" href="javascript:void(0)" title="Remove">
                    <i class="glyphicon glyphicon-remove"></i>
                    </a>
                 </div>
                    <ol></ol>
                </li>
                <li>
                  Item 4
                  <div class="wrap-icon-menu">
                    <a class="btn-margin insert btn-sm btn-primary" href="javascript:void(0)"  title="insert">
                     <i class="glyphicon glyphicon-plus"></i>
                    </a>
                    <a class="btn-margin duplicate btn-sm btn-info" href="javascript:void(0)" title="duplicate">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    </a>
                    <a class="btn-margin remove btn-sm btn-danger" href="javascript:void(0)" title="Remove">
                    <i class="glyphicon glyphicon-remove"></i>
                    </a>
                 </div>
                  <ol></ol>
                </li>
                <li>
                  Item 5
                  <div class="wrap-icon-menu">
                    <a class="btn-margin insert btn-sm btn-primary" href="javascript:void(0)"  title="insert">
                     <i class="glyphicon glyphicon-plus"></i>
                    </a>
                    <a class="btn-margin duplicate btn-sm btn-info" href="javascript:void(0)" title="duplicate">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    </a>
                    <a class="btn-margin remove btn-sm btn-danger" href="javascript:void(0)" title="Remove">
                    <i class="glyphicon glyphicon-remove"></i>
                    </a>
                 </div>
                  <ol></ol>
                </li>
                <li>
                  Item 6
                  <div class="wrap-icon-menu">
                    <a class="btn-margin insert btn-sm btn-primary" href="javascript:void(0)"  title="insert">
                     <i class="glyphicon glyphicon-plus"></i>
                    </a>
                    <a class="btn-margin duplicate btn-sm btn-info" href="javascript:void(0)" title="duplicate">
                    <i class="glyphicon glyphicon-duplicate"></i>
                    </a>
                    <a class="btn-margin remove btn-sm btn-danger" href="javascript:void(0)" title="Remove">
                    <i class="glyphicon glyphicon-remove"></i>
                    </a>
                 </div>
                  <ol></ol>
                </li>
              </ol>


<div id="toolbar">
    <button id="success" class="btn btn-success">
        <i class="glyphicon glyphicon-save"></i> Salva
    </button>
</div>

      </div> <!-- .content-wrapper -->
      </main> <!-- .qpc-main-content -->

      <?php
       include_once("footer.php");
       ?>

<?php
	include_once("script.php");
	?>
</body>
</html>
