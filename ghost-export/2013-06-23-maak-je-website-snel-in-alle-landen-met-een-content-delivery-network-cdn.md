Waarom snel

Zo werkt een Content Delivery Network

Twee soorten Content Delivery Networks
##Push CDN
Met een Push CDN moet je jouw bestanden uploaden naar het CDN. Dit wordt meestal gedaan door automatisch kopieën naar het CDN te laten maken of een cron job die eens in de zoveel tijd upload. Gebruik je een CMS als Wordpress dan zijn er plugins om het uploaden voor je te doen zoals W3 total cache.

Het voordeel van een push CDN is dat al je content automatisch op het CDN staat. Dit is voornamelijk geschikt voor grotere websites, omdat de sitebezoeker niet hoeft te wachten totdat bestanden naar jouw CDN verplaatst zijn. Ook geeft het jou meer controle over welke bestanden op het CDN moeten staan.

Het nadeel is dat je zelf het kopieerproces in moet stellen en ervoor moet zorgen dat het altijd werkt. Daarnaast kunnen er situaties ontstaan waarbij een foto is ge-update en je 10 minuten moet wachten voordat hij naar je CDN gekopieerd is. Dit komt omdat je het kopiëren dan 1x per 10 minuten doet. Gedurende die tijd krijgen je bezoekers een 404 file not found error (alleen voor het plaatje). Je hebt dus meer controle, maar moet ook meer moeite doen om het goed in te stellen.

Deze methode wordt dan ook vaak door grotere websites gebruikt.

##Pull CDN
Je raadt het al, een pull CDN is precies het tegenovergestelde van een push CDN. Als een bezoeker een bestand (afbeelding, javascript, CSS) opvraagt en het is niet beschikbaar op het CDN, dan haalt het CDN dit bestand van jouw webserver. Vanaf dat moment staat het bestand gecached en al op het CDN. Het bestand blijft staan totdat het verlopen is. Standaard is dit vaak 24 uur, en wordt aangeduid met TTL (time to live).

Het voordeel is dat een pull CDN 'set it and forget it' is. Zet hem aan en het werkt, geen ingewikkelde configuratie nodig.

Het nadeel is dat je de flexibiliteit om te bepalen wát er op het CDN komt te staan verliest. Ook is de éérste bezoeker het haasje, de laadtijd is voor hem langer.

Voor gevorderden
Mocht je browser caching hebben ingesteld op jouw server dan worden de expiry headers (bijv. 30 dagen) zoals jouw server ze meestuurt gebruikt. Een bestand kan dan dus veel langer op het CDN blijven staan en jouw server zal nog minder belast worden. Immers, in plaats van elke 24 uur het plaatje ophalen van jouw server gebeurd dit nu nog maar 1x per 30 dagen.