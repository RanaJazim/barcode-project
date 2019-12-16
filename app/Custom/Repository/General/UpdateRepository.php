<?php

namespace App\Custom\Repository\General;

interface UpdateRepository
{
    public function update(object $obj, $params);
}

