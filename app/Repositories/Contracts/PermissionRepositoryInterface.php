<?php

namespace App\Repositories\Contracts;

interface PermissionRepositoryInterface
{
    public function index();
    public function paginate($per_page, $search);
    public function store($request);
    public function show($uuid);
    public function update($request, $uuid);
    public function destroy($uuid);
}