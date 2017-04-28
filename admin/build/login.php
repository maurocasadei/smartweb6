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

		<div class="content-wrapper">

      <form class="form-horizontal" data-toggle="validator" role="form">
        <h1 class="title-login"><a href="index.php">Sidious Cms</a></h1>

        <div class="form-group input-group has-feedback">
         <span class="input-group-addon" id="sizing-addon2">  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </span>
         <input type="text" class="form-control" id="inputName" placeholder="Username" data-error="Inserisci username" aria-describedby="sizing-addon2" required>
         <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
         <div class="help-block with-errors"></div>
       </div>

       <div class="form-group input-group has-feedback">
        <span class="input-group-addon" id="sizing-addon2">  <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> </span>
        <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" data-error="Password errata" aria-describedby="sizing-addon2" required>
        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
        <div class="help-block with-errors"></div>
      </div>

        <div class="form-group">
          <div class="checkbox">
              <label>
                <input type="checkbox" id="terms" required> Ricordami
              </label>
          </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Accedi
            <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
            </button>
        </div>
      </form>

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
