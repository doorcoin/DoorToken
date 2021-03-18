<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDocument;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class UserVerifyController extends Controller
{
    //
    public function index(Request $request) {

        $all = [
            'Drivers License Front',
            'Drivers License Back',
            'Me Holding Drivers License'
        ];
        $existing = [];
        $available = [];

        if (!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {
            $documents = $request->user()->documents;
            foreach ($documents as $document) {
                array_push($existing, $document->type);
            }
            $available = array_diff($all, $existing);
            return view(
                'user_verify',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'user' => $request->user(),
                    'documents' => $request->user()->documents,
                    'available' => $available
                ]
            );
        }
    }

    public function add2info(Request $request) {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {
            $request->validate([
                'type' => 'required|string',
                'document' => 'required'
            ]);

            $document = new UserDocument();
            $document->fill($request->input());
            $document->user_id = $request->user()->id;

            $name = \Carbon\Carbon::now()->format(('YmdHis'));
            if($request->hasFile('document'))
            {
                $file = $request->file('document');
                $name = \Carbon\Carbon::now()->format(('YmdHis')) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/documents/', $name);
                $document->name = $name;
            }

            if ($document->save()) {
                return redirect()->route('user.verify');
            }
        }
    }
}
