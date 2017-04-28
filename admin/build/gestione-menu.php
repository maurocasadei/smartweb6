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

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modifica menù</h4>
            </div>			<!-- /modal-header -->
            <div class="modal-body">

<div class="row margin-top-40">
      <div class="col-sm-3 col-md-3" >
        <fieldset disabled>
         <label for="disabledTextInput">Id menu</label>
         <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input" disabled>
        </fieldset>
      </div>
      <div class="col-sm-3 col-md-3" >
        <label for="">Tipo menu</label>
        <select class="form-control">
         <option>alto</option>
         <option>basso</option>
       </select>
      </div>
      <div class="col-sm-3 col-md-3" >
        <label for="">Menù padre</label>
         <select class="form-control">
          <option>Azienda</option>
          <option>Chi-siamo</option>
          <option>Azienda</option>
          <option>Chi-siamo</option>
          <option>Azienda</option>
          <option>Chi-siamo</option>
        </select>
      </div>
      <div class="col-sm-3 col-md-3" >
        <label for="">Pagina richiamata</label>
         <select class="form-control">
           <option>Azienda</option>
           <option>Chi-siamo</option>
           <option>Azienda</option>
           <option>Chi-siamo</option>
           <option>Azienda</option>
           <option>Chi-siamo</option>
        </select>
      </div>
    </div>

    <!-- Nav tabs -->
    <div class="qpc-tabs">
      <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" id="slug" class="form-control" placeholder="">
       <label>
       <input type="checkbox" value="">
       Menù visibile
     </label>
      </div>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#Ita" aria-controls="Ita" role="tab" data-toggle="tab">Ita</a></li>
        <li role="presentation"><a href="#Eng" aria-controls="Eng" role="tab" data-toggle="tab">Eng</a></li>
        <li role="presentation"><a href="#Deu" aria-controls="Deu" role="tab" data-toggle="tab">Deu</a></li>
      </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="Ita">
        <input type="text" id="disabledTextInput" class="form-control" placeholder="Nome">
      </div>
      <div role="tabpanel" class="tab-pane fade" id="Eng">
        <input type="text" id="disabledTextInput" class="form-control" placeholder="Name" >
      </div>
      <div role="tabpanel" class="tab-pane fade" id="Deu">
        <input type="text" id="disabledTextInput" class="form-control" placeholder="Namen" >
      </div>
    </div>
    </div><!-- .qpc-tabs -->

  </div>			<!-- /modal-body -->
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                  <button id="success" class="btn btn-success">
                      <i class="glyphicon glyphicon-save"></i> Salva
                  </button>
                </div>			<!-- /modal-footer -->
          </div>         <!-- /modal-content -->


<?php
	include_once("script.php");
	?>
</body>
</html>
