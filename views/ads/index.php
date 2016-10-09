<div class="main animated fadeInUp">
    <div class="container-fluid">
        <?= $tablePhotos ?>
    </div>
</div>
<div class='over'>
<?= getShowPhoto() ?>
	<div class='closeShowPhotos'>CLOSE</div>
</div>
<div class='messageOver'>
	<?= getShowMessage() ?>
</div>

<input id="totalPost" type="hidden" value=<?= Post::getNumberOfPosts() ?>>
