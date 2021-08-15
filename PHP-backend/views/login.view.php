<?php require_once "views/partials/login-header-navigation.php"; ?>
<div class="container viewArea">
    <div class="row mt-5">
        <div class="col-lg-5 col-md-6 col-9 card p-5 m-auto">
            <form action="/login" method="post">
                <div class="form-group">
                    <label for="email" class="m-0">Email</label>
                    <input type="text" id="email" name="email" class="form-control">
                </div>

                <div class="form-group"
                    <label for="password" class="m-0">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-info">Login</button>
                </div>
            </form>
        </div>
    </div>

</div>

<?php require_once "views/partials/footer.php"; ?>
