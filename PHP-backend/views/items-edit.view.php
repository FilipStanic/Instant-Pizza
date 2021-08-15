<?php require_once "views/partials/header.php"; ?>

<div class="container">
    <div class="row mt-4">
        <div class="col">
            <a href="/items" class="btn btn-info">Back</a>
        </div>
    </div>
    <div class="row mb-5">
        <div class="cols m-auto">
            <form action="/items/edit" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $item->id ?>">

                <div class="form-group">
                    <label for="title" class="m-0">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= $item->title ?>">
                </div>
                <div class="d-flex flex-lg-row flex-sm-column flex-column justify-content-around align-items-center text-center">
                    <div class="mb-4">
                        <h3>Keep current Image</h3>
                        <img src="../public/item-images/<?= $item->img ?>" alt="" width="230px;">
                        <input type="text" value="<?= $item->img ?>" name="oldImageName" hidden>
                    </div>
                    <h3 class=" mb-4">or</h3>
                    <div class="form-group text-center mb-4">
                        <h3>Upload new image</h3>
                        <label for="img" class="iSize m-0"><i class="fas fa-upload"></i></label>
                        <div>
                            <input type="file" name="img" id="img">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="m-0">Price</label>
                    <input type="text" id="price" name="price" class="form-control" value="<?= number_format($item->price,2) ?>">
                </div>

                <div class="form-group">
                    <label for="extras" class="m-0">Extras</label>
                    <input type="text" id="extras" name="extras" class="form-control" value="<?= $item->extras ?>">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once "views/partials/footer.php"; ?>
