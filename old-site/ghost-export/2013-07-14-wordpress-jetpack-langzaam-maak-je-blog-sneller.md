Standaard maakt de Wordpress Jetpack plugin allerlei verbindingen naar andere pagina's waardoor je site traag kan worden. Gelukkig is daar een oplossing voor. Een kleine aanpassing in wp-config.php zorg ervoor dat je site sneller laadt.

Toevoegen aan wp-config.php
<pre class="lang:php decode:true">/** jetpack plugin maakt geen verbinding meer met Wordpress **/
define( 'JETPACK_DEV_DEBUG', true);</pre>
&nbsp;

Standaard staan alle Jetpack onderdelen nu uit.

Alleen onderstaande kun je nog gebruiken:
Carousel
Sharing
Gravatar Hovercards
Contact Form
Shortcodes
Custom CSS
Mobile Theme
Extra Sidebar Widgets
Infinite Scroll