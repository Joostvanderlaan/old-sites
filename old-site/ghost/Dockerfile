#
# Ghost Production pull-with-GIT Dockerfile
#

# Pull base image.
FROM dockerfile/nodejs
MAINTAINER Joost van der Laan <joostvanderlaan@gmail.com>

# Latest nodejs
RUN add-apt-repository ppa:chris-lea/node.js
RUN apt-get update

RUN apt-get install -y nodejs

# Setting up ssh key to clone a private github repo. You need to put an SSH key in the folder with the Dockerfile. MAKE SURE TO REMOVE IT AFTER BUILDING THE IMAGE!
RUN mkdir -p /root/.ssh
ADD docker/id_rsa /root/.ssh/id_rsa
RUN chmod 700 /root/.ssh/id_rsa
RUN echo "Host github.com\n\tStrictHostKeyChecking no\n" >> /root/.ssh/config
RUN echo "Host bitbucket.org\n\tStrictHostKeyChecking no\n" >> /root/.ssh/config

# Pull Joostvanderlaan.nl project from github
#RUN rm -rf /ghost
RUN git clone git@bitbucket.org:joostlaan/joostvanderlaan.nl.git /joostvanderlaan.nl

# ADD . /ghost/

# RUN cd /ghost/ && npm install --production
# Remove config file
RUN rm -f /joostvanderlaan.nl/ghost/config.js
RUN cd /joostvanderlaan.nl/ghost && npm install --production 
RUN cd /joostvanderlaan.nl/ghost && sed 's/127.0.0.1/0.0.0.0/' /joostvanderlaan.nl/ghost/config.joost.js > /joostvanderlaan.nl/ghost/config.js

# Add files
ADD start.bash /ghost-start

# Set environment variables.
ENV NODE_ENV production

# Define mountable directories.
VOLUME ["/data", "/ghost-override"]

# Define working directory.
WORKDIR /joostvanderlaan.nl/ghost

# Define default command.
CMD ["bash", "/ghost-start"]
# CMD ["npm","start"]

# Expose ports.
EXPOSE 2368