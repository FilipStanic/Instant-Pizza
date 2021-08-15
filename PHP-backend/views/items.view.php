<?php require_once "views/partials/header.php"; ?>
    <div class="container viewArea">
        <div class="row mt-4 mb-3">
            <div class="col-12 text-center">
                <a href="/items/create" class="btn btn-success">New item</a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($items as $item): ?>
                <div class="col-lg-4 col-md-12 col-sm-12 p-3">
                    <div class="card m-auto" style="width: 18rem">
                        <div style="height:192px; overflow: hidden; display: flex; align-items: center;">
                            <img src="../public/item-images/<?= $item->img?>" alt="" style="width: 18rem">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->title ?> - <?= number_format($item->price,2) ?>&#36;</h5>
                            <p class="card-text">Extras: <?= $item->extras ?></p>
                            <a href="/items/show?id=<?= $item->id?>" class="btn btn-info">Show</a>
                            <a href="/items/edit?id=<?= $item->id?>" class="btn btn-warning">Edit</a>
                            <a href="/items/destroy?id=<?= $item->id?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php require_once "views/partials/footer.php"; ?>