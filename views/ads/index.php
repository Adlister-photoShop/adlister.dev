<div class="main animated fadeInUp">
    <div class="container-fluid body">
        <?= getPhotos() ?>
    </div>
</div>

<input id="totalPost" type="hidden" value=<?= Post::getNumberOfPosts() ?>>
