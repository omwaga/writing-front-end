<?php
$targetFolder = '/home/thetech2/essayflame.com/storage/app/public';
echo $targetFolder;
echo '<br>';
$linkFolder = '/home/thetech2/essayflame.com/public/storage';
echo $linkFolder;
symlink($targetFolder, $linkFolder);
echo 'Symlink process successfully completed';
