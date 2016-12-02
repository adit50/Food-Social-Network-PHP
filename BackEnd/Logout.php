<?php
session_start();
$old_user = $_SESSION[' valid_user '];
unset($_SESSION[' valid_user ']);
session_destroy();
header('location: index');
?>
<html>
<body>
<h1>Log Out</h1>
<?php
if (!empty($old_user))
{
header('location: index.php');
}
else
{
echo 'You were not logged in , and so have not been logged out.<br/>' ;
}
?>
</body>
</html>