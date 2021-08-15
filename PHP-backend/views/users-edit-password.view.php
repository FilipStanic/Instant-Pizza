<?php require_once "views/partials/header.php"; ?>
<div class="container viewArea">
    <div class="row mt-4">
        <div class="col">
            <a href="/users/show?id=<?= $user->id ?>" class="btn btn-info">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-md-6 col-9 card p-5 m-auto">
            <form action="/users/editPassword" method="post">
                <input type="hidden" name="id" value="<?= $user->id ?>">

                <p class="m-0"><strong>User: </strong></p>
                <p class="m-0 mb-2"> <?= $user->name ?></p>
                <p class="m-0"><strong>Email: </strong></p>
                <p class="m-0 mb-2"><?= $user->email ?></p>

                <div class="form-group">
                    <label for="currentPassword" class="m-0">Current password:</label>
                    <input type="password" id="currentPassword" name="currentPassword" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="password" class="m-0">New password:</label>
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
