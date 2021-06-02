<?php
include ("lib/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Download Lagu Joox Gratis Sepuasnya">
    <meta name="author" content="Turu Corp">
    <link rel="icon" href="assets/images/favicon.ico">
    <title>
      <?php
      if (@$name != null) {
        echo "$name - Joox Downloader";
      } else {
        echo "Joox Downloader";
      }
      ?>
    </title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      padding-top: 80px;
      
    }
  </style>
  </head>
  <body>