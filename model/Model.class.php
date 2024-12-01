<?php class Model
{
        protected $mysqli;

        public function __construct()
        {
                $dbhostname = 'localhost';
                $dbusername = 'root';
                $dbpassword = '';
                $dbname = 'wallpaperMVC';
                $this->mysqli = new mysqli($dbhostname, $dbusername, $dbpassword, $dbname) or die('Database connection error!');
        }
}