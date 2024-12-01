<div class="wallpaper-container-detail">
    <h2>Detail Wallpaper</h2>
    <div class="wallpaper-card">
        <img class="img" src="<?php echo $wallpaper["address"]; ?>" alt="<?php echo $wallpaper["title"]; ?>">
        <div class="wallpaper-content">
            <div class="wallpaper-details">
                <p><span>Judul :</span> <?php echo $wallpaper["title"]; ?></p>
                <p><span>Author :</span> <?php echo $wallpaper["author"]; ?></p>
                <p><span>Image Size :</span> <?php echo $wallpaper["size"]; ?></p>
                <p><span>Image Resolution :</span> <?php echo $wallpaper["resolution"]; ?></p>
                <p><span>File Size :</span> <?php echo $wallpaper["file_size"]; ?></p>
                <p><span>Uploaded by :</span> <?php echo $wallpaper["uploader"]; ?></p>
            </div>
            <div class="download-button-container">
                <a href="<?php echo $wallpaper["address"]; ?>" download="<?php echo $wallpaper["title"]; ?>" class="download-button">
                    Download Gambar
                </a>
            </div>
        </div>
        <a href="?c=Wallpaper&?m=list">Kembali ke Daftar Foto</a>
    </div>
</div>