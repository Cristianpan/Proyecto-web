<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->renderSection("title") ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="/assets/css/global.min.css" as="style" />
    <link rel="stylesheet" href="/assets/css/global.min.css" />
    <?php $this->renderSection("css") ?>
</head>

<body>
    <?php $this->renderSection("content") ?>

    <?php $this->renderSection("js") ?>
</body

</html>