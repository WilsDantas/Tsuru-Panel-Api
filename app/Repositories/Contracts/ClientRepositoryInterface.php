<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
    public function index();
    public function paginate($per_page, $search);
    public function show($uuid);
}