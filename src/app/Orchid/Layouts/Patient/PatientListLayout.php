<?php

namespace App\Orchid\Layouts\Patient;

use App\Models\Patient;
use App\Models\User;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PatientListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'patients';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('last_name', __('Name'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Patient $patient) => new Persona($patient->presenter())),
        ];
    }
}
