<?php

foreach(glob('outputs/*.*') as $filename){
    echo "Deleting: ".$filename."<br/>";
    unlink($filename);
}
echo "<br/>All files deleted!";