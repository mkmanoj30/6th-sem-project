<?php

define('DB_SERVER', 'yourservername');
define('DB_USERNAME', 'yourUserName');
define('DB_PASSWORD', 'yourPassword');
define('DB_DATABASE', 'yourDatabaseName');
$conn= oci_connect(DB_USERNAME, DB_PASSWORD, DB_SERVER)
or die(oci_error());
echo "success...";
//$database = oci_select_db(DB_DATABASE) or die(oci_error());
$stid = oci_parse($conn, 'SELECT * FROM employees'); oci_execute($stid); echo "<table border='1'>\n"; while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {     echo "<tr>\n";     foreach ($row as $item) {         echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>\n";     }     echo "</tr>\n"; } echo "</table>\n";
?>