<?php
// pre html functions.. get rid of getaddress.php, retaddress.php

// todo: session based anti request-spam system ..

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>LiteCoin instaWallet!</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link rel="stylesheet/less" type="text/css" href="lib/bootstrap.less">
    <script src="js/less-1.1.5.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-alerts.js" /></script>
    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
      .container {
        width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16. */
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

/* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span10,
      .content .span4 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span4 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }

    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="favicon.ico">
  </head>
  <body>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="/"><font style="font-size: 20px;">Litecoin Wallet</font><font style="font-size: 9px; "></font> </a>
          <ul class="nav">
          <?
          // menu
          mnu_btn("/", "Home", "index.php");
          /*if (!isset($_SESSION["key"]))
          mnu_btn("getaddress.php", "New Address");*/
          if (isset($_SESSION["key"]))
          mnu_btn("vault?key=$_SESSION[key]", "My Vault");
          if ($_SERVER['REMOTE_ADDR'] == "188.176.162.157" or $_SERVER['REMOTE_ADDR'] == gethostbyname('cg999.ath.cx'))
          mnu_btn("server", "Server");
          if ($_SESSION["key"])
          mnu_btn("logout", "Logout");


          function mnu_btn($link,$title,$preg = false) {

            if (!$preg)
            $preg = explode("?",$link);
            else
            $preg[0] = $preg;


            if (preg_match("/".str_replace("/","\/",$preg[0])."/i", $_SERVER['SCRIPT_FILENAME']))
            echo '<li class="active"><a href="'.$link.'">'.$title.'</a></li>';
            else
            echo '<li><a href="'.$link.'">'.$title.'</a></li>';
          }

          ?>
          </ul>
          <!--<form action="" class="pull-right">
          <input class="input-small" type="text" value="Switch key.." style="width: 150px;">
          </form>-->
          <div class="pull-right" style="color: #fff; padding-top: 11px; font-size: 11px;">Blockcount: <?=number_format($derp["blocks"]);?> - <?=number_format($derp["balance"],0);?> LTC in <?=$wallets?> vaults at version <?=$derp[version]?> with <?=$derp["connections"]?> p2p nodes</div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="content">
      <!-- END HEADER.PHP -->