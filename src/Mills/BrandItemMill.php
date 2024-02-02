<?php

namespace Goldfinch\Component\Brands\Mills;

use Goldfinch\Mill\Mill;

class BrandItemMill extends Mill
{
    public function factory(): array
    {
        return [
            'Name' => $this->faker->company(),
            'Text' => $this->faker->paragraph(10),
        ];
    }
}
