<p class="lead">Maar liefst 80% van de responstijd wordt bepaald aan de front-end.</p>
Het is vaak interessant om je server te optimaliseren maar dus nóg interessanter om je front-end te optimaliseren. De meeste front-end tijd wordt verbruikt tijdens het downloaden van alle onderdeeltjes op je website. Plaatjes, CSS, javascript, misschien zelfs Flash (hou er alsjeblieft mee op!). Voor je het weet worden er tientallen onderdeeltjes opgehaald om één webpagina te laten zien. Verminderen van het aantal onderdelen leidt tot het verminderen van het aantal HTTP requests. Verminderen van het aantal HTTP requests leidt weer tot een snellere site. Maar hoe zorg je nu dat je minder http request gebruikt om een webpagina te laden? Je zou kunnen zeggen door het design te versimpelen. Wég plaatjes, wég video, weg advertenties, wég games, en ga zo maar door. Maar dat willen we natuurlijk niet! We willen strak vormgegeven websites met geavanceerde functionaliteit. Het liefst nog supersnel ook, anders lopen de bezoekers van onze site doodleuk weg naar de concurrentie. Daarom zijn er een aantal technieken bedacht om minder http requests te maken terwijl we tóch die geweldige sites kunnen bouwen. Dit zijn:
<ul>
	<li class="p1">Combineren van CSS – in het kort: maak van meerdere .css bestanden één</li>
	<li class="p1">Combineren van JavaScript – je raadde het al; maak van meerdere .js bestanden één</li>
	<li class="p1">CSS sprites – maak van meerdere afbeeldingen één (vooral gebruikt voor iconen, buttons en andere user interface elementen, niet voor een foto bij een artikel)</li>
</ul>
<h2>CSS sprites</h2>
Bijvoorbeeld Bol.com gebruikt dit op zijn site voor verschillende iconen. Alhoewel ik er direct bij moet zeggen dat zij niet het beste voorbeeld geven aangezien er nog talloze kleine afbeeldingen geladen worden die niet in een CSS sprite staan.

<a href="http://joostvanderlaan.nl/wp-content/uploads/2013/07/bol-com-sprite.png"><img src="http://joostvanderlaan.nl/wp-content/uploads/2013/07/bol-com-sprite.png" alt="bol-com-sprite" width="60" height="112" class="alignnone size-full wp-image-115" /></a><a href="http://joostvanderlaan.nl/wp-content/uploads/2013/07/bol-com-sprite2.png"><img src="http://joostvanderlaan.nl/wp-content/uploads/2013/07/bol-com-sprite2.png" alt="bol-com-sprite2" width="62" height="150" class="alignnone size-full wp-image-116" /></a>

Wat dat betreft doet google het beter, zij hebben nagenoeg álle afbeeldingen die horen bij de besturing van de zoekpagina in één CSS sprite staan.

<a href="http://joostvanderlaan.nl/wp-content/uploads/2013/07/google-com-sprite.png"><img src="http://joostvanderlaan.nl/wp-content/uploads/2013/07/google-com-sprite.png" alt="google-com-sprite" width="167" height="389" class="alignnone size-full wp-image-117" /></a>
<h2>Let’s get it fast</h2>
<h3>Combineren van CSS &amp; Javascript</h3>
Starten doe ik met algemene tips, daarna geef ik voor Wordpress, Drupal en Magento specifieke tips. Voor Apache webserver gebruikers: installeer <a href="https://developers.google.com/speed/pagespeed/mod">mod_pagespeed</a> van Google. Simpel en doeltreffend. Naast het combineren van Javascript en CSS doet deze plugin voor nog veel meer, lees daarover op de <a href="https://developers.google.com/speed/pagespeed/mod">plugin website.</a>
<h3>CSS sprites</h3>
Op internet zijn er tools te vinden waarmee je zelf meerdere afbeeldingen tot één CSS sprite kunt laten combineren. Je upload een aantal afbeeldingen en krijgt 1 afbeelding (waar alle andere afbeeldingen in gecombineerd zijn) én een stukje CSS terug. Met die CSS kun je vervolgens alle verschillende afbeeldingen weer aanroepen. Een voorbeeld van zo’n tool is CSS sprite generator. <a href="http://spritegen.website-performance.org/">CSS sprite generator</a>
<h3>Tips voor Wordpress</h3>
Wat doet het: CSS en JS combineren (en minify, oftewel verkleinen) <a href="http://wordpress.org/extend/plugins/bwp-minify/">Better Wordpress Minify</a> Met de ‘alleskunner’ W3 total cache kan het ook, maar met deze heb ik betere ervaringen. Sommige plugins werken niet met W3, wel met <a href="http://wordpress.org/extend/plugins/bwp-minify/">Better Wordpress Minify</a>.
<h3>Tips voor Drupal</h3>
<strong>Combineren van CSS &amp; JavaScript</strong>

Drupal heeft deze functionaliteit ingebouwd. Je hoeft het alleen maar aan te zetten in: Configuration &gt; Development &gt; Performance en zet vervolgens de vinkjes aan bij:
<ul>
	<li>Aggregate and compress CSS files.</li>
	<li>Aggregate JavaScript files.</li>
</ul>
Wil je meer? Installeer dan de module <a href="http://drupal.org/project/speedy">Speedy</a>, deze module zorgt ervoor dat de javascript bestanden die gecombineerd worden een stuk kleiner zijn. (Minify) CSS sprites Drupal biedt als enige een module om CSS sprites te maken, bij de andere CMS systemen zul je het zelf moeten doen. Gebruik hiervoor <a href="http://drupal.org/project/spritesheets">Spritesheets.</a>
<h3>Tips voor Magento</h3>
Ook Magento heeft deze functionaliteit ingebouwd. Je hoeft het alleen maar aan te zetten in: Systeem &gt; Geavanceerd &gt; Ontwikkelaar en stel ‘ja’in bij:
<ul>
	<li>JavaScript-bestanden samenvoegen</li>
	<li>CSS bestanden samengevoegen</li>
</ul>
Magento voert op dit moment (versie 1.7) nog géén minify uit. Hiervoor kun je de plugins <a href="http://www.magentocommerce.com/magento-connect/fooman-speedster.html">Fooman Speedster</a>, <a href="http://www.magentocommerce.com/magento-connect/fooman-speedster-enterprise-5817.html">Fooman Speedster Enterprise</a> of <a href="http://www.magentocommerce.com/magento-connect/js-css-compression-and-minify-user-interface-optimization.html">Diglin UI optimization</a> gebruiken. (maximale mogelijkheden maar moeilijker in te stellen)