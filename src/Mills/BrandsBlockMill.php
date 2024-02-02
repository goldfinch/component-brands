<?php

namespace Goldfinch\Component\Brands\Mills;

use Goldfinch\Mill\Mill;

class BrandsBlockMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
