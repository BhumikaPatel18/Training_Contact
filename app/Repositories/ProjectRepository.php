<?php

namespace App\Repositories;
use App\Interfaces\ProjectRepositoryInterface;
use App\Project;


class ProjectRepository implements ProjectRepositoryInterface{

    public function all()
    {
        return Project::all();
    }


    // public function store($request)
    // {
    //     return Account::create($request->all());
    // }

    // public function find($id)
    // {
    //     return Account::find($id);
    // }

    // public function update($request, $id)
    // {
    //     $input = $request->all();
    //     $account = Account::find($id);
    //     $account->fill($input);
    //     return $account->save();
    // }

    // public function delete($id)
    // {
    //     return $id->delete();
    // }
}


