<?php include('header.php'); ?>

<div class="container my-5">
    <center><h2>Register</h2></center>
    <div class="row">
        <div class="col-10 col-md-6 mx-auto">
            <form method="post" action="process/register-process.php"class="shadow p-5">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <center><button type="submit" class="btn btn-primary">Register</button></center>
            </form>
        </div>
    </div>

</div>

<?php include('footer.php'); ?>
