FROM node:10.15

ARG HTTP_PROXY=http://10.0.0.40:8080
ARG NODE_ENV=development


WORKDIR /usr/src/node-app

RUN \
    npm -g config set proxy ${HTTP_PROXY} \
 && npm -g config set registry "http://registry.npmjs.org/" \
 && npm install -g \
      express \
      express-generator \
      nodemon

