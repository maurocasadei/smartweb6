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
 include_once("config/menu.php");
?>
		<div class="content-wrapper">

<ol class="breadcrumb breadcrumb-qpc">
  <li><a href="index.php">Home</a></li>
  <li class="active">Dashboard</li>
</ol>

			<h1>Sidious Cms</h1>


      <div class="">
          <div id="toolbar">
                <a href="pagine.php"><button id="insert" class="btn btn-primary">
                <i class="glyphicon glyphicon-plus"></i> Inserisci
              </button>
              </a>
              <button id="remove" class="btn btn-danger">
                  <i class="glyphicon glyphicon-remove"></i> Cancella
              </button>
          </div>

          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#accordion" aria-expanded="false" aria-controls="collapseExample">
            Ricerca tramite query
          </button>
          <div class="collapse" id="accordion">
            <div class="well">
              <form class="form-inline" data-toggle="validator" role="form">

                <div class="form-group has-feedback ">
                <label for="user" class="control-label">Campo1</label>
                <input type="text" class="form-control placeholder" id="user" placeholder="" data-error="Devi inserire un username!" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>

                <div class="form-group has-feedback ">
                <label for="user" class="control-label">Campo2</label>
                <input type="text" class="form-control" id="user" placeholder="Campo2" data-error="Devi inserire un username!" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                  Cerca</button>
                  <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                  <div class="help-block with-errors"></div>
                  </div>
            </form>

            <form class="form-inline margin-top-20" data-toggle="validator" role="form">

              <div class="form-group has-feedback ">
              <label for="user" class="control-label">Campo1</label>
              <input type="text" class="form-control placeholder" id="user" placeholder="" data-error="Devi inserire un username!" required>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              <div class="help-block with-errors"></div>
              </div>

              <div class="form-group has-feedback ">
              <label for="user" class="control-label">Campo2</label>
              <input type="text" class="form-control" id="user" placeholder="Campo2" data-error="Devi inserire un username!" required>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              <div class="help-block with-errors"></div>
              </div>

              <div class="form-group">
              <button type="submit" class="btn btn-primary">
                  <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                Cerca</button>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
                </div>
          </form>

            </div>
          </div>

          <table id="table"
                 data-toolbar="#toolbar"
                 data-search="true"
                 data-show-refresh="true"
                 data-show-toggle="true"
                 data-show-columns="true"
                 data-show-export="true"
                 data-detail-view="true"
                 data-detail-formatter="detailFormatter"
                 data-minimum-count-columns="2"
                 data-show-pagination-switch="true"
                 data-pagination="true"
                 data-icon-size="sm"
                 data-id-field="id"
                 data-page-list="[10, 25, 50, 100, ALL]"
                 data-show-footer="true"
                 data-side-pagination="server"
                 data-url="http://issues.wenzhixin.net.cn/examples/bootstrap_table/data"
                 data-mobile-responsive="true"
                 data-response-handler="responseHandler"
                 >
          </table>
      </div>


      </div> <!-- .content-wrapper -->
      </main> <!-- .qpc-main-content -->

      <?php
       include_once("footer.php");
       ?>

<?php
	include_once(" .php");
	?>
</body>
</html>
