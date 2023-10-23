<?php $this->extend("templates/layout") ?>

<?php $this->section("title") ?>
<title>Art Zone | Usuario</title>
<?php $this->endSection() ?>

<?php $this->section("css") ?>

<link rel="preload" href="/assets/css/profile.min.css" as="style" />
<link rel="stylesheet" href="/assets/css/profile.min.css" />
<?php $this->endSection() ?>


<?php $this->section("content") ?>
<?= view("components/navigationBar") ?>



<?= view("components/personalBlocks") ?>
<h2>Catálogo</h2>
<?= view("components/searchBar") ?>
<?= view("components/gallery") ?>
<?php $this->endSection() ?>