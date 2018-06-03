<?php //print_r($name)?>
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
    <?php $this->load->view('links/links');?>
    <div class="mainspace">
      <p><strong><u>View your Builds and Download Stats</u></strong></p>
      <p>Select Build:
        <select id='select' name="select2" id="select2">
          <option value='-0-'></option>
        <?php
        foreach ($name as $broj => $niz) 
        {
          printf("<option value='%s'>%s</option>",$niz['title'],$niz['title']);
        }
        ?>
        </select>
      </p>
      <p>Download URL:
        <input type="text" name="textfield" id="url" />
      </p>
        <div class="fiftysized">
          <div align="center"><img alt="" id='image1' class='img1' style='width:100px;height:100px;border:1px solid red;' /></div>
        </div>
        <div class="fiftysized">
          <div align="center"><img alt="" id='image2' class='img1' style='width:170px;height:100px;border:1px solid red;' /></div>
        </div>
      <div class="fiftysized">
        <div align="center" class="stats">
          <hr />
          <p>          Downloads this month</p>
          <p id='dtm' class="steps">n/a</p>
        </div>
      </div>
      <div class="fiftysized">
        <div align="center" class="stats">
          <hr />
          <p>          Total Downloads</p>
          <p id='td' class="steps">n/a</p>
        </div>
      </div>
      <div class="fiftysized">
        <div align="center" class="stats">
          <hr />
          <p>          Your Build Rank in Genre</p>
          <p id='br' class="steps">n/a</p>
        </div>
      </div>
      <div class="fiftysized">
        <div align="center" class="stats">
          <hr />
          <p>          Overall Rank</p>
          <p  id='or' class="steps">n/a</p>
        </div>
      </div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p align="center">&nbsp;</p>
    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script>
  $("#select").change(function()
    {
      if($(this).val()!='-0-')
      {
        var src1="../../"+'<?php echo $_SESSION['username']; ?>'+"/"+$(this).val()+"/icon.png";
        $("#image1").attr("src",src1 );
        var src2="../../"+'<?php echo $_SESSION['username']; ?>'+"/"+$(this).val()+"/tile.png";
        $("#image2").attr("src",src2 );
        var formData = new FormData();
        formData.append('select',$( "#select option:selected" ).text());
        $.ajax({
            url: '<?php echo base_url(); ?>kodihub/loadstat', 
            method: "POST",            
            data: formData,
            contentType: false,       
            cache: false,             
            processData:false,      
            dataType: 'json',                                
            success: function(data)
            {
              console.log(data);
              $('#or').html(data.overallrank);
              $('#br').html(data.genrerank);
              $('#url').val("https://kodihub.net/" + data.url);
              $('#td').html(data.clicks);
              $("#dtm").html(data.thismonth);
            }
        });
      }
      else
      {
        $("#image1").attr("src",'');
        $("#image2").attr("src",'');
        $(".steps").text('n/a');
      }
    });
</script>
</html>