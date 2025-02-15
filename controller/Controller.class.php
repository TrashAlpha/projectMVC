<?php
class Controller
{
    public function loadModel($modelName)
    {
        include_once "model/Model.class.php";
        include_once "model/$modelName.class.php";
        return new $modelName;
    }

    public function loadView($viewName, $data = [])
    {
        foreach ($data as $var => $value) {
            $$var = $value;
        }

        // Include header
        include_once "view/header.php";

        // Include main view
        include_once "view/$viewName.php";

        // Include footer
        include_once "view/footer.php";
    }
}