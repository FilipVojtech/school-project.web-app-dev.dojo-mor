<?php
include_once '../includes.php';

$_SESSION['allowTechnologyUpload'] = true;

if (!isset($_GET['id'])) {
    header('Location: ../');
    die();
}

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

// Check if secret is supplied and render upload form accordingly
if (isset($_GET['superSecretHiddenOptionForUploadingMediaToTechnologyPage'])) {
    if ($_GET['superSecretHiddenOptionForUploadingMediaToTechnologyPage'] == "7438618d01c2bd09fd332931f6f4909f376b899e91aa062dff7ce22274a4cd22") {
        $_SESSION['allowTechnologyUpload'] = true;
    }
}

$db = new Database();
$technology = $db->getTechnology($_GET['id']);
$sessions = $db->getSessions($_GET['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <?php include ROOT . '/components/headSharedContents.php'; ?>
    <link rel="stylesheet" href="style.css">
    <title><?= $technology['name'] ?> @ DojoMór</title>
</head>
<body>
<?php include ROOT . '/components/header.php'; ?>
<div class="container-fluid text-center mt-4">
    <div class="row justify-content-center align-items-center">
        <div class="col col-1" id="spacer"></div>
        <div class="col-auto">
            <h1 id="tech__heading"><?= $technology['name'] ?></h1>
        </div>
        <div class="col-1">
            <img
              id="tech_logo"
              src="data:image/png;base64,<?= $technology['logo'] ?>"
              alt="<?= $technology['name'] ?> logo"
              class="img"
            >
        </div>
    </div>
    <div class="row m-0">
        <div class="col">
            <p class="fs-5">Age range: <strong class="fs-4"><?= $technology['age'] ?> years</strong></p>
        </div>
    </div>
</div>
<div class="container-fluid my-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-xl-6 p-0">
            <?php include 'technologyCarousel.php'; ?>
        </div>
    </div>
</div>
<div class="container-sm">
    <div class="row justify-content-center">
        <div class="col col-11 col-md-7 mb-4">
            <div class="alert alert-primary m-0">
                <q class="fs-5"><?= $technology['short_text'] ?></q>
                <hr>
                <div class="col-12 justify-content-end text-end">
                    <a href="<?= $technology['homepage']; ?>" class="alert-link me-4 icon-link" target="_blank">
                        Learn more on their webpage
                        <i class="bi bi-box-arrow-up-right" style="scale: .7"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="ratio ratio-16x9">
                <iframe
                  id="yt-player"
                  src="<?= $technology['video_link'] ?>"
                  title="YouTube video player"
                  allowfullscreen
                  loading="lazy"
                  referrerpolicy="no-referrer"
                ></iframe>
            </div>
        </div>
        <div class="col col-md-6">
            <p><?= nl2br($technology['description']) ?></p>
        </div>
    </div>
    <h4>Upcoming sessions</h4>
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <?php foreach ($sessions[0] as $key => $_): ?>
                            <th scope="col" style="white-space: nowrap"><span class="mx-auto"><?= $key; ?><span
                                      class="mx-2"></th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sessions as $session): ?>
                        <tr>
                            <?php foreach ($session as $key => $value) : ?>
                                <td style="white-space: nowrap">
                                    <span class="col-3 mx-auto"><?php
                                        if ('Date' == $key) {
                                            echo date_format(date_create($value), 'j.n. Y');
                                        } else {
                                            echo $value;
                                        }
                                        ?></span>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="row g-0">
                    <div class="d-none d-sm-block col-2 bg-body-tertiary rounded-start border-end border-subtle">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <img class="img col-6" src="<?= ROOTNAME; ?>/images/ui/pdf.png" alt="Image">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="card-body">
                            <h5 class="card-title">Instructions</h5>
                            <p class="card-text">Download the instructions for the workshop.</p>
                            <a
                              href="<?= ROOTNAME; ?>/download/?id=<?= $technology['id'] ?>"
                              class="btn btn-primary link-extend"
                              target="_blank"
                            >
                                Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($_SESSION['allowTechnologyUpload'] ?? false): ?>
        <h5>Logo and instructions</h5>
        <form action="send.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $technology['id'] ?>">
            <div class="row g-2">
                <div class="col col-10">
                    <input class="form-control" type="file" name="file" id="file" accept="application/pdf,image/png">
                </div>
                <div class="col col-2">
                    <input class="form-control" type="submit" value="Send away!">
                </div>
            </div>
        </form>
        <br>
        <h5>Images</h5>
        <form action="send.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $technology['id'] ?>">
            <input type="hidden" name="type" value="images">
            <div class="row g-2">
                <div class="col col-10">
                    <input class="form-control" type="file" name="files[]" id="files" accept="image/jpeg" multiple>
                </div>
                <div class="col col-2">
                    <input class="form-control" type="submit" value="Send away!">
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>
<?php include ROOT . '/components/footer.php' ?>
</body>
</html>
