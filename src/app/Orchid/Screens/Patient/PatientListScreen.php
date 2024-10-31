<?php

namespace App\Orchid\Screens\Patient;

use App\Models\Patient;
use App\Orchid\Layouts\Patient\PatientListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PatientListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'patients' => Patient::paginate()
                //->filters(UserFiltersLayout::class)
                //->defaultSort('id', 'desc')
                //->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'PatientListScreen';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive list of all registered users, including their profiles and privileges.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->route('platform.patients.create'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            PatientListLayout::class
        ];
    }
}
