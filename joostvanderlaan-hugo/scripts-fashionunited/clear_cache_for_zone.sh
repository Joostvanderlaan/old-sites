#!/bin/sh

set -e

echo "Clearing cache for $PREFIX$NAME: $ID for files:"

cat .cache/upload.log | \
  grep "^$NAME/" | \
  # reset something, something/ and something/index.html
  sed -e 's#\(.*\)/index.html#\1\n\1/\n\1/index.html#' | \
  tee .cache/upload-$NAME.log

if [ $(wc -l < .cache/upload-$NAME.log) -eq 0 ]; then
  echo "No files have been changed, exiting"

  exit
fi

# split the upload log by 30 urls (maximum by cloudflare api per request)
rm -f .cache/upload-$NAME.log-*
split -l 30 .cache/upload-$NAME.log .cache/upload-$NAME.log-

for FILE in .cache/upload-$NAME.log-*; do
  jq -Rsc "{files: rtrimstr(\"\n\") | split(\"\n\") | map(\"https://$PREFIX\" + .)}" "$FILE" > "$FILE.json"
done

for FILE in .cache/upload-$NAME.log-*.json; do
  curl -s -X DELETE "https://api.cloudflare.com/client/v4/zones/$ID/purge_cache" \
    -H "X-Auth-Email: $CLOUDFLARE_EMAIL" \
    -H "X-Auth-Key: $CLOUDFLARE_AUTH_KEY" \
    -H "Content-Type: application/json" \
    --data "@$FILE"
done

echo
