<?php

namespace App\Interfaces;

Interface AccountRepositoryInterface{

    public function all(); //index
    public function store($request); //create
    public function find($id);//edit
    public function update($request,$id); //update
    public function delete($id); //delete

}

