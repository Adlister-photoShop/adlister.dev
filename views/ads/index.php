<div class="main animated fadeInUp">
    <div class="container-fluid">
        <?= $tablePhotos ?>
    </div>
</div>
<div class='over'>
<?= getShowPhoto() ?>

</div>
<div class='messageOver'>
	<?= getShowMessage() ?>
</div>

<input id="totalPost" type="text" value=<?= Post::getNumberOfPosts() ?>>
