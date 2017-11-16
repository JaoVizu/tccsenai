
<script>
	function logout(){
		window.location.href = "../index.php";
	}
</script>
<?php

session_start();
//session_destroy();
unset($_SESSION['usuario']);

echo "<script>logout()</script>"
?>