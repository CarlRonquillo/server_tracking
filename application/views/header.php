<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Server Tracking System</title>
  <link rel="stylesheet" href="<?php echo base_url("resources/css/bootstrap.css"); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url("resources/css/bootstrap.min.css"); ?>"/>

</head>
<body>

	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <?php echo anchor("home/index","Server Tracking System", ["class" => 'navbar-brand']); ?>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <?php echo anchor("home/view_lists/Database/0","<i class='glyphicon glyphicon-cog'></i>",["class" => "dropdown","data-toggle" => "dropdown","role" => "button", "aria-haspopup" => "true", "aria-expanded" =>"false"]); ?>
        </li>
      </ul>
  </div><!-- /.container-fluid -->
</nav>