<?php
function iflang(){
  global $config,$meta;
  if ($config["langYes"]){
    return $meta->ActualLang."/";
  }else{
    return "";
  }
}
function trovaContenutoDaMenu($IDMenu){
  global $db,$meta,$config;
  //$db->setTrace(true);
  $pagename="#";
  $nometabella="menu";$campoID="mn_IDMenu";$prefix="mn_";
  $db->join("{$nometabella}_data d", "d.{$campoID}=p.{$campoID}", "LEFT");
  $db->joinWhere("{$nometabella}_data d", "d.{$prefix}language", $meta->ActualLang);
  $db->join("contenuto cp", "cp.cn_IDContenuto=p.mn_IDContenuto", "LEFT");
  $db->join("contenuto_data cd", "cp.cn_IDContenuto=cd.cn_IDContenuto", "LEFT");
  $db->joinWhere("contenuto_data", "cd.cn_language", $meta->ActualLang);
  $db->where ("p.mn_IDMenu", $IDMenu);
  $result=$db->get ("{$nometabella} p");
  //var_dump($db->trace);die;
  if ($db->count > 0) {
    foreach ($result as $r) {
      $ID=$r["cn_IDContenuto"];
      $slug=$r["cn_slug"];
      $pagename=$config["siteurl"]."$slug/";
    }
  }
  return $pagename;
}
function convertiimmagine($immagine,$percorsodasostituire){
  return str_replace("thumb",$percorsodasostituire,$immagine);
}
?>
