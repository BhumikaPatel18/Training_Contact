<?php

namespace App\Repositories;
use App\Interfaces\AccountRepositoryInterface;
use App\Account;


class AccountRepository implements AccountRepositoryInterface{

    public function all()
    {
        return Account::all();
    }


    public function store($request)
    {
        return Account::create($request->all());
    }

    public function find($id)
    {
        return Account::find($id);
    }

    public function update($request, $id)
    {
        $input = $request->all();
        $account = Account::find($id);
        $account->fill($input);
        return $account->save();
    }

    public function delete($id)
    {
        return $id->delete();
    }
}


