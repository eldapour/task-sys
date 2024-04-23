<?php

namespace App\Interfaces;

Interface UserInterface {

    public function index($request);

    public function delete($request);
    public function create();

    public function store($request);

    public function edit($user);
    public function update( $request, $id);

}
