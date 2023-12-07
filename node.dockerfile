FROM node:18-alpine
WORKDIR /var/www/html
CMD sh -c "npm install && npm run build"

