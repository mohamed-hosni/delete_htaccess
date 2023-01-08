<?php
class RD
{
    public $count=0;
    public function directory($dir)
    {
        $this->directory_children($dir);
    }
    public function directory_children($dir)
    {
        $cleanpath = realpath($dir) . DIRECTORY_SEPARATOR;
        $scandir=scandir($cleanpath);
        echo "<ul>";
        foreach ($scandir as $file) {
            if ($file == "." || $file == "..") {
                continue;
            }
            echo "<li>";
            echo $file;
            if ($file == ".htaccess") {
                unlink($cleanpath . $file);
            }
            if (is_dir($cleanpath . $file) && is_readable($cleanpath . $file)) {
                
                $this->directory_children($cleanpath . $file);
            
            }
            echo "</li>";
            

        }
        echo "<ul>";
    }
}
$RD = new RD();
$RD->directory(__DIR__);

//echo ;
?>