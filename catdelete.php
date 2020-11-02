<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include '../class/catgory.php' ?>
<?php
$cat = new catgory();
if ($_SERVER['REQUEST_METHOD'] === 'POST')
?>
<?php if (!isset($_GET['catid']) || $_GET['catid'] == null) echo "<script>window.location=catlist.php</script>";
else {
    $id = $_GET['catid'];
    $delete = $cat->delete_category($id);
} ?>
<?php
            if (isset($delete))
                echo $delete;
            ?>

<?php header('catlist.php') ?>
<?php include 'inc/footer.php'; ?>