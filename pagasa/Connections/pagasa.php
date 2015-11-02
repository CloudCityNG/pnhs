<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_pagasa = "localhost";
$database_pagasa = "pagasa";
$username_pagasa = "root";
$password_pagasa = "";
$pagasa = mysql_pconnect($hostname_pagasa, $username_pagasa, $password_pagasa) or trigger_error(mysql_error(),E_USER_ERROR); 
?>