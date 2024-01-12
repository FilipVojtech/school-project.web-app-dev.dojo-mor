<?php
global $db, $technology;
$images = $db->getTechnologyImages($_GET['id']);
?>

<style>
    .carousel:hover .cc {
        background-color: rgba(204, 204, 204, 0.5);
        transition: 200ms;
    }

    .carousel .cc {
        transition: 200ms;
    }
</style>
<div id="technologyCarousel" class="carousel slide">
    <div class="carousel-indicators">
        <?php for ($i = 0; $i < sizeof($images); $i++): ?>
            <button
                <?php if ($i == 0) echo 'class="active"' ?>
              type="button"
              data-bs-target="#technologyCarousel"
              data-bs-slide-to="<?= $i ?>"
              aria-label="Slide <?= $i + 1; ?>"
            ></button>
        <?php endfor; ?>
    </div>
    <div class="carousel-inner">
        <?php
        for ($i = 0; $i < sizeof($images); $i++):
            $image = $images[$i]['image_data'];
            ?>
            <div class="carousel-item <?php if ($i == 0) echo 'active' ?>">
                <img
                  src="data:image/png;base64,<?= $image ?>"
                  alt="<?= $technology['name'] ?> image <?= $i + 1; ?>"
                  class="d-block w-100"
                >
            </div>
        <?php endfor; ?>
    </div>
    <button class="carousel-control-prev cc" type="button" data-bs-target="#technologyCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next cc" type="button" data-bs-target="#technologyCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<script>
    const carousel = new bootstrap.Carousel("#technologyCarousel");
</script>
