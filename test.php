<?php 
&amp;lt;?php
/**
 *  Utilitites to help in debugging.
 *
 *  @author Lon Hosford
 *  @link www.lonhosford.com
*/
/**
 *  Create an array of files and directory names, Requires PHP 5 &amp;gt;= 5.3.1.
 *
 *  Directories without contents have a slash appended or at the $dir_recurse_depth regardless if they have contents. Hidden files and folders are included.
 *  @link http://stackoverflow.com/questions/14304935/php-listing-all-directories-and-sub-directories-recursively-in-drop-down-menu This code is based on this Stackoverflow post.
 *  @param int $dir_recurse_depth recurse depth. 0 for $dir_list_root. Add 1 for each child level.  -1 is used for any depth.
 *  @param string $dir_list_root recurse depth. Starting folder path. Files in this directory are included. Default is current directory.
 *  @return string[] List of folders and files found.
 */
function debug_dir_list($dir_recurse_depth = 0, $dir_list_root = '.'){
    // Create a recursive file system directory iterator.
    $dir_iter = new RecursiveDirectoryIterator(
        $dir_list_root,
        RecursiveDirectoryIterator::SKIP_DOTS) ;// Skips dot files (. and ..)
    // Create a recursive iterator.
    $iter = new RecursiveIteratorIterator(
        $dir_iter,
        RecursiveIteratorIterator::SELF_FIRST, // Lists leaves and parents in iteration with parents coming first.
        RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore exceptions such as "Permission denied"
        );
    // The maximum recursive path.
    $iter-&amp;gt;setMaxDepth($dir_recurse_depth);
    // List of paths Include current paths
    $path = array($dir_list_root);
    foreach ($iter as $path =&amp;gt; $dir) {
        if ($dir_recurse_depth == 0 &amp;amp;&amp;amp; $dir-&amp;gt;isDir()) $path .= "/";
        $paths[] = substr($path,2);
    }
    return $paths;
}
?>&amp;gt;
