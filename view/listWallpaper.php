<div class="wallpaper-container">
    <div style="text-align: center;">
        <h3>Welcome, <?php echo htmlspecialchars($username); ?></h3>
    </div>
    <h2>Daftar Wallpaper</h2>
    <div class="wallpaper-grid">
        <?php if (!empty($wallpapers)): ?>
            <?php foreach ($wallpapers as $wallpaper): ?>
                <div class="wallpaper-card-list">
                    <a href="?c=Wallpaper&m=detail&id=<?php echo $wallpaper['id']; ?>">
                        <img class="img-list" 
                            src="<?php echo $wallpaper['address']; ?>" alt="<?php echo htmlspecialchars($wallpaper['title']); ?>">
                        <h3><?php echo htmlspecialchars($wallpaper['title']); ?></h3>
                    </a>
                    <div class="wallpaper-actions">
                        <button class="edit-button" 
                            onclick="window.location.href='?c=Wallpaper&m=newWallpaper&id=<?php echo $wallpaper['id']; ?>'" 
                            title="Edit wallpaper">Edit
                        </button>
                        <button class="delete-button" 
                            onclick="if (confirm('Apakah Anda yakin untuk menghapus wallpaper ini?')) { 
                                window.location.href='?c=Wallpaper&m=delete&id=<?php echo $wallpaper['id']; ?>'; 
                            }" 
                            title="Delete wallpaper">Delete
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada foto.</p>
        <?php endif; ?>
    </div>
</div>