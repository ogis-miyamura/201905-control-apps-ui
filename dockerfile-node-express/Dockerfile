FROM node:10.15

ARG HTTP_PROXY=http://10.0.0.40:8080
ARG NODE_ENV=development


WORKDIR /usr/src/node-app

RUN \
    npm config set proxy ${HTTP_PROXY} \
 && npm install -g \
      express \
      express-generator \
      nodemon

