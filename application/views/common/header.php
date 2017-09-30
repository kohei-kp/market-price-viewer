<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.min.css" media="screen,projection">

  <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Market Price Viewer</title>
</head>
<body>

<nav>
<div class="nav-wrapper">
  <a href="#" class="brand-logo">MTG Market Price Viewer</a>
  <ul id="nav-mobile" class="right hide-on-med-and-down">
    <li><?php echo anchor('/group', 'Group'); ?></li>
    <li><?php echo anchor('/card', 'Card'); ?></li>
    <li><?php echo anchor('/graph', 'Graph'); ?></li>
  </ul>
</div>
</nav>
