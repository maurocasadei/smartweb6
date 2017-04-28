		<div class="content-wrapper">
      <form class="form-horizontal" >
									<?php
									$db->where ('adm_username', cp($_POST["adm_username"]));
									$db->where ('adm_password', md5(cp($_POST["adm_password"])));
									$result=$db->get ('admin');
									if ($db->count > 0) {
										foreach ($result as $r) {
											$_SESSION["username"]=$r["adm_username"];
											$_SESSION["livello"]=$r["adm_livello"];
											$_SESSION["logged"]=true;
										}
										printLabel($config["lang"],"lok");
                    echo "<meta http-equiv=\"Refresh\" content=\"2; url=index.php?sect=dashboard&lev=dv\">";
									}else{
										printLabel($config["lang"],"lko");
										session_destroy();
                    echo "<meta http-equiv=\"Refresh\" content=\"2; url=index.php\">";
									}
									?>
      </form>
    </div>
