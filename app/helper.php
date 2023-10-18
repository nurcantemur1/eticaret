<?php
use Illuminate\Support\Str;

if ( !function_exists('deletefile') ){
    function deletefile($string){
        if(file_exists($string)){
            if(!empty($string)){
                unlink($string);
            }
        }

    }
}

if ( !function_exists('imageupload') ){
    function imageupload($image,$name,$yol){
        $uzanti = $image->getClientOriginalExtension();
        $dosyaadi =time().'-'.Str::slug($name);
        if($uzanti != 'pdf'|| $dosyaadi != !'svg' || $dosyaadi != 'jiff' || $dosyaadi != 'webp'){
            $image->move(public_path($yol), $dosyaadi.'.'.$uzanti);
            $imageurl = $yol.$dosyaadi.'.'.$uzanti;

        }
        else{
            $image = ImageResize::make($image);
            $image->encode('webp',75)->save($yol.$dosyaadi.'.webp');
            $imageurl = $yol.$dosyaadi.'.webp';

        }
        return $imageurl;
    }
}

?>
