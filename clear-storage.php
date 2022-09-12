<?php
echo "Template Dumping...<br>";
foreach(glob('app/certificate-templates/*.*') as $filename){
    echo "Deleting: ".$filename."<br/>";
    unlink($filename);
}
echo "<br>Ouput Dumping...<br>";
foreach(glob('app/outputs/*.*') as $filename){
    echo "Deleting: ".$filename."<br/>";
    unlink($filename);
}
echo "<br/>All files deleted!";