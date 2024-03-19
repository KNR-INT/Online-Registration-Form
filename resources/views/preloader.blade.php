<!-- preloader.blade.php -->

<div id="preloader">
    <div id="status">&nbsp;
    </div>
</div>




<style>
   /* Example CSS for the preloader */
#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff; /* Background color of preloader */
}
#status {
    width: 200px;
    height: 200px;
    position: absolute;
    left: 50%;
    top: 50%;
    background-image: url('public/Image/loading.gif'); /* Path to your preloader image */
    background-size: cover;
    background-position: center;
    margin: -100px 0 0 -100px;
}
</style>

<script>
     // Hide preloader when page is fully loaded
window.addEventListener('load', function() {
    var preloader = document.getElementById('preloader');
    preloader.style.display = 'none';
});

</script>