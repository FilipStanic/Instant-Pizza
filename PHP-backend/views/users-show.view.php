<?php require_once "views/partials/header.php"; ?>

<div class="container viewArea">
    <div class="row mt-4">
        <div class="col">
            <a href="/users" class="btn btn-info">Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5 col-md-8 col-sm-12 col-12 card ml-auto mr-auto p-5">
            <div class="text-center">
                <h1>User: <?= $user->name ?></h1>
                <h4>Email: <?= $user->email ?></h4>
            </div>
            <div class="mt-3 text-center">
                <a href="/users/edit?id=<?= $user->id ?>" class="btn btn-warning mb-2">Name & Email</a>
                <a href="/users/editPassword?id=<?= $user->id ?>" class="btn btn-warning mb-2">Password</a>
                <a href="/users/destroy?id=<?= $user->id ?>" class="btn btn-danger mb-2">Delete user</a>
            </div>
        </div>
    </div>

</div>


<?php require_once "views/partials/footer.php"; ?>
