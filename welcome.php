    <?php

// $path = __DIR__;
// $content = scandir($path);

// echo "<pre>";
// array_shift($content);
// array_shift($content);
// print_r($content);
// echo "</pre>";
// echo "<pre>";
// //to delete   file  
// //unlink(".htaccess");
// //print_r(  $new_folder = scandir($content[1]));

// print_r( scandir($path.DIRECTORY_SEPARATOR.$content[4]));
// echo "</pre>";

$main_path=__DIR__;
$count = 0;
function delete_htaccess ($path)
{
    echo "<BR>";
    echo "the path of htaccess is : $path";
    echo "<BR>";

    global $count;
    //we get the array witch contain all files and  folder in our directory 
    // the first element in this array is  . that mean up one level before 
    //the second element is ..   that mean up two level before 
    //but we don't need it it will  be enterd our in infinite loop  
    $contents = scandir($path);

    

    //we will pop the first element and the second element from our array 
    array_shift($contents);
    array_shift($contents);
    
        if ( in_array(".htaccess", $contents)) {
        unlink($path.DIRECTORY_SEPARATOR . ".htaccess");
            $count++;
        }
    
    


    


    foreach ($contents as  $content) {
        
        //we will print all files,folder,subfolder,intire subfolder
      if(is_dir($content)){
             echo"the path is ". $path;
           //  echo $newpath=$path . DIRECTORY_SEPARATOR .$content;
            
            delete_htaccess($new_path=$path.DIRECTORY_SEPARATOR.$content);
    }
else{
   
}      

    }

    echo "<BR><PRE>";
print_r($contents);
echo "<BR></PRE>";

}



delete_htaccess($main_path);
// echo(is_dir($main_path.DIRECTORY_SEPARATOR."this".DIRECTORY_SEPARATOR."LLLOO"))

?>


<?php

// $all_folder_path = [];

// $all_content=scandir(__DIR__) ;

// foreach ($all_content as  $element) {
//     if (is_dir($element)) {
//         $all_folder_path[]=__DIR__.DirectoryIterator.$element;
//     }
// }


$iterator = new DirectoryIterator(__DIR__);

var_dump($iterator);
?>


