<?

session_start();

if(!isset($_SESSION['USUARIO'])){ ?>

	<script>
		location.href="<?dashRoot();?>pages/login/login.php";
	</script>

<? exit; }