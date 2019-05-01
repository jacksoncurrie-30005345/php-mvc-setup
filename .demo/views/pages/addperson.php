<?php include(APPROOT . "/views/includes/header.php"); ?>

    <div class="row">
        <div class="col-sm-12">
            <h1><?php echo $data['title']; ?></h1>
            <hr>
            <form class="form" action="<?php echo URLROOT . 'pages/addperson/'; ?>" method="POST" >
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name" id="fname" name="fname" >
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name" id="lname" name="lname" >
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="dob" name="dob" >
                </div>
                <div class="form-group">
                    <input type="submit" class="form-control btn btn-success" value="Add Person" >
                </div>
            </form>
        </div>
    </div>

<?php include(APPROOT . "/views/includes/footer.php"); ?>