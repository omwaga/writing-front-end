<?php


namespace Tanthammar\TallForms;

/**
 * Optional class to extend, if you have Trait method naming, collisions
 * @package App\Http\Livewire
 */
abstract class TallFormComponent extends \Livewire\Component
{
    use TallForm;
}
