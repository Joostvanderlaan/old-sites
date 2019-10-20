#!/bin/sh

cat > gcloud-service-key.json <<EOF
$GOOGLE_CLOUD_SERVICE_KEY
EOF
gcloud auth activate-service-account --key-file gcloud-service-key.json
gcloud config set project "$GOOGLE_CLOUD_PROJECT_ID"
