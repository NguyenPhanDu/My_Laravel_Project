<?php
    namespace App\Classes;
    use Illuminate\Http\Request;

    class ImageUpload{
        public function __construct()
        {
        }
        public static function upload(Request $request){
            if($request->hasFile('mainImage')){
                if($request->file('mainImage')->isValid()){
                    $request->validate([
                        'mainImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    $imageName = time().'.'.$request->mainImage->extension();
                    $request->mainImage->move(public_path('images'), $imageName);
                    return $imageName;
                }
            }
            return "";
        }
        public function __destruct()
        {
        }    
    }
?>