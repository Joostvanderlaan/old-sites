#!/bin/sh

set -e

(cd hugo/src && npm install && npm run hugo:build)

./google_cloud_auth.sh

mkdir -p .cache

echo "Synchronizing files..."

gsutil -m rsync -crd hugo/dist "gs://fuww-landing/$CI_ENVIRONMENT_SLUG" 2>&1 \
  | sed -ne 's#^Copying file://hugo/dist/\(.*\) \[Content-Type=\(.*\)\]\.\.\.$#\1#p' \
  | tee .cache/upload.log

echo

if [ "$CI_ENVIRONMENT_NAME" != "production" ]; then
  echo "Creating review app hosts..."

  export NAME="$(echo $CI_ENVIRONMENT_URL | cut -d / -f 3 | cut -d . -f 1)"

  for CLOUDFLARE_ZONE_ID in $CLOUDFLARE_ZONE_IDS; do
    TYPE="CNAME" CONTENT="proxy-qa-kubernetes.fashionunited.com" PROXIED="true" ./add_cloudflare_dns_record.sh
  done

  cat << EOF

  Landing pages are available at:
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.uk
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.es
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.com.ar
  https://$CI_ENVIRONMENT_SLUG-landing.au.fashionunited.com
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.be/fr
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.be
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.ca
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.cl
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.cn
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.co
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.fr
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.de
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.in
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.it
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.mx
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.nz
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.com.pe
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.ru
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.ch
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.nl
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.com
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.at
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.com.br
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.cz
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.dk
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.fi
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.hk
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.ie
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.lu
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.no
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.pl
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.pt
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.se
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.com.tr
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.hu
  https://$CI_ENVIRONMENT_SLUG-landing.fashionunited.jp
EOF
fi

echo "Clearing cloudflare cache..."

./clear_cache.sh
