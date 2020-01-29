---
lunr: true
title: 'Perfect looking webfonts for Chrome on Windows'
date: 2014-04-30
template: post.hbs
---

Font-face webfonts are looking terrible in Chrome on Windows by default. Luckily there is a solution
for this common problem. It does involve some work, but it's absolutely worth the trouble. (If
you're like me and can't stand the pixelated, grainy looking fonts)

##Step 1 Download the Google .TTF font from the Google Webfont directory. ##Step 2 Convert the .TTF
font on FontSquirrel so you'll get the .EOT .WOFF .SVG formats. ##Step 3 Create CSS in your `/css`
folder. In this case I'm referencing the fonts which are located in the `/fonts` folder.

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
