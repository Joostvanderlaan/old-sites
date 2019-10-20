#!/bin/bash

echo "Start copying brands to domains"
date

declare -a HOSTS_WITH_BRANDS=(
"fashionunited.be:essentiel amazing-jewelry beeline charlesvoegele esprit inditex karllagerfeld lolaliza paprika-cassis s-oliver uniqlo vente-exclusive vf wefashion zeb tcog"
"fashionunited.be/fr:inditex lolaliza paprika-cassis uniqlo wefashion zeb"
"fashionunited.ch:esprit karllagerfeld tally-weijl vf wefashion"
"fashionunited.com:adidas agent-provocateur amazing-jewelry arcadia beeline pandora vandevelde superdry tous apple" # vandevelde = rigbypeller
"fashionunited.de:essentiel jimmy-choo adidas arcadia c-and-a esprit karllagerfeld modomoto pandora paprika-cassis vandevelde tally-weijl uniqlo vf wefashion zalando inditex"
"fashionunited.es:essentiel esprit karllagerfeld tous zalando uniqlo"
"fashionunited.fr:essentiel adidas c-and-a esprit karllagerfeld lolaliza paprika-cassis superdry uniqlo wefashion zalando inditex"
"fashionunited.it:karllagerfeld vf"
"fashionunited.mx:tous"
"fashionunited.nl:essentiel jimmy-choo amazing-jewelry arcadia charlesvoegele esprit hm tcog karllagerfeld kvk vandevelde lolaliza modomoto paprika-cassis s-oliver vente-exclusive wefashion zalando inditex" # vandevelde = lincherie
"fashionunited.nz:abercrombie"
"fashionunited.ru:adidas"
"fashionunited.uk:essentiel jimmy-choo adidas agent-provocateur arcadia beeline hm karllagerfeld vandevelde uniqlo vf wefashion zalando inditex"
)

# cd dist

for HOST_WITH_BRAND in "${HOSTS_WITH_BRANDS[@]}"; do
  HOST=$(echo "$HOST_WITH_BRAND" | cut -d ':' -f 1)
  BRANDS=$(echo "$HOST_WITH_BRAND" | cut -d ':' -f 2)

  echo "$HOST has brands: $BRANDS"

  for BRAND in $BRANDS; do
    mkdir content/multi-domain/$BRAND
    mkdir content/multi-domain/$BRAND/landing
    # echo "$BRAND"
    # echo "command to run: mv -r content/multi-domain/landing/images/ebp/$BRAND content/multi-domain/$BRAND/landing"
    mv content/multi-domain/landing/images/ebp/$BRAND content/multi-domain/$BRAND/landing
  done
done

echo "Finish"
date
