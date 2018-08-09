<?php
echo str_replace("\\plugins\\fileman\\php", "", __DIR__) . "/uploads";

echo '<br>' . $_SERVER['DOCUMENT_ROOT'];
echo '<br>' . dirname (__FILE__);
?>