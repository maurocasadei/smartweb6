		<div class="content-wrapper">

      <form class="form-horizontal" data-toggle="validator" role="form" id="loginForm" method="POST" >
        <h1 class="title-login"><a href="index.php"><?php printLabel($config["lang"],"l0")?></a></h1>

        <div class="form-group input-group has-feedback">
         <span class="input-group-addon" id="sizing-addon2">  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> </span>
         <input type="text" class="form-control" required="" value="" name="adm_username" id="adm_username"  placeholder="Username" data-error="<?php printLabel($config["lang"],"l3")?>" aria-describedby="sizing-addon2" required>
         <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
         <div class="help-block with-errors"></div>
       </div>

       <div class="form-group input-group has-feedback">
        <span class="input-group-addon" id="sizing-addon2">  <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> </span>
        <input type="password" data-minlength="6" class="form-control" value="" name="adm_password" id="adm_password" placeholder="Password" data-error="<?php printLabel($config["lang"],"l6")?>" aria-describedby="sizing-addon2" required>
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
          <button tipo="login" class="btn btn-primary btn-block" lev="chk"><?php printLabel($config["lang"],"l7")?>
          <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
          </button>
      </div>
    </form>

  </div> <!-- .content-wrapper -->

