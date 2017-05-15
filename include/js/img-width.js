$( 'windows' ).ready(function(){

  var imgWidth = $('.img-detail').width();
  var imgHeight = $('.img-detail').height();

  if (imgWidth == imgHeight){
    $('.img-detail').attr('style','max-width:50%;max-height:50%;margin:2% 0;');
  }else if (imgWidth > imgHeight){
      if(imgWidth > 824){
        $('.img-detail').attr('style','max-width:75%;margin:2% 0;');
      }else if(imgWidth <= 824){
        $('.img-detail').attr('style','width:auto;max-width:75%;margin:2% 0;');
      }else{

      }


  }else if (imgWidth < imgHeight){
    $('.img-detail').attr('style','max-width:50%;margin:2% 0;');
  }



$('.img-detail').css('visibility','visible');


})
