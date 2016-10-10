<div class="main animated fadeInUp">
    <div class="container-fluid">
        <?= $tablePhotos ?>
    </div>
</div>
<div class='over'>
<!-- <?= getShowPhoto() ?> -->
<?= $arraySort ?>

</div>
<div class='messageOver'>
	<?= getShowMessage() ?>
</div>

<input id="totalPost" type="hidden" value=<?= Post::getNumberOfPosts() ?>>
