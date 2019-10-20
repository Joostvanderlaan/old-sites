#!/bin/bash

# if [ -f "$VRSNFILE" ]; then
#     # Get new image version from update-generated file and build new image.
    # tag=$(cat "$VRSNFILE")
    tag=latest
#     echo "Image eu.gcr.io/${PROJECT}/${IMGNAME}:${tag} NOT found. Building new..."
    docker build -t "eu.gcr.io/${PROJECT}/${IMGNAME}:${tag}" -t "eu.gcr.io/${PROJECT}/${IMGNAME}" -f "$DCRFILE" .
    docker push "eu.gcr.io/${PROJECT}/${IMGNAME}:${tag}"
    docker push "eu.gcr.io/${PROJECT}/${IMGNAME}"
# else
    # Get image version from Dockerfile
    # line=$(sed -n -e "/$SEARCHSTR /p" "$DCRFILE")
    # tag=$(echo "${line##* }")
    # echo "Image eu.gcr.io/${PROJECT}/${IMGNAME}:$tag exists in GCR, proceeding without new build..."
# fi