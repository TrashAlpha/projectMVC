<div class="insert-wallpaper-container">
    <h2><?php echo isset($wallpaper) ? 'Edit Wallpaper' : 'Tambah Wallpaper Baru'; ?></h2>
    <form enctype="multipart/form-data" method="POST" action="?c=Wallpaper&m=newWallpaper">
        <?php if (isset($wallpaper)): ?>
            <input type="hidden" name="id" value="<?php echo $wallpaper['id']; ?>">
        <?php endif; ?>

        <label for="title">Judul Wallpaper:</label>
        <input type="text" name="title" id="title" value="<?php echo $wallpaper['title'] ?? ''; ?>" required>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="<?php echo $wallpaper['author'] ?? ''; ?>" required>

        <label for="size">Ukuran Gambar (format [n x m]):</label>
        <input type="text" id="size" name="size" value="<?php echo $wallpaper['size'] ?? ''; ?>" required>
        
        <label for="resolution">Resolusi Gambar:</label>
        <select name="resolution" id="resolution" required>
            <option value="144p" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '144p') echo 'selected'; ?>>144p</option>
            <option value="240p" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '240p') echo 'selected'; ?>>240p</option>
            <option value="360p" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '360p') echo 'selected'; ?>>360p</option>
            <option value="480p" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '480p') echo 'selected'; ?>>480p</option>
            <option value="720p" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '720p') echo 'selected'; ?>>720p</option>
            <option value="1080p" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '1080p') echo 'selected'; ?>>1080p</option>
            <option value="2k" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '2k') echo 'selected'; ?>>2k</option>
            <option value="4k" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '4k') echo 'selected'; ?>>4k</option>
            <option value="8k" <?php if (isset($wallpaper) && $wallpaper['resolution'] == '8k') echo 'selected'; ?>>8k</option>
        </select>

        <label for="file_size">Ukuran File:</label>
        <input type="text" id="file_size" name="file_size" value="<?php echo $wallpaper['file_size'] ?? ''; ?>" required>

        <label for="uploader">Nama Uploader:</label>
        <input type="text" id="uploader" name="uploader" value="<?php echo $wallpaper['uploader'] ?? ''; ?>" required>

        <label for="wallpaper_image">Upload Gambar:</label>
        <input name="uploadedfile" type="file" /> <br>

        <?php if ($wallpaper): ?>
            <label>Gambar:</label>
            <?php if (!empty($wallpaper['address'])): ?>
                <img src="<?php echo $wallpaper['address']; ?>" alt="Gambar Wallpaper" style="width: 200px; height: auto;">
            <?php else: ?>
                <p>Tidak ada gambar wallpaper tersedia.</p>
            <?php endif; ?>
        <?php endif; ?>

        <input type="submit" value="<?php echo $wallpaper ? 'Update Wallpaper' : 'Tambah Wallpaper'; ?>">
    </form>
</div>