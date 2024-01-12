<?php
include_once 'includes.php';
?>
<script>
    function openAttributionsWindow() {
        window.open('<?= ROOTNAME; ?>/attributions', "_blank", "location=yes,height=570,width=520,scrollbars=yes");
    }
</script>

<!--Spacer-->
<div class="mt-4"></div>
<footer class="container-fluid bg-body-tertiary">
    <div class="row justify-content-center py-3">
        <a href="https://www.youtube.com/dojomor" target="_blank" id="yt"
           class="social-icon col-auto fs-1 mx-3 text-body-tertiary"><i class="bi bi-youtube"></i></a>
        <a href="https://www.facebook.com/dojomor2023/" target="_blank" id="fb"
           class="social-icon col-auto fs-1 mx-3 text-body-tertiary"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/dojomor2023/" target="_blank" id="in"
           class="social-icon col-auto fs-1 mx-3 text-body-tertiary"><i class="bi bi-instagram"></i></a>
    </div>
    <div class="bg-body-secondary py-2">
        <div class="text-center d-flex justify-content-center">
            <span>Copyright &copy; 2023 DojoMór</span>
            <span class="mx-2 text-body-tertiary border-end border-dark-subtle"></span>
            <span>Made by Filip Vojtěch</span>
            <span class="mx-2 text-body-tertiary border-end border-dark-subtle"></span>
            <a
              href="javascript:openAttributionsWindow()"
              class="link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
            >
                Attributions
            </a>
        </div>
    </div>
</footer>
