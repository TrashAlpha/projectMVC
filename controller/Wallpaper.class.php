<?php
class Wallpaper extends Controller
{
    public function list()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: ?c=Auth&m=login");
            exit();
        }

        $model = $this->loadModel('WallpaperModel');
        $data['wallpapers'] = $model->getAllWallpapers();
        $data['username'] = $_SESSION['username'];

        $this->loadView('listWallpaper', $data);
    }

    public function newWallpaper()
    {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: ?c=Auth&m=login");
            exit();
        }

        $model = $this->loadModel('WallpaperModel');
        $wallpaper = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wallpaper = $model->saveWallpaper($_POST, $_FILES);
            header("Location: ?c=Wallpaper&m=list");
            exit();
        }

        if (isset($_GET['id'])) {
            $wallpaper = $model->getWallpaperById((int)$_GET['id']);
        }

        $data['wallpaper'] = $wallpaper;
        $this->loadView('newWallpaper', $data);
    }

    public function delete() 
    {
        $model = $this->loadModel('WallpaperModel');
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $model->deleteWallpaper($id);
    
            if ($result) {
                header("Location: ?c=Wallpaper&m=list");
                exit();
            } else {
                echo "Failed to delete wallpaper.";
            }
        } else {
            echo "Invalid request. Wallpaper ID is missing.";
        }
    }
    
    public function detail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $model = $this->loadModel('WallpaperModel');
            $wallpaper = $model->getWallpaperById((int)$_GET['id']);

            $data['wallpaper'] = $wallpaper;
            $this->loadView('detailWallpaper', $data);
        }
    }
}