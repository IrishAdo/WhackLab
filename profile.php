<?php include('header.php'); ?>
<section class="block">
    <h1>:: Profile</h1>
</section>
<?php
$action = (isset($_GET['action'])) ? $_GET['action'] : 'view';
include(buildSectionPath("profile/{$action}"));
?>
<?php include('footer.php'); ?>