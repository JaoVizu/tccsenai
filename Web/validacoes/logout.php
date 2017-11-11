
<script>
	function logout(){
		window.location.href = "../index.php";
	}
</script>
<?php

session_start();
session_destroy();

unset($_SESSION['usuario']);
//unset($_SESSION['cliente']);
echo "<script>logout()</script>"
?>