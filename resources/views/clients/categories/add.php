<h1>Them The Loai</h1>
<form action="<?php echo route('categories.add') ?>" method="POST">
    <div>
        <input type="text" name="category_name" placeholder="ten the loai">
    </div>
    <?php echo csrf_field(); ?>
    <button type="submit">Them the loai</button>
</form>
