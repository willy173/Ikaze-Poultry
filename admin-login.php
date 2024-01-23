<?php include('header.php'); ?>

<div class="container my-5">
    <h2>Admin Login</h2>

    <div class="row">
        <div class="col-8 col-md-5 mx-auto">
            <form method="post" action="process/admin-login-process.php" class="shadow p-5">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <center><button type="submit" class="btn btn-primary">Login</button></center>
            </form>
        </div>
    </div>
    
</div>

<?php include('footer.php'); ?>
