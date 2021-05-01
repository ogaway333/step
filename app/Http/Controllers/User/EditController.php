<?php

namespace App\Http\Controllers\User;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;


//ユーザー情報の編集
class EditController extends Controller
{
    public function index() {
        $auth = Auth::user();
        return view('user.edit', ['auth' => $auth]);
    }

    //ユーザー情報の更新
    public function update(Request $request) {
        $myEmail = Auth::user()->email;
        $request->validate([
            'icon'=>['file','mimes:jpeg,png,jpg','max:5120'],
            'name'=>['required','string','max:30'],
            'profile'=>['nullable','string','max:1000'],
            'email' => ['required', 'string', 'email:strict,dns', 'max:255', Rule::unique('users', 'email')->whereNot('email', $myEmail)],
        ]);
        $user = new User;
        $user_id = Auth::id();
        if($file = $request->icon){
            //保存するファイルに名前をつける    
               $fileName = time().'.'.$file->getClientOriginalExtension();
            //Laravel直下のpublicディレクトリに新フォルダをつくり保存する
               $target_path = public_path('/uploads/');
               $file->move($target_path,$fileName);
        }else{
            $user->where('id', $user_id)->update([
                'name' => $request->name,
                'profile' => $request->profile,
                'email' => $request->email
            ]);
            return redirect('/home', 301)->with('flash_message', 'ユーザー情報が更新されました');;            
        }
        $user->where('id', $user_id)->update([
            'icon' => $fileName,
            'name' => $request->name,
            'profile' => $request->profile,
            'email' => $request->email
        ]);
        return redirect('/home', 301)->with('flash_message', 'ユーザー情報が更新されました');
            
    }
}
