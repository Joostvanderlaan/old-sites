---
title: 'Perfect looking webfonts for Chrome on Windows'
slug: 'perfect-looking-webfonts-for-chrome-on-windows'
cover: './blue.png'
author: Joost van der Laan
date: 2014-04-30
layout: post
path: '/perfect-looking-webfonts-for-chrome-on-windows'
tags: [FrontEnd, example, webfonts, keywords]
category: 'FrontEnd'
description:
  'Font-face webfonts look terrible in Chrome on Windows by default. Luckily there is a solution for
  this common problem.'
---

Font-face webfonts look terrible in Chrome on Windows by default. Luckily there is a solution for
this common problem. It does involve some work, but it's absolutely worth the trouble. (If you're
like me and can't stand the pixelated, grainy looking fonts)

<figure class="floatRight">
	<img style="height: 310px;" src="./Gutenberg.jpg" alt="Gutenberg">
	<figcaption>Johannes Gutenberg</figcaption>
</figure>

1.  Download the Google .TTF font from the Google Webfont directory.

2.  Convert the .TTF font on FontSquirrel so you'll get the .EOT .WOFF .SVG formats.

3.  Create CSS in your `/css` folder. In this case I'm referencing the fonts which are located in
    the `/fonts` folder.

```language-css
 @font-face {
  font-family: 'Oswald';
  font-style: normal;
  font-weight: 700;
 src: url('../fonts/oswald-bold-webfont.eot');
    src: url('../fonts/oswald-bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('../fonts/oswald-bold-webfont.woff') format('woff'),
         url('../fonts/oswald-bold-webfont.ttf') format('truetype'),
         url('../fonts/oswald-bold-webfont.svg#oswaldbold') format('svg');
}
@media screen and (-webkit-min-device-pixel-ratio:0) {
    @font-face {
        font-family: 'Oswald';
          font-style: normal;
  font-weight: 700;
        src: url('../fonts/oswald-bold-webfont.svg#oswaldbold') format('svg'),
             url('../fonts/oswald-bold-webfont.woff') format('woff');
    }
```
