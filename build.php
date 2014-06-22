<?php

// a poor man"s gulp

$jsfile = function ($name) {
    return "./public/js/{$name}";
};

$cssfile = function ($name) {
    return "./public/css/{$name}";
};

$vendorjs = function ($name) use ($jsfile) {
    return $jsfile("vendor/{$name}");
};

$vendorcss = function ($name) use ($cssfile) {
    return $cssfile("vendor/{$name}");
};

$concat = function (array $files, $separator) {
    $result = "";

    foreach ($files as $file) {
        $result .= file_get_contents($file) . $separator;
    }

    return $result;
};

$js_files_to_concatenate = [
    $vendorjs("modernizr.custom.js"),
    $vendorjs("jquery.min.js"),
    $vendorjs("prism.js"),
    $vendorjs("deck.core.js"),
    $vendorjs("deck.status.js"),
    $jsfile("app.js"),
];

file_put_contents($jsfile("dist.js"), $concat($js_files_to_concatenate, ";"));

$css_files_to_concatenate = [
    $vendorcss("deck.core.css"),
    $vendorcss("deck.status.css"),
    $vendorcss("swiss.css"),
    $vendorcss("vertical-slide.css"),
    $vendorcss("print.css"),
    $vendorcss("prism.css"),
    $cssfile("style.css"),
];

file_put_contents($cssfile("dist.css"), $concat($css_files_to_concatenate, "\n"));
