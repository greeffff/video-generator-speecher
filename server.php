<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
//ffmpeg \
//-t 5 -i 1.jpeg \
//-t 5 -i 2.jpeg \
//-t 5 -i 3.jpeg \
//-t 5 -i 4.jpeg  -filter_complex " \
//[0:v]zoompan=z='min(max(zoom,pzoom)+0.015,2)':s=1080x1080:d=50:x='iw/2-(iw/zoom/2)':y='ih/2-(ih/zoom/2)',fade=t=out:st=4:d=1[v0]; \
//[1:v]zoompan=z='min(max(zoom,pzoom)+0.015,2)':s=1080x1080:d=50:x='iw/2-(iw/zoom/2)':y='ih/2-(ih/zoom/2)',fade=t=in:st=0:d=1,fade=t=out:st=4:d=2[v1]; \
//[2:v]zoompan=z='min(max(zoom,pzoom)+0.015,2)':s=1080x1080:d=50:x='iw/2-(iw/zoom/2)':y='ih/2-(ih/zoom/2)',fade=t=in:st=0:d=1,fade=t=out:st=4:d=2[v2]; \
//[3:v]zoompan=z='min(max(zoom,pzoom)+0.015,2)':s=1080x1080:d=50:x='iw/2-(iw/zoom/2)':y='ih/2-(ih/zoom/2)',fade=t=in:st=0:d=1,fade=t=out:st=4:d=1[v3]; \
//[v0][v1][v2][v3]concat=n=4:v=1:a=0,format=yuv420p[v]" -map "[v]" -t 40 out_fade.mp4
