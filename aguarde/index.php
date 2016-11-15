<? 
	$indexPage = true;
	require_once 'conn/conn.php';
	require_once 'inc/toascii.php';
	require_once 'inc/partials/head.php';
?>

<main class="index">
	<input type="hidden" name="base-site" id="base-site" value="<? echo SITE; ?>" />
	<section id="index-topo">
			<div id="logo"></div>
			<p class="chamada">Estamos preparando nosso site para oferecer novas oportunidades de negócios e muita diversão no seu Happy Hour. </p>
			<div class="desenvolvimento">Site em desenvolvimento</div>
			<p class="contato">(24) 97495-8020 &bull; contato@thegaragecars.com.br</p>
    </section>
    <section id="mapa">
    	<script type="text/javascript">initialize();</script>
    	<div id="endereco">
    		<h1>Restaurante The Garage Car's</h1>
    		<p>Rua Papoulas, 128, Água Limpa, Volta Redonda</p>
    	</div>
	</section>
	<section id="endereco-full">
		<h1>Restaurante The Garage Car's</h1>
    	<p>Rua Papoulas, 128, Água Limpa, Volta Redonda</p>
	</section>  

</main>