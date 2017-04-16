<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAccount;

class AccountController extends Controller
{
    public function update(UpdateAccount $req)
    {
        $req->user()->update($req->only('name', 'avatar_id'));
        return back();
    }
}
