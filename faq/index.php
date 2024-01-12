<?php
error_reporting(E_ALL);
include_once '../includes.php';
$db = new Database();
$qa = $db->getQA();
?>

<!doctype html>
<html lang="en">
<head>
    <?php include ROOT . '/components/headSharedContents.php' ?>
    <link rel="stylesheet" href="style.css">
    <title>DojoMór FAQ</title>
</head>
<body>
<?php include ROOT . "/components/header.php"; ?>
<div class="container-md col-lg-5 col-auto">
    <h1 class="text-center mb-5">Frequently Asked Questions</h1>
    <?php for ($i = 0; $i < sizeof($qa); $i++):
        $question = $qa[$i]['question'];
        $answer = $qa[$i]['answer'];
        ?>
        <h4>
            <a
              class="fs-5 link-underline link-underline-opacity-0 text-body"
              data-bs-toggle="collapse"
              href="#a<?= $i + 1; ?>"
              role="button"
              aria-expanded="false"
              aria-controls="a<?= $i + 1; ?>"
            >
                <?= htmlspecialchars($question); ?>
            </a>
        </h4>
        <div class="cc collapse mt-4" id="a<?= $i + 1; ?>">
            <?= $answer; ?>
        </div>
        <hr>
    <?php endfor; ?>
</div>
<script>
    let lastOpened = null;
    const collapseElementList = document.querySelectorAll(".cc");

    document.addEventListener("DOMContentLoaded", async () => {
        console.log("Loaded");
        const collapseList = [...collapseElementList].map(collapseEl => new bootstrap.Collapse(collapseEl, {toggle: false}));
        for (const collapseEl of collapseElementList) {
            applyEventListener(collapseEl);
            await bootstrap.Collapse.getOrCreateInstance(collapseEl).hide();
        }
    });

    function applyEventListener(el) {
        console.log(el);
        el.addEventListener("show.bs.collapse", ev => {
            if (lastOpened != null) {
                bootstrap.Collapse.getOrCreateInstance(lastOpened).hide();
            }
            lastOpened = el;
        });
        console.log("Applied listener");
    }
</script>
<?php include ROOT . '/components/footer.php' ?>
</body>
</html>
