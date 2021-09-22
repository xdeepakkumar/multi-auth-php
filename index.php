<!-- head section  -->
<?php include "./includes/_header.php"; ?>
<!-- navbar section  -->
<?php include "./includes/_navbar.php"; ?>
<!-- message section -->
<?php
if (isset($_GET['signupSuccess']) && $_GET['signupSuccess'] == "false") {
    $gotMsg = $_GET['msg'];
    echo '
        <div class="alert alert-danger alert-dismissible fade show my-0 text-center" role="alert">
          <strong>Error! </strong> ' . $gotMsg . '
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ';
} else if (isset($_GET['signupSuccess']) && $_GET['signupSuccess'] == "true") {
    $gotMsg = $_GET['msg'];
    echo '
        <div class="alert alert-success alert-dismissible fade show my-0 text-center" role="alert">
          <strong>Success! </strong> ' . $gotMsg . '
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ';
}
?>
<!-- head section  -->
<?php include "./includes/_body.php"; ?>
<!-- footer section  -->
<?php include "./includes/_footer.php"; ?>