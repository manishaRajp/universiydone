<?php

namespace App\Contracts\college;

interface CourseContract
{
    public function store(array $data);
    public function update(array $data);
}
