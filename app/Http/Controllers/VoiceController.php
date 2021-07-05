<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoiceController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function testApi(Request $request){
        $test = urlencode($request->speech);
        $slideshow = random_int(1,999);
        $ch = file_get_contents('https://api.voicerss.org/?key='.env('API_KEY_VOICERSS').'&hl=ru-ru&src='.$test);
        file_put_contents('test.mp3',$ch);
        system('ffmpeg \
-t 5 -i 1.jpeg \
-t 5 -i 2.jpeg \
-t 5 -i 3.jpeg \
-t 5 -i 4.jpeg  -filter_complex " \
[0:v]zoompan=z=\'\min(max(zoom,pzoom)+0.015,2)\':s=1080x1080:d=50:x=\'iw/2-(iw/zoom/2)\':y=\'ih/2-(ih/zoom/2)\',fade=t=out:st=4:d=1[v0]; \
[1:v]zoompan=z=\'min(max(zoom,pzoom)+0.015,2)\':s=1080x1080:d=50:x=\'iw/2-(iw/zoom/2)\':y=\'ih/2-(ih/zoom/2)\',fade=t=in:st=0:d=1,fade=t=out:st=4:d=2[v1]; \
[2:v]zoompan=z=\'min(max(zoom,pzoom)+0.015,2)\':s=1080x1080:d=50:x=\'iw/2-(iw/zoom/2)\':y=\'ih/2-(ih/zoom/2)\',fade=t=in:st=0:d=1,fade=t=out:st=4:d=2[v2]; \
[3:v]zoompan=z=\'min(max(zoom,pzoom)+0.015,2)\':s=1080x1080:d=50:x=\'iw/2-(iw/zoom/2)\':y=\'ih/2-(ih/zoom/2)\',fade=t=in:st=0:d=1,fade=t=out:st=4:d=1[v3]; \
[v0][v1][v2][v3]concat=n=4:v=1:a=0,format=yuv420p[v]" -map "[v]" -t 40 '.$slideshow.'.mp4');
        system('ffmpeg -i '.$slideshow.'.mp4 -i test.mp3 -c:v copy -c:a aac -b:a 128k test_final.mp4');
        return response()->json(['success'=>'file put to public']);
    }
}
