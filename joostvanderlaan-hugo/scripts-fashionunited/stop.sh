#!/bin/sh

set -e

if [ "$CI_ENVIRONMENT_NAME" != "production" ]; then
  ./google_cloud_auth.sh

  echo "Removing review app files..."

  gsutil -m rm -r "gs://fuww-landing/$CI_ENVIRONMENT_SLUG"

  echo "Removing review app hosts..."

  export NAME="$(echo $CI_ENVIRONMENT_URL | cut -d / -f 3 | cut -d . -f 1)"

  for CLOUDFLARE_ZONE_ID in $CLOUDFLARE_ZONE_IDS; do
    TYPE="CNAME" CONTENT="proxy-qa-kubernetes.fashionunited.com" ./delete_cloudflare_dns_record.sh
  done
fi
