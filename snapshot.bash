#!/usr/bin/env bash

# first we want to compile the assets and begin serving them in the background
make develop &

# make sure the appropriate folders already exist
mkdir -p dist/js dist/css 2>/dev/null

# grab the main html file
wget http://localhost:8000/ -O dist/index.html
# grab the main css file
wget http://localhost:8000/css/dist.css -O dist/css/dist.css
# grab the main js file
wget http://localhost:8000/js/dist.js -O dist/js/dist.js

# and kill the server
kill %%
