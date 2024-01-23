<?php include('header.php'); ?>

<div class="container my-5">
    <center><h2>Login</h2></center>
    <div class="row">
        <div class="col-10 col-md-6 mx-auto">
            <form method="post" action="process/login-process.php" class="p-5 shadow-lg">
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
