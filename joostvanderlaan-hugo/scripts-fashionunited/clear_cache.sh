#!/bin/sh

if [ "$CI_ENVIRONMENT_NAME" != "production" ]; then
  export PREFIX="$CI_ENVIRONMENT_SLUG-landing."
fi

curl -s "https://api.cloudflare.com/client/v4/zones?per_page=50" \
  -H "X-Auth-Email: $CLOUDFLARE_EMAIL" \
  -H "X-Auth-Key: $CLOUDFLARE_AUTH_KEY" | \
jq -r -f cloudflare.jq | \
while read -r ZONE; do
  eval "$ZONE ./clear_cache_for_zone.sh"
done
