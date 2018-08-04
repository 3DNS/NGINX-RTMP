<script>document.body.className += ' fade-out';</script>

<script type="text/javascript">
 NProgress.start();
  setTimeout(function() { NProgress.set(0.45); $('.fade').removeClass('out'); }, 1500);
   setTimeout(function() { NProgress.set(0.80); $('.fade').removeClass('out'); }, 2200);
   setTimeout(function() { NProgress.done(); $('.fade').removeClass('out'); }, 3000);

$('.modal').modal();
$('ul.tabs').tabs();
$('.collapsible').collapsible();
$('.materialboxed').materialbox();
$(".button-collapse").sideNav();
$("body").niceScroll({styler:"fb",cursorcolor:"#2196F3", cursorwidth: '10', cursordragontouch: true, emulatetouch: false, cursorborderradius: '10px', background: '#404040', spacebarenabled:false,  cursorborder: '', zindex: 'auto'});


    var record = document.getElementById("record");
document.addEventListener('DOMContentLoaded', () => {	
	const video = document.querySelector('video');
	const player = new Plyr(video, {autoplay: true, controls: ['play-large', 'play', 'mute', 'volume', 'fullscreen']});

$.ajax({
    url:'<?=$url?>/records/<?=$channel?>/stream.flv',
    type:'HEAD',
    error: function()
    {
        var flvPlayer = flvjs.createPlayer({
            type: 'flv',
	    isLive: true,
	    lazyLoad: false,
	    rangeLoadZeroStart: true,
	    enableWorker: false,
	    enableStashBuffer: false,
	    autoCleanupSourceBuffer: true,
	    stashInitialSize: '600KB',
            url: '<?=$StreamFLV?>'
        });
        flvPlayer.attachMediaElement(video);
        flvPlayer.load();
	setTimeout(function() { video.play(); }, 500);
        record.style.display = "none";
    },
    success: function()
    {

        var flvPlayer = flvjs.createPlayer({
            type: 'flv',
            url: '<?=$url?>/records/<?=$channel?>/stream.flv'
        });
        flvPlayer.attachMediaElement(video);
        flvPlayer.load();
        flvPlayer.play();
        record.style.display = "block";

 }
 }); 
$(document).ready(function() {
 setTimeout(refreshZuschauer, 1000);
 setTimeout(refreshLive, 1000);
let lastVideoState = false;
(() => {
  setInterval(() => {
    $.get('<?=$StreamState?>')
      .done(() => {
        if (lastVideoState) return;
        lastVideoState = true;
        const video = document.querySelector('video');
        var flvPlayer = flvjs.createPlayer({
            type: 'flv',
	    isLive: true,
	    enableWorker: false,
	    lazyLoad: false,
	    rangeLoadZeroStart: true,
	    enableStashBuffer: false,
	    autoCleanupSourceBuffer: true,
	    stashInitialSize: '600KB',
            url: '<?=$StreamFLV?>'
        });
        flvPlayer.attachMediaElement(video);
        flvPlayer.load();
	setTimeout(function() { video.play(); }, 500);
        record.style.display = "none";

      }).fail(() => lastVideoState = false);
  }, 1000);
})();
});
$(function() {
    $('body').removeClass('fade-out');
});
function refreshZuschauer() {
 $.ajax({ url: "<?=$url?>/player/viewer/viewer.php?channel=<?=$channel?>" }).done(function (data) {
  $("#zuschauer").html(data);
 }).always(function () {
  setTimeout(refreshZuschauer, 1000);
 });
}
function refreshLive() {
 $.ajax({ url: "<?=$url?>/player/active.php?channel=<?=$channel?>" }).done(function (data) {
  $("#live").html(data);
 }).always(function () {
  setTimeout(refreshLive, 1000);
 });
}
});
</script>