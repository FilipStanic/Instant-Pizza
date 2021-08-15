<?php require_once "views/partials/header.php"; ?>

<div class="container" style="min-height: 100vh;">
    <div class="row mt-4">
        <div class="col-xl-4 col-lg-5 col-md-8 col-sm-9 col-10 m-auto">
            <form action="/items/create" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="img">Image</label>
                    <div>
                        <input type="file" id="img" name="img">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="extras">Extras (separate with commas)</label>
                    <input type="text" class="form-control" id="extras" name="extras">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<?php require_once "views/partials/header.php"; ?>
