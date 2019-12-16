<?php

namespace App\Custom\Repository;

use App\Custom\Repository\General\DeleteRepository;
use App\Custom\Repository\General\EditRepository;
use App\Custom\Repository\General\ReadRepository;
use App\Custom\Repository\General\ShowRepository;
use App\Custom\Repository\General\StoreRepository;
use App\Custom\Repository\General\UpdateRepository;

abstract class GeneralRepository implements EditRepository, StoreRepository,
    ReadRepository, UpdateRepository
{
}
