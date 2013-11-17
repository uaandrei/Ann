<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Files_Model extends MY_MODEL
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = FILES_TABLE;
    }

    public function delete_file($file_name)
    {
        $files = scandir(UPLOAD_DIR);
        foreach ($files as $file) {
            if (in_array($file, array(
                '.',
                '..'
            )))
                continue;
            if (strpos($file, $file_name))
                unlink(UPLOAD_DIR . $file);
        }
        return TRUE;
    }
}