<?php
include_once 'includes.php';

$db = new Database();
$technologies = $db->getHPTechnologies();

// http://stackoverflow.com/questions/15774669/ddg#15774702
$partnerDir = ROOT . '/images/partners';
$partners = array_diff(scandir($partnerDir), array('.', '..'));
?>
<!doctype html>
<html lang="en">
<head>
    <?php include ROOT . '/components/headSharedContents.php' ?>
    <title>DojoMór</title>
</head>
<body>
<?php include ROOT . "/components/header.php"; ?>
<style>
    .tech {
        height: 250px;
    }

    .tech-card {
        background-color: var(--bs-secondary);
        transition: 300ms;
    }

    .tech-card:nth-child(2n) {
        background-color: var(--bs-primary);
    }

    h2 {
        box-shadow: 0 10px 15px 1px darkgrey;
    }

    .tech-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 15px 5px grey;
    }

    .tech-card .card-footer:not(.mobile) {
        transition: 300ms;
        transform: scaleY(0);
    }

    .tech-card:hover .card-footer:not(.mobile) {
        transition: 300ms;
        transform: scaleY(100%);
    }

    <?php foreach ($technologies as $tech): ?>
    #tech<?= $tech['id']; ?> {
        background-image: url("data:image/png;base64,<?= $tech['logo'] ?>");
        background-repeat: no-repeat;
        background-size: contain;
        background-position: center;
    }

    <?php endforeach; ?>
</style>
<div class="container-md">
    <!--<editor-fold desc="Workshops">-->
    <h2 class="text-center mb-5 mt-1 col-12 p-3 rounded-4 text-white" style="background-color: var(--bs-primary)">
        Workshops</h2>
    <div class="row justify-content-center d-flex">
        <?php for ($i = 0; $i < sizeof($technologies); $i++):
            $tech = $technologies[$i];
            ?>
            <div data-bs-theme="dark"
                 class="tech-card card rounded-4 col-12 col-md-5 col-lg-3 mx-2 mb-3 link-underline link-underline-opacity-0 text-center px-0">
                <div class="card-header">
                    <h3 class="card-title my-2"><?= $tech['name']; ?></h3>
                </div>
                <div class="card-body fw-bold">
                    <div id="tech<?= $tech['id'] ?>" class="tech mb-3"></div>
                    <div><?= $tech['short_text'] ?></div>
                </div>
                <a
                  href="<?= ROOTNAME . "/technology/?id=$tech[id]"; ?>"
                  class="link-body-emphasis link-underline link-underline-opacity-0 link-opacity-50-hover d-none d-lg-block"
                >
                    <div class="card-footer fs-5">
                        Visit the workshop
                    </div>
                </a>
                <a
                  href="<?= ROOTNAME . "/technology/?id=$tech[id]"; ?>"
                  class="link-body-emphasis link-underline link-underline-opacity-0 link-opacity-50-hover d-lg-none"
                >
                    <div class="card-footer fs-5 mobile">
                        Visit the workshop
                    </div>
                </a>
            </div>
        <?php endfor; ?>
    </div>
    <!--</editor-fold>-->
    <!--<editor-fold desc="About Dojo Mor">-->
    <h2 class="text-center my-5 col-12 p-3 rounded-4 text-white" style="background-color: var(--bs-primary)">About Dojo
        Mor</h2>
    <p class="text-center fs-5 fw-bold">
        DojoMór - free coding lessons for students since 2017
    </p>
    <br>
    <div class="col-10 mx-auto">
        <p>
            DojoMór, coding for students, is running again for the sixth year in a row.
        </p>
        <p>
            Free coding workshops from DojoMór 2023, funded by the Higher Education Authority of Ireland, will be hosted
            online and on-location, from 10am to 2pm, Saturday 21st October 2023, offering a range of fun and creative
            coding activities to suit all ages and interests.
        </p>
        <p class="fw-bold">
            On-location workshops will be hosted at MTU Tralee, Maynooth University, ATU Letterkenny, DkIT (Dundalk),
            Tullamore Library and ATU Sligo. Places are limited for in-person bookings.
        </p>
        <p>
            On the day, thousands of students, from primary and secondary schools around Ireland, can enjoy the online
            coding games, by following along with the different workshop videos you see hosted on the website.
        </p>
        <p>
            Greatly inspired by the well-known CoderDojo; the national partners of DojoMór are united in their belief
            that
            an understanding of programming languages is increasingly important in the modern world, and that it’s both
            better and easier to learn these skills early, and that nobody should be denied the opportunity to do so.
            DojoMór is an excellent opportunity for young people to be exposed to, and to learn, practical and valuable
            skills that they will take with them for life. Some will develop these skills into an exciting career in
            coding
            and programming.
        </p>
    </div>
    <!--</editor-fold>-->
    <!--<editor-fold desc="Partners">-->
    <h2 class="text-center my-5 col-12 p-3 rounded-4 text-white" style="background-color: var(--bs-primary)">
        Partners</h2>
    <div class="row justify-content-center align-items-center">
        <?php foreach ($partners as $image): ?>
            <div class="col-sm-3 col-auto">
                <img src="<?= ROOTNAME ?>/images/partners/<?= $image ?>" class="img-fluid" alt="">
            </div>
        <?php endforeach; ?>
    </div>
    <!--</editor-fold>-->
</div>
<?php include ROOT . '/components/footer.php' ?>
</body>
</html>
