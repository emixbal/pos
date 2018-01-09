<?php
$title='bernaditya listya';
print_r($this->db->escape_str($title));
echo "<hr>";
echo mysql_real_escape_string($title);
?>