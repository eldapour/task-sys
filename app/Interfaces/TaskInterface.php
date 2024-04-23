<?php

namespace App\Interfaces;

Interface TaskInterface {

    public function index($request);

    public function delete($request);
    public function create();

    public function store($request);

    public function show($task);
    public function edit($task);
    public function update( $request, $id);

}
