<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Bisiacaria.com | El portal dei bisiachi</title>
	
	<link rel="stylesheet" href="css/ui.totop.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	
	<meta property="og:title" content="Bisiacaria.com | El portal dei bisiachi" />
	<meta property="og:url" content="http://ricordiamo.bisiacaria.com/" />
	<meta property="og:image" content="http://ricordiamo.bisiacaria.com/img/logo.png" />
	<meta property="og:locale" content="it_IT" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ec9d04a1995a571" type="text/javascript"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/easing.js"></script>
	<script src="js/jquery.ui.totop.js"></script>
	<script src="js/jquery.backstretch.min.js"></script>
	<script src="js/jquery.google-analytics.js"></script>
	<script src="js/bisia.js"></script>
</head>
<body>
	
	<div class="topbar">
    	<div class="fill">
        	<div class="container">
          		<a class="brand" href="<?php echo URL::to_home(); ?>">
					<img src="img/logo.png" width="200" height="40" />
				</a>
				<span class="brand">Powered by <a href="http://pongocms.com" title="Laravel CMS bundle">PongoCMS.com</a></span>
        	</div>
      	</div>
    </div>

    <div class="container wrapper">
      	<div class="content">
        	<div class="row">
          		<div class="span16">
					<div class="box grey georgia1">
						<h2>El portal dei bisiachi dall' 11 Novembre 2002 al 30 Novembre 2011</h2>
						<p>Alla fine <strong>Bisiacaria.com</strong> ha terminato la sua avventura,<br />
						quell'incredibile avventura iniziata per scherzo in una cameretta di Padova e che per nove lunghi anni ha deliziato, cambiato e
						in alcuni casi anche stravolto la vita di moltissime persone che quotidianamente frequentavano questo sito.</p>
						<p>In un tempo insospettabile, non ancora dominato dai mega social-network internazionali e dai facili "Mi piace", quando le amicizie nascevano ancora nelle piazze, nelle scuole e nei bar di paese,
						Bisiacaria.com ha saputo prendere il meglio dei rapporti umani e diffonderli verso tutte quelle persone che mai e poi mai avrebbero avuto l'opportunità di conoscersi e frequentarsi in altro modo.</p>
						<p>Molte amicizie sono nate così, molte coppie si sono formate, altre si sono lasciate e molti, moltissimi bambini semplicemente esistono grazie a questo portale e alla bella storia d'amore dei
						loro genitori che Bisia ha contribuito a far incontrare ed unire.</p>
						<p>Ora tante cose sembrano ovvie, scontate ed è legittimo credere che il proprio destino avrebbe preso la stessa piega anche senza Bisiacaria.com.
						Eppure io credo invece che per molti di noi che Bisiacaria.com l'abbiamo vissuta davvero, rimarrà per sempre la consapevolezza che questo portale è stato di sicuro un amico, un
						simpatico passatempo ma anche e soprattutto un'esperienza di vita davvero unica ed irripetibile. <strong>Un qualcosa che certamente ha valso la pena di essere vissuto.</strong></p>
						<p>Sarebbe bello quindi che questo patrimonio di ricordi ed esperienze non fosse perso e dimenticato per sempre.</p>
						<p>Se anche per te Bisiacaria.com è stata importante, <strong>lascia il tuo pensiero</strong>, Grazie.</p>
						<p class="offset12">Redbaron76</p>
						
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style" id="like">
						<a class="addthis_button_facebook_like" fb:like:href="http://ricordiamo.bisiacaria.com" fb:like:width="100" fb:like:layout="button_count"></a>
						</div>		
						<!-- AddThis Button END -->
					</div>
          		</div>
        	</div>
			<div class="row">
				<div class="grey-backg">
					<div class="span9 col-left white">
						<h2>Bisiacaria.com noi la ricordiamo così...</h2>
						<div id="rows-wrapper">
							<?php echo $rows; ?>						
						</div>
					</div>
					<div class="span6 col-right grey">
						<div id="form-wrap">
							<?php echo $form; ?>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
      	</div>

      	<footer>
        	<p>&copy; <a href="http://www.pongoweb.it" target="_blank">PongoWeb</a> 2011</p>
      	</footer>

    </div> <!-- /container -->

</body>
</html>