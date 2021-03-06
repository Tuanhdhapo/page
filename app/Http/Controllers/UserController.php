<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }
  
    public function update(Request $request)
    {
        $data = User::find($request->fid);

        if ($request->favauser) {
            $image = $request->favauser;
            $fileName = $image->getClientOriginalName();
            $data['img_path'] = url('storage/'.$fileName);

            Storage::disk('ava_user')->put($fileName, file_get_contents($image->getRealPath()));
        }

        if ($request->fname) {
            $data->name = $request->fname;
        }

        if ($request->femail) {
            $data->email = $request->femail;
        }

        if ($request->fphone) {
            $data->phone = $request->fphone;
        }

        if ($request->fbirth) {
            $data->birthday = $request->fbirth;
        }

        if ($request->faddress) {
            $data->address = $request->faddress;
        }

        if ($request->fabout) {
            $data->about = $request->fabout;
        }

        $data->save();

        return back();
    }
}
