<?//php print_r($getd);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Kodi Hub</title>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
}
body {
	background-color: #FFC;
}
</style>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/modal.css" type="text/css" />
<meta name="Keywords" content="Kodi, build, free, best, hosting, server, hub, appy, lodi, spmc, storage" />
<meta name="Description" content="The Kodi Hub is a FREE hosting solution for Kodi builds. We host your Kodi Build on our servers and you pay nothing!" />
</head>

<body>
<div class="full">
  <div class="header">
    <div align="center">
      <p><span class="title">Free Kodi Build Server Hosting</span><br />
        Store your Kodi Build on <strong>The Kodi Hub
      For <u>FREE!</u></strong></p>
    </div>
  </div>
  <div class="banner">
    <div class="fifty">
      <ul>
        <li><strong>100% Free</strong> Kodi Build Storage</li>
        <li><strong>No</strong> Fees</li>
        <li><strong>No</strong> Download limits</li>
        <li><strong>Super Fast</strong> servers</li>
        <li><strong>Secure</strong> Servers</li>
        <li><strong>Kodi Build</strong> Download Stats</li>
        <li><strong>99.99%</strong> Uptime</li>
        <li><strong>Instant &amp; Free</strong> Sign Up</li>
      </ul>
    </div>
    <div class="fifty">
      <div class="logintitle">
        <div align="center">Login or Sign Up<br />
          It's Instant and Completely Free!
        </div>
      </div>
      <div class="login">
        <?php echo form_open('', 'id="form1"'); ?>
        <p align="center">E-mail Address: 
          <input id='username' type="text" name="username" />
        </p>
        <p align="center">Password: 
          <input id='password' type="password" name="password" />
          <br />
        <a href="#" id="resetpass" class="tiny">Reset Password</a></p>
          <div align="center">
            <p>
              <span class="tiny">
              <button type="button" class="ajax" title="Login">Login</button>
              <input type="button" id="buttonup" value="Sign Up" />
            </span><br />
            <br />
            <span class="tiny">We will send an activation link to your e-mail address.</span></p>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <div class="space"></div>
<div class="subtitle">
  <div align="center"><span class="title">This Months Top 10 Kodi Builds</span><br />
    Sign Up and Upload your Build to be Included
  </div>
