<?php include("admin/config/config.php");?>
<?php include($config["internalurlfront"]."swcheck.php");?>
<?php include($config["internalurlfront"]."multilanguage.php");?>
<?php include($config["internalurlfront"]."swdatabaseopen.php");?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php include_once ($config["internalurlfront"]."swroot.php"); ?>
<?php rootView(); ?>
<?php include_once ("head.php"); ?>
<?php include($config["internalurlfront"]."swbody.php");?>
