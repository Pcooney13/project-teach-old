var $ = jQuery.noConflict();

var currentOffset = 0;
var currentVideos = [];
$(document).ready(function(){

  function nextSegment(segmentLength){
    if (currentOffset == 0 || currentOffset + segmentLength <= currentVideos.length){
      var start = currentOffset;
      var finish = currentOffset + segmentLength;
      if (finish > currentVideos.length) finish = currentVideos.length;
      for(var i = start; i < finish; i++){
        var video = currentVideos[i];
        $('.video-'+video.video_index).slideDown();
        currentOffset++;
      }
    }
  }

  function videoSelect(){
    var base_url = "/wp-content/themes/project-teach";
    var url = base_url + "/lib/getVideos.php";
  $.ajax({
    url: url,
    dataType:'json',
    method:'GET',
  }).done(function(data) {
      currentOffset = 0;
      currentVideos = data.videos;
      $('.video').hide();
      nextSegment(2);
    });
  }

  videoSelect();

  $("#media-vid-btn").on("click", function(e){
    e.preventDefault();
    nextSegment(2);
    $('html,body').animate({
      scrollTop: $(this).offset().top
    }, 1500);
  });
}); 