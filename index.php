<?php
include('header.php');
?>


<div class="main">
<div class="slide">
  <ul>
    <li class="1"><img src="asset/img/accueil_1.png" /></li>
    <li class="2"><img src="asset/img/accueil_2.png" /></li>
    <li class="3"><img src="asset/img/accueil_3.png" /></li>
  </ul>
</div>
</div>


<script type="text/javascript">
$(document).ready(function(){
  $("li .1").show();
  $("li .2").hide();
  $("li .3").hide();



   $(function(){

      setInterval(function(){
         $(".slide ul").animate(800,function(){

           $(this).find("li").hide();
           $(this).find("li:first").show();
            $(this).css({marginLeft:0}).find("li:last").after($(this).find("li:first"));




         })
      }, 7000);
      })
   });
</script>
<?php
include('footer.php');
?>
