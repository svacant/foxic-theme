#!/bin/sh
# Fetch front-end dependencies (Bootstrap, vendor scripts, fonts)
set -e
mkdir -p css/vendor js/vendor js/vendor-special fonts/icomoon/fonts

# Bootstrap CSS and JS
curl -L -o css/vendor/bootstrap.min.css \
  https://raw.githubusercontent.com/twbs/bootstrap/v5.3.3/dist/css/bootstrap.min.css
curl -L -o js/vendor/bootstrap.bundle.min.js \
  https://raw.githubusercontent.com/twbs/bootstrap/v5.3.3/dist/js/bootstrap.bundle.min.js

# jQuery
curl -L -o js/vendor/jquery.min.js \
  https://raw.githubusercontent.com/jquery/jquery/3.7.1/dist/jquery.min.js

# Lazysizes plugins
curl -L -o js/vendor-special/lazysizes.min.js \
  https://raw.githubusercontent.com/aFarkas/lazysizes/gh-pages/lazysizes.min.js
curl -L -o js/vendor-special/ls.bgset.min.js \
  https://raw.githubusercontent.com/aFarkas/lazysizes/gh-pages/plugins/bgset/ls.bgset.min.js
curl -L -o js/vendor-special/ls.aspectratio.min.js \
  https://raw.githubusercontent.com/aFarkas/lazysizes/gh-pages/plugins/aspectratio/ls.aspectratio.min.js

# Placeholder for optional plugins
touch js/vendor-special/jquery.ez-plus.js js/vendor-special/instafeed.min.js js/vendor/vendor.min.js css/vendor/vendor.min.css

# Font Awesome icons
curl -L -o fonts/icomoon/fonts/fa-solid-900.woff2 \
  https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/webfonts/fa-solid-900.woff2
curl -L -o fonts/icomoon/fonts/fa-brands-400.woff2 \
  https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/webfonts/fa-brands-400.woff2
curl -L -o fonts/icomoon/fonts/fa-regular-400.woff2 \
  https://raw.githubusercontent.com/FortAwesome/Font-Awesome/6.x/webfonts/fa-regular-400.woff2

cat > fonts/icomoon/icons.css <<'EOF'
@font-face {
    font-family: 'Font Awesome 6 Free';
    src: url('fonts/fa-solid-900.woff2') format('woff2');
    font-weight: 900;
    font-style: normal;
}
@font-face {
    font-family: 'Font Awesome 6 Brands';
    src: url('fonts/fa-brands-400.woff2') format('woff2');
    font-weight: 400;
    font-style: normal;
}
@font-face {
    font-family: 'Font Awesome 6 Regular';
    src: url('fonts/fa-regular-400.woff2') format('woff2');
    font-weight: 400;
    font-style: normal;
}
EOF
