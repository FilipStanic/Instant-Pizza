<?php require_once "views/partials/header.php"; ?>

<div class="container viewArea">
    <div class="row mt-4">
        <div class="col">
            <a href="/users/show?id=<?= $user->id ?>" class="btn btn-info">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-6 col-9 card p-5 m-auto">
            <form action="/users/edit" method="post">
                <input type="hidden" name="id" value="<?= $user->id ?>">

                <div class="form-group">
                    <label for="name" class="m-0">User name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= $user->name ?>">
                </div>

                <div class="form-group">
                    <label for="email" class="m-0">User email</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?= $user->email ?>">
                </div>

                <div class="form-group">
                    <label for="password" class="m-0">Enter user password:</label>
                    <input type="password" id="password" name="password" class="form-control" value="">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once "views/partials/header.php"; ?>
