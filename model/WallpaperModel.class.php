<?php
class WallpaperModel extends Model
{
    public function getAllWallpapers()
    {
        $query = "SELECT * FROM storphoto";
        $result = $this->mysqli->query($query);

        $wallpapers = [];
        while ($row = $result->fetch_assoc()) {
            $wallpapers[] = $row;
        }

        return $wallpapers;
    }

    public function getWallpaperById($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM storphoto WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function saveWallpaper($post, $files)
    {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $size = $_POST['size'];
        $resolution = $_POST['resolution'];
        $file_size = $_POST['file_size'];
        $uploader = $_POST['uploader'];
        
        $wallpaperImage = null;
        if (isset($files['uploadedfile']) && $files['uploadedfile']['error'] === UPLOAD_ERR_OK) {
            $target_path = "photos/";
            $target_path = $target_path . basename($_FILES['uploadedfile']['name']); 

            if ($_FILES['uploadedfile']['error'] !== UPLOAD_ERR_OK) {
                echo "<script>alert('File upload error: " . $_FILES['uploadedfile']['error'] . "');</script>";
                echo "<script>window.location.href = '?c=Wallpaper&?m=list';</script>";
                exit();
            }

            if (!move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                echo "<script>alert('There was an error uploading the file, please try again!');</script>";
                echo "<script>window.location.href = '?c=Wallpaper&?m=list';</script>";
                exit();
            }

            $wallpaper_image = $target_path;
        }

        if (isset($post['id'])) {
            $wallpaper_id = $_POST['id'];

            if ($wallpaper_image) {
                $sql = "UPDATE storphoto SET address=?, title=?, author=?, size=?, resolution=?, file_size=?, uploader=? WHERE id=?";
                $stmt = $this->mysqli->prepare($sql);
                $stmt->bind_param("sssssssi", $wallpaper_image, $title, $author, $size, $resolution, $file_size, $uploader, $wallpaper_id);
            } else {
                $sql = "UPDATE storphoto SET title=?, author=?, size=?, resolution=?, file_size=?, uploader=? WHERE id=?";
                $stmt = $this->mysqli->prepare($sql);
                $stmt->bind_param("ssssssi", $title, $author, $size, $resolution, $file_size, $uploader, $wallpaper_id);
            }

            if ($stmt->execute()) {
                echo "<script>alert('Wallpaper berhasil di-update');</script>";
                echo "<script>window.location.href = '?c=Wallpaper&?m=list';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
                echo "<script>window.location.href = '?c=Wallpaper&?m=list';</script>";
            }
        } else {
            if (!$wallpaper_image) {
                echo "<script>alert('Silakan unggah gambar sebelum menambahkan wallpaper.');</script>";
                echo "<script>window.location.href = '?c=Wallpaper&?m=list';</script>";
                exit();
            }
    
            $sql = "INSERT INTO storphoto (address, title, author, size, resolution, file_size, uploader) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param("sssssss", $wallpaper_image, $title, $author, $size, $resolution, $file_size, $uploader);
    
            if ($stmt->execute()) {
                echo "<script>alert('Wallpaper berhasil ditambahkan');</script>";
                echo "<script>window.location.href = '?c=Wallpaper&?m=list';</script>";
            } else {
                echo "<script>alert('Insert Error: " . $stmt->error . "');</script>";
                echo "<script>window.location.href = '?c=Wallpaper&?m=list';</script>";
            }
        }

        return $stmt->execute();
    }

    public function deleteWallpaper($id) 
    {
        $stmt = $this->mysqli->prepare("DELETE FROM storphoto WHERE id = ?");
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}