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
  <li class="active">Gestione news</li>
</ol>

<div class="row margin-top-40">
      <div class="col-md-4" >
        <fieldset disabled>
         <label for="disabledTextInput">Id menu</label>
         <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
        </fieldset>
      </div>
      <div class="col-md-4" >
        <label for="titolo">Titolo</label>
        <input type="text" class="form-control" id="titolo" placeholder="titolo">
      </div>
      <div class="col-md-4" >
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" placeholder="slug">
      </div>
      <div class="col-md-4" >
        <fieldset disabled>
          <label for="ordineNews">Ordine</label>
          <input type="number" class="form-control" id="ordineNews" placeholder="">
        </fieldset>
      </div>
      <div class="col-md-4" >
        <label for="data">Data</label>
        <input type="text" class="form-control datepicker" id="datepicker" placeholder="">
      </div>
      <div class="col-md-4" >
        <label for="scadenza">Scadenza</label>
        <input type="text" class="form-control datepicker" id="datepicker" placeholder="">
      </div>
      <div class="col-md-4">
        <label for="exampleInputFile">Immagine</label>
        <input type="file" id="exampleInputFile">
        <input type="checkbox"> Elimina
      </div>
      <div class="col-md-4">
        <label for="exampleInputFile">File PDF</label>
        <input type="file" id="exampleInputFile">
        <input type="checkbox"> Elimina
      </div>
      <div class="col-md-4 checkboxNews">
        <label>
          <input type="checkbox"> In evidenza
        </label>
      </div>
    </div>

<div class="qpc-tab">

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Ita</a></li>
    <li><a data-toggle="tab" href="#menu1">Eng</a></li>
    <li><a data-toggle="tab" href="#menu2">Deu</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <textarea class="qpc-editor">
    </textarea>
    <div class="row">
      <div class="col-md-6">
        <label for="inputPassword3" class="">K-word</label>
        <textarea class="form-control" rows="3"></textarea>
      </div>
      <div class="col-md-6">
        <label for="inputPassword3" class="">description</label>
        <textarea class="form-control" rows="3"></textarea>
      </div>
    </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <textarea class="qpc-editor">
      </textarea>
      <div class="row">
        <div class="col-md-6">
          <label for="inputPassword3" class="">K-word</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
        <div class="col-md-6">
          <label for="inputPassword3" class="">description</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
      </div>
    </div>
    <div id="menu2" class="tab-pane fade">
      <textarea class="qpc-editor">
      </textarea>
      <div class="row">
        <div class="col-md-6">
          <label for="inputPassword3" class="">K-word</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
        <div class="col-md-6">
          <label for="inputPassword3" class="">description</label>
          <textarea class="form-control" rows="3"></textarea>
        </div>
      </div>
    </div>
  </div>

<div id="toolbar">
    <button id="success" class="btn btn-success">
        <i class="glyphicon glyphicon-save"></i> Salva
    </button>
</div>

</div><!-- chiudo .qpc-tab -->



      </div> <!-- chiudo  .content-wrapper -->
      </main> <!-- chiudo  .qpc-main-content -->

      <?php
       include_once("footer.php");
       ?>

<?php
	include_once("script.php");
	?>
</body>
</html>
