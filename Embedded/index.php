<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>
  <?php

$myfile = fopen("override.txt", "r") or die("Unable to open file!");
$override = fread($myfile,filesize("override.txt"));

$php_sunset_time = date('Y-m-d H:i:s', strtotime(date_sunset(date(), SUNFUNCS_RET_STRING, 22.3460, 87.2320, 100, 5.5)));
$php_sunrise_time = date('Y-m-d H:i:s', strtotime(date_sunrise(date(), SUNFUNCS_RET_STRING, 22.3460, 87.2320, 100, 5.5)));


$current = date('Y-m-d H:i:s'); 
?>
  <body>
      <nav>
        <div class="nav-wrapper">
          <a href="#" class="brand-logo center">Sunset Sunrise Light Controller</a>
          <!-- <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a href="collapsible.html">JavaScript</a></li>
          </ul> -->
        </div>
      </nav>
      <div class="container">
         <div class="collection">
          <a href="#!" class="collection-item"><span class="badge"><?php echo $php_sunrise_time; ?></span>Sunrise</a>
          <a href="#!" class="collection-item"><span class="badge"><?php echo $php_sunset_time; ?></span>Sunset</a>
          <a href="#!" class="collection-item"><span class="badge"><?php echo $current; ?></span>Current</a>
          <a href="#!" class="collection-item"><span class="badge"><?php echo $override; ?></span>Override</a>
        </div><br><br>
        <h5>Override Switch</h5><hr><br>
        <div class="switch">
          <label>
            Off
            <input type="checkbox" id="override" <?php if($override==1){ echo 'checked'; }?>>
            <span class="lever"></span>
            On
          </label>
        </div>
      </div>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
      $("#override").change(function(){
          param = $("#override").prop("checked");
          $.ajax({url: "statuschange.php?param="+param, success: function(result){
              $("#div1").html(result);
          }});
      });

    </script>
  </body>
<?php fclose($myfile); ?>
</html>