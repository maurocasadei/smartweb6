<?php
function createFields($f,$r=null,$resultSelect=null){
	global $config,$ssfieldattruniqueform;
$value="";$field="";

$label=<<<MORELINE
<label for="_label{$f->FieldDbName}" class="control-label">{$f->Label}</label>
MORELINE;
//var_dump($r);
echo $label;
switch ($f->Tipo){
case "text":
if ($f->DefaultValue){$value=$f->DefaultValue;}
if (in_update()){$value=$r[$f->FieldDbValue];}
$field=<<<MORELINE
<input name="{$f->FieldDbName}" type="{$f->Tipo}" ss-label="{$f->Label}" class="form-control" id="{$f->FieldDbName}" value="{$value}"  {$f->Readonly} {$f->Required} ssfieldattruniqueform="{$ssfieldattruniqueform}">
MORELINE;
	break;
case "password":
if ($r){$value=$r[$f->FieldDbValue];}
$field=<<<MORELINE
<input name="{$f->FieldDbName}" type="{$f->Tipo}" ss-label="{$f->Label}" class="form-control" id="{$f->FieldDbName}" value="{$value}"  {$f->Readonly} {$f->Required} {$f->PropertyAdd} ssfieldattruniqueform="{$ssfieldattruniqueform}">
MORELINE;
	break;
case "radio":
if ($r){$value=$r[$f->FieldDbValue];}
foreach ($f->arLabelValue as $lb){
$checked="";
if ($value==$lb->Value){$checked="checked";}
$field.=<<<MORELINE
		<input type="{$f->Tipo}" name="{$f->FieldDbName}" ss-label="{$f->Label}" id="{$f->FieldDbName}" value="{$lb->Value}" {$f->Readonly} {$f->Required}  {$f->PropertyAdd} {$checked} ssfieldattruniqueform="{$ssfieldattruniqueform}">
		<label for="{$f->FieldDbName}{$lb->Value}">{$lb->Label}</label>
MORELINE;
}
	break;
case "textarea":
if ($r){$value=$r[$f->FieldDbValue];}
$field=<<<MORELINE
<textarea rows="3" name="{$f->FieldDbName}" ss-label="{$f->Label}" class="form-control" id="{$f->FieldDbName}"  {$f->Readonly} {$f->Required} {$f->PropertyAdd} ssfieldattruniqueform="">{$value}</textarea>
MORELINE;
	break;
case "editor":
if ($r){$value=$r[$f->FieldDbValue];}
$field=<<<MORELINE
<textarea rows="10" cols="80" ss-label="{$f->Label}" name="{$f->FieldDbName}" class="form-control mceEditor" id="{$f->FieldDbName}"  {$f->Readonly} {$f->Required} {$f->PropertyAdd} ssfieldattruniqueform="{$ssfieldattruniqueform}">{$value}</textarea>
MORELINE;
	break;
case "date":
case "image":
if ($r){$value=$r[$f->FieldDbValue];}
$delete=findLabel($config["lang"],"comandod");
$field=<<<MORELINE
<br>
<div class="form-group col-md-6">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{$f->FieldDbName}modalimage"><img class="imgadmin" src="{$config["siteurl"]}{$value}" /></button>
  <div id="{$f->FieldDbName}modalimage" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
              <img src="{$config["siteurl"]}{$value}" ss-label="{$f->Label}"  class="img-responsive">
          </div>
      </div>
    </div>
  </div>
</div>
<div class="form-group col-md-6">
  $delete<input type="checkbox" name="chkdelete-{$f->FieldDbName}" />
</div>
<div class="form-group col-md-12">
  <input type="file" name="{$f->FieldDbName}"  id="{$f->FieldDbName}" aria-describedby="fileHelp" {$f->Readonly} {$f->Required} {$f->PropertyAdd}>
</div>
MORELINE;
break;
if ($r){$value=dataitaeng($r[$f->FieldDbValue]);}
$field=<<<MORELINE
<input class="form-control" type="datetime-local" value="{$value}" name="{$f->FieldDbName}"  id="{$f->FieldDbName}" {$f->Readonly} {$f->Required} {$f->PropertyAdd} ssfieldattruniqueform="{$ssfieldattruniqueform}">
MORELINE;
	break;
case "number":
if ($f->DefaultValue){$value=$f->DefaultValue;}
if ($r){$value=$r[$f->FieldDbValue];}
$field=<<<MORELINE
<input class="form-control" type="number" value="{$value}" ss-label="{$f->Label}" name="{$f->FieldDbName}"  id="{$f->FieldDbName}" {$f->Readonly} {$f->Required} {$f->PropertyAdd} ssfieldattruniqueform="{$ssfieldattruniqueform}">
MORELINE;
	break;
case "select":
if ($r){$value=$r[$f->FieldDbValue];}
$option="";
//var_dump($resultSelect);
$option="<option value=\"0\" ></option>";
if ($resultSelect){
	foreach ($resultSelect as $rSelect) {
		$selected="";
		if ($rSelect["value"]==$f->DefaultValue && $f->DefaultValue != ""){$selected=" SELECTED ";}
		if ($rSelect["value"]==$value &&  $value !="" ){$selected=" SELECTED ";}
		$option.="<option value=\"{$rSelect["value"]}\" {$selected}>{$rSelect["label"]}</option>";
	}
}
	//var_dump($f);

$field=<<<MORELINE
<select class="form-control" type="datetime-local" value="{$value}" name="{$f->FieldDbName}"  id="{$f->FieldDbName}" {$f->Readonly} {$f->Required} {$f->PropertyAdd} ssfieldattruniqueform="{$ssfieldattruniqueform}">
{$option}
</select>
MORELINE;
	break;
case "checkbox":
$checked="";
if ($r){
	$value=$r[$f->FieldDbValue];
	if ($value){$checked="checked";}
}
$field=<<<MORELINE
&nbsp;<input {$checked} type="{$f->Tipo}" value="1" ss-label="{$f->Label}" name="{$f->FieldDbName}"  id="{$f->FieldDbName}" {$f->Readonly} {$f->Required} {$f->PropertyAdd}  ssfieldattruniqueform="{$ssfieldattruniqueform}">
MORELINE;
	break;
case "url":
if (in_update()){$value=$r[$f->FieldDbValue];}
$field=<<<MORELINE
<input name="{$f->FieldDbName}" type="{$f->Tipo}" ss-label="{$f->Label}" class="form-control" id="{$f->FieldDbName}" value="{$value}"  {$f->Readonly} {$f->Required} ssfieldattruniqueform="{$ssfieldattruniqueform}">
MORELINE;
	break;
case "composer":
if (in_update()){$value=$r[$f->FieldDbValue];}
$field=<<<MORELINE
<textarea rows="0" cols="0" name="{$f->FieldDbName}" ss-label="{$f->Label}" class="form-control" id="{$f->FieldDbName}"  {$f->Readonly} {$f->Required} {$f->PropertyAdd} ssfieldattruniqueform="{$ssfieldattruniqueform}"></textarea>
<div class="content-area" objlink="{$f->FieldDbName}">{$value}</div>
MORELINE;
	break;
case "pdf":
if ($r){$value=$r[$f->FieldDbValue];}
$pdfatag="";
$delete=findLabel($config["lang"],"comandod");
if (isset($value) && (!empty($value))){$pdfatag="  <i class=\"fa fa-file-pdf-o color-green\"><a href=\"{$config["siteurl"]}$value\">$value</a></i>-->>$delete<input type=\"checkbox\" name=\"chkdelete-{$f->FieldDbName}\" />";}
$field=<<<MORELINE
<input type="file" name="{$f->FieldDbName}" ss-label="{$f->Label}"  id="{$f->FieldDbName}" aria-describedby="fileHelp" {$f->Readonly} {$f->Required} {$f->PropertyAdd} ssfieldattruniqueform="{$ssfieldattruniqueform}">
<br>$pdfatag
MORELINE;
	break;
case "buttons":
if ($f->DefaultValue){$value=$f->DefaultValue;}
if (in_update()){$value=$r[$f->FieldDbValue];}
$update=findLabel($config["lang"],"comandou");
$field=<<<MORELINE
<br /><button sect="{$f->Sect}" lev="{$f->Lev}" class="btn btn-primary" id="{$r[$f->FieldDbValue]}" IDName="{$f->FieldDbName}" tipo="vaia" href="#" data-toggle="tooltip" data-placement="left" title="{$update}"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button>
<button CampoDaAssegnare="{$f->CampoDaAssegnare}" sect="{$f->Sect}" lev="{$f->Lev}" class="btn btn-primary" id="{$r[$f->FieldDbValue]}" IDName="{$f->FieldDbName}" tipo="aprilistamodale" href="#" data-toggle="tooltip" data-placement="left" title="{$update}"><i class="fa fa-list" aria-hidden="true"></i></button>
MORELINE;
	break;

}

echo $field;
}

?>
