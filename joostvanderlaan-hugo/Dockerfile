FROM alpine:latest AS builder
MAINTAINER example@email.com

ENV HUGO_VERSION 0.55.4
ENV HUGO_SHA 3ddc76ac130176d770c0fe7cdee455b6c7e91951001e67d0778307a6881954ec
# note: Hugo extended checksum is in separate checksum file

# Install HUGO
RUN wget -O ${HUGO_VERSION}.tar.gz https://github.com/spf13/hugo/releases/download/v${HUGO_VERSION}/hugo_extended_${HUGO_VERSION}_Linux-64bit.tar.gz && \
  echo "${HUGO_SHA}  ${HUGO_VERSION}.tar.gz" | sha256sum -c && \
  tar xf ${HUGO_VERSION}.tar.gz

# Based on: https://github.com/GoogleCloudPlatform/cloud-builders-community/blob/master/hugo/Dockerfile
FROM gcr.io/distroless/cc as hugoimg
COPY --from=builder /hugo* /
COPY . .
ENTRYPOINT ["/hugo"]

# FROM hugoimg as builtsite
# # Copy rest of the application csource code
# COPY . .
# RUN hugo

FROM nginx:stable-alpine
COPY --from=hugoimg / /usr/share/nginx/html/
EXPOSE 80

## Notes
# https://kumorilabs.com/blog/k8s-3-create-deployments-services-kubernetes/


# https://danrl.com/blog/2017/my-blog-on-kubernetes/
# build site
# COPY source /source
# RUN hugo --source=/source/ --destination=/public/

# FROM nginx:stable-alpine
# COPY --from=STAGEONE /public/ /usr/share/nginx/html/
# EXPOSE 80
