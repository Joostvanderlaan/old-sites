#!/bin/sh

gatsby build

# gatsby serve-build -p 8082

docker build -t mysite . 

# docker run -p 80:80 -d mysite

docker tag mysite:latest joostlaan/joostvanderlaan.nl:latest-gatsby

docker push joostlaan/joostvanderlaan.nl:latest-gatsby