<?php

namespace Goldfinch\Component\Brands\Mills;

use Goldfinch\Mill\Mill;

class BrandItemMill extends Mill
{
    public function factory(): array
    {
        return [
            'Question' => substr($this->faker->sentence(), 0, -1) . '?',
            'Answer' => $this->faker->paragraph(10),
            'Disabled' => 0, // rand(1, 1) > 5 ? 0 : 1
        ];
    }
}
