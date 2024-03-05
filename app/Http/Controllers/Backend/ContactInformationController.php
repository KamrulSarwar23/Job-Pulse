<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\Request;

class ContactInformationController extends Controller
{
    public function updateContact(Request $request)
    {
        $request->validate([
            'address' => ['nullable'],
            'email' => ['nullable'],
            'phone' => ['nullable'],
            'facebook' => ['nullable'],
            'twitter' => ['nullable'],
            'instagram' => ['nullable'],
            'map' => ['nullable'],
        ]);

        ContactInformation::updateOrCreate(

            ['id' => 1],

            [
                'address' =>  $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'instagram' => $request->instagram,
                'map' => $request->map
            ]
        );

        toastr('Updated Successfully');
        return redirect()->back();
    }
}
