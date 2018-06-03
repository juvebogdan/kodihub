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
#myProgress {
    width: 100%;
    background-color: grey;
}
#myBar {
    width: 0%;
    height: 30px;
    background-color: #4CAF50;
    text-align: center; /* To center it horizontally (if you want) */
    line-height: 30px; /* To center it vertically */
    color: white; 
}
</style>
<link href="<?php echo base_url(); ?>/css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/modal.css" type="text/css" />
<meta name="Keywords" content="Kodi, build, free, best, hosting, server, hub, appy, lodi, spmc, storage" />
<meta name="Description" content="The Kodi Hub is a FREE hosting solution for Kodi builds. We host your Kodi Build on our servers and you pay nothing!" />
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
(adsbygoogle = window.adsbygoogle || []).push({
google_ad_client: "ca-pub-9635943169152466",
enable_page_level_ads: true
});
</script>
</head>

<body>
<div class="full">
  <div class="headertop">
    <div align="center"><span class="steps">Kodi Hub Members Area</span><br />
      <span class="substeps">Upload, Update and Check on your Kodi build download stats</span>
      <hr />
    </div>
  </div>
  <div class="contentbox">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Archive - 1 (aerialview.tv) -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9635943169152466"
     data-ad-slot="3330705209"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
  <div class="contentbox">
    <?php  $this->load->view('links/links'); ?>
    <?php echo form_open_multipart('', 'id="form1" method="post"'); ?>
    <div class="mainspace">
      <p><strong><u>Upload a New Build</u></strong> -         All fields must be completed
      </p>
      <p>Build Title: 
        <input type="text" name="title" id="title" />
        <span class="tiny"><br />
      No special characters and less than 30 characters</span></p>
      <p>Build Genre: 
        <select name="genre" id="genre">
          <option></option>
          <option>Family</option>
          <option>Kids</option>
          <option>Sports</option>
          <option>Adult</option>
        </select>
      </p>
      <p>Build icon: 
          <input type="file" name="icon" id="imgInp" value="Browse" />
        <br />
      <span class="tiny">200 x 200 png image </span></p>
      <p>Build tile:   
          <input type="file" name="tile" id="imgInp1" value="Browse" />
        <br />
      <span class="tiny">340 x 200 png image for Amazon Fire icon (include the build name on the tile) <a href="https://www.avstream.tv/version5/kodi/k17/lodi.png" target="_new">View an example</a></span></p>
      <p>Build zip file:  
          <input type="file" name="zip" id="imgInp2" value="Browse" />
        <br /> 
      <span class="tiny">Under 300mb see <a href="help.html">Hub Help</a> for the criteria and set up </span></p>
      <p>Build size: 
        <input name="size" type="text" id="size" size="3" maxlength="3" />
      MB<br />
      <span class="tiny">In whole MB with no decimal point</span></p>
      <p align="center">
        <button type="button" class="ajax" id="button">Submit</button>
        <br />
      <span class="tiny"><u>Do not refresh or close this window once you have submitted your data </u></span>    </p>
      <div id="myProgress" style="display: none;">
        <div id="myBar">0%</div>
      </div>
    </div>
    <?php echo form_close(); ?> 
  </div>
  <div class="contentbox">
    <script async="async" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Archive - 1 (aerialview.tv) -->
    <ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9635943169152466"
     data-ad-slot="3330705209"
     data-ad-format="auto"></ins>
    <script>
(adsbygoogle = window.adsbygoogle || []).push({});
    </script>
  </div>
<div class="space"></div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".ajax").prop("disabled",true);
  var modal1 = document.getElementById('modal1');
  // Get the <span> element that closes the modal
  var span1 = document.getElementById("close1");

  // When the user clicks on <span> (x), close the modal
  span1.onclick = function() {
      modal1.style.display = "none";
      location.reload();
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal1) {
          modal1.style.display = "none";
          location.reload();
      }
  }
  var filesArray1 = [];

  var progressBar = $("#myProgress");
  var elem = document.getElementById("myBar");

  function previewFiles( e ) {
    
    var files = e.target.files;
       
    var eventTrigger = e.currentTarget.id;
    
      for (var i = 0, f; f = files[i]; i++) {
          
          if (!f.type.match('image/png')) {
              alert('You must upload png image');
              continue;
          }

          var reader = new FileReader();

                      
          reader.onload = (function(theFile) {
            return function(e) {          
            
              if (eventTrigger=='imgInp') {
                filesArray1[0] = theFile;
              }
              if (eventTrigger=='imgInp1') {
                filesArray1[1] = theFile;
              }              
              
              console.log(filesArray1);

            };
          })(f);

                      
          reader.readAsDataURL(f);
      }
  }

  function previewFiles2( e ) {
    
    var files = e.target.files;
       
    var eventTrigger = e.currentTarget.id;
    
      for (var i = 0, f; f = files[i]; i++) {

          
          if (!f.type.match('application/x-zip-compressed')) {
              alert('You must upload zip file');
              continue;
          }

          var reader = new FileReader();

                      
          reader.onload = (function(theFile) {
            return function(e) {          
            
              if (eventTrigger=='imgInp2') {
                filesArray1[2] = theFile;
                $(".ajax").prop("disabled",false);
              }
              console.log(filesArray1);
            };
          })(f);

                      
          reader.readAsDataURL(f);
      }
  }

  $("#imgInp").on('change', previewFiles);
  $("#imgInp1").on('change', previewFiles);
  $("#imgInp2").on('change', previewFiles2);

  $(".ajax").click(function() {
    var formData = new FormData();

    for(var i= 0, file; file = filesArray1[i]; i++)
    {
        formData.append('files[]', file);
    }
    formData.append('title',$('#title').val());
    formData.append('size',$('#size').val());
    formData.append('genre',$( "#genre option:selected" ).text());
    filesArray1 = cleanArray(filesArray1);  
    if (filesArray1.length == 3) {
      $.ajax({
        xhr: function()
        {
          var xhr = new window.XMLHttpRequest();
          //Upload progress
          xhr.upload.addEventListener("progress", function(evt){
            if (evt.lengthComputable) {
              var percentComplete = Math.round((evt.loaded / evt.total)*100);
              elem.style.width = percentComplete + '%';
              elem.innerHTML = percentComplete + '%';
            }
          }, false);
          return xhr;
        },
        beforeSend: function() {
          progressBar.show();
        },         
        type: 'POST',
        url: "<?php echo base_url(); ?>kodihub/uploadbuild",
        data: formData,
        contentType: false,       
        cache: false,             
        processData:false,
        success: function(data){        
          $('<p>' + data + '</p>').appendTo(".overflow-content");
          modal1.style.display = "block";
          progressBar.hide();
        }
      });

    }
    else {
      alert("Please upload all files");
    }       
  });

function cleanArray(actual) {
  var newArray = new Array();
  for (var i = 0; i < actual.length; i++) {
    if (actual[i]) {
      newArray.push(actual[i]);
    }
  }
  return newArray;
}  

});
</script>
</html>
