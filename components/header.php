<?php
include_once "includes.php";

$db = new Database();
$workshops = $db->getTechnologies();
?>
<style>
    #workshopsDropdown:hover > .dropdown-menu {
        display: block;
    }
</style>
<header class="navbar navbar-expand-sm mb-4 sticky-top bg-body-tertiary">
    <div class="container-md px-4 py-1">
        <a class="navbar-branding" href="<?= ROOTNAME; ?>/">
            <img id="logo" src="<?= ROOTNAME; ?>/images/Logo.png" alt="">
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarContent"
          aria-controls="navbarContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse flex-grow-0 mt-3" id="navbarContent">
            <nav class="navbar-nav justify-content-center" role="navigation">
                <a class="nav-link" href="<?= ROOTNAME; ?>/">Home</a>
                <div class="nav-item dropdown" id="workshopsDropdown">
                    <div
                      class="nav-link dropdown-toggle"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                      data-bs-auto-close="outside"
                    >
                        Workshops
                    </div>
                    <div class="dropdown-menu">
                        <?php foreach ($workshops as $workshop): ?>
                            <a
                              class="dropdown-item"
                              href="<?= ROOTNAME; ?>/technology/?id=<?= $workshop['id'] ?>"
                            >
                                <?= $workshop['name']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <a class="nav-link" href="<?= ROOTNAME; ?>/faq">FAQs</a>
            </nav>
        </div>
    </div>
</header>
