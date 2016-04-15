<?php
$mainfile = dirname( __FILE__ ) . DS . 'main' . DS . g('c') . '_' . g('a') . '.tpl.php';
if( file_exists( $mainfile ) ) include( $mainfile );
else echo "<div class='notice-box'>没有设置模板文件</div>";
?>