<?php

namespace App\Contracts\Services;

use App\Entities\Rate;

interface RateInterface
{
    /**
     * Получение курсов с массивом ентити Rate. Интерфейс, в случае если поменяется сервис тикера
     *
     * @return Rate[]
     */
    public function rates(): array;
}
