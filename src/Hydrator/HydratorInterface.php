<?php

namespace App\Hydrator;

use App\Entity\Formation;

interface HydratorInterface {
    public function hydrate(Formation $formation) :void ;
    public function hydrateCollection(array $formations) :void ;
}
