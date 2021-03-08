<?php

namespace App\Http\Controllers;

use App\Models\Barangayimage;
use Illuminate\Http\Request;

class BarangayimageController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'barangay_name' => 'Required',
            'city' => 'Required',
            'province' => 'Required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:500||dimensions:max_width=500,max_height=500',

        ]);

        $path = $request->file('image')->store('public/images');
        /*
        $post = new Barangayimage;

        $post->barangay_name = $request->barangay_name;
        $post->city = $request->city;
        $post->province = $request->province;
        $post->image = $path;
        $post->save();
*/
        Barangayimage::updateOrCreate(['barangay_id' => $request->barangay_id],
        ['city' => $request->city,'barangay_name' => $request->barangay_name,'province'=>$request->province,'image'=>$path]);

        return redirect('/setting/maintenance')
                        ->with('success','Post has been created successfully.');
    }




public function test(){



    echo "231312";
}
}