</div>
<div class="space"></div>
<div class="contentbox">
  <?php
  foreach($getd as $broj=>$niz)
  {
    printf('<div class="fifth">
            <p align="center">%s<br />
            %s </p>
            <p align="center"><img src="../%s/%s/icon.png" width="100" height="100" alt="Kodi Build" /></p>
            <p align="center">%s</p>
            </div>',$niz['title'],$niz['genre'],$niz['username'],$niz['title'],$niz['clicks']);
  }
  for($i=0;$i<10-count($getd);$i++)
  {
    print('<div class="fifth">
    <p align="center">Build Title<br />
Genre </p>
    <p align="center"><img src="images/buildimage.png" width="100" height="100" alt="Kodi Build" /></p>
    <p align="center">Amount of Downloads</p>
  </div>');
  }
  ?>
</div>
<div class="header">
  <div align="center"><span class="title">Uploading Your Build Is Simple And It's totally <u>FREE!</u></span><br />
    We host your build securely and you pay nothing</div>
</div>
<div class="contentbox">
  <div class="fifty">
    <div class="logintitle">
      <div align="center">Sign Up Now<br />
        It's Instant and Completely Free! </div>
    </div>
    <div class="login">
      <?php echo form_open('', 'id="form2"'); ?>
      <p align="center">E-mail Address:
        <input type="text" name="username2" id="textfield3" />
      </p>
      <p align="center">Password:
        <input type="password" name="password2" id="textfield4" />
      </p>
      <?php echo form_close(); ?>
        <div align="center">
          <p> <span class="tiny">
            <input type="button" name="button2" id="button2" value="Sign Up" />
            </span><br />
            <br />
            <span class="tiny">We will send an activation link to your e-mail address.</span></p>
        </div>

    </div>
  </div>
  <div class="fifty">
    <blockquote>
    	<span class="steps">Step 1</span><br />
        <span class="substeps">Use the form to Sign Up and get your free account.</span></p>
      <p><span class="steps">Step 2</span><br />
        <span class="substeps">Click the link in the activation e-mail.</span></p>
      <p><span class="steps">Step 3</span><br />
        <span class="substeps">Upload your Kodi build zip file to our servers and we give you a share link to use in your Kodi Wizard Addon or Lodi APK. </span></p>
    </blockquote>
    </div>
</div>
<div class="contentbox">
  <div align="center">
    <p class="substeps">Once uploaded your build will be available to download via <a href="https://www.avstream.tv"><strong><br />
      AVStream Networks</strong></a>
      from numerous apps including <a href="http://www.aerialview.tv/mobile/apps/"><strong>Appy</strong></a> and <a href="http://www.lodi.mobi"><strong>Lodi</strong></a>.<br />
    Giving your build exposure to over 200,000 users worldwide!</p>
  </div>
</div>
<div class="space"></div>
<p>&nbsp;</p>
</div>
</body>
<div id="modal1" class="modal" >

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="close1" class='close'>&times;</span>
      <h3 id='naslov'>Info</h3>
    </div>
    <div class="modal-body">
      <div class='overflow-content'>

      </div>
    </div>
    <div class="modal-footer">
      <h4>Avstream</h4>
    </div>
  </div>

</div>
<div id="modalreset" class="modal" >

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="close2" class='close'>&times;</span>
      <h3 id='naslov'>Reset Password</h3>
    </div>
    <div class="modal-body">
      <div class='overflow-content'>
          <?php echo form_open('', 'id="formreset" method="post"'); ?>
            <p align="center">Enter your E-mail Address:
              <input type="text" name="resetemail" id="resetemail" />
            </p>          
      </div>
    </div>
    <div class="modal-footer" style='text-align:center;'>
      <button type="button" class="resetpass" id="button" style="margin: 0 auto; width: 100px;">Submit</button>
      <?php echo form_close();?>
      <h4>Avstream</h4>
    </div>
  </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script>
var modal1 = document.getElementById('modal1'); 
var modalreset = document.getElementById('modalreset');
  var span1 = document.getElementById("close1");
  var span2 = document.getElementById("close2");

  // When the user clicks on <span> (x), close the modal
  span1.onclick = function() {
      modal1.style.display = "none";
      location.reload();
  }
  span2.onclick = function() {
      modalreset.style.display = "none";
      location.reload();
  }
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal1) {
          modal1.style.display = "none";
          location.reload();
      }
      if (event.target == modalreset) {
          modalreset.style.display = "none";
          location.reload();
      }      
  } 
  $('.ajax').click(function(){
        $.ajax({
            url: '<?php echo base_url(); ?>lodihub/logovanje', 
            method: "POST",            
            data: $("#form1").serialize(),
            dataType: "html",                     
            success: function(data)
            {
              if(data==1)
              {
                $(location).attr("href", "https://kodihub.net/kodihub/kodihub");
              }
              else
              {
                $(data).appendTo(".overflow-content");
                modal1.style.display = "block";
              }
            }
        });
});
$('#button2').click(function(){
      //alert($("#form2").serialize());
        $.ajax({
            url: '<?php echo base_url(); ?>lodihub/sign_up', 
            method: "POST",            
            data: $("#form2").serialize(),
            dataType: "html",                     
            success: function(data)
            {
              $(data).appendTo(".overflow-content");
              modal1.style.display = "block";
            }
        });
});
$('#buttonup').click(function(){
      //alert($("#form2").serialize());
        $.ajax({
            url: '<?php echo base_url(); ?>lodihub/sign_up', 
            method: "POST",            
            data: {username2:$("#username").val(),password2:$("#password").val()},
            dataType: "html",                     
            success: function(data)
            {
              $(data).appendTo(".overflow-content");
              modal1.style.display = "block";
            }
        });
});


  $("#resetpass").click(function(e) {
      e.preventDefault();       
      $('#modalreset').show();
  });

    $('.resetpass').click(function(){
        modalreset.style.display = "none";
        $.ajax({
            url: '<?php echo base_url(); ?>lodihub/resetpass', 
            method: "POST",            
            data: $("#formreset").serialize(),
            dataType: "html",                     
            success: function(data)
            {
              $(data).appendTo(".overflow-content");
              modal1.style.display = "block";                
            }
        });
});

</script>
</html>
