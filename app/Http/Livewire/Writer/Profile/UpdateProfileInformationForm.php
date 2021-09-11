<?php

namespace App\Http\Livewire\Writer\Profile;

use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformationForm extends Component
{
    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $photo;

    /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $about;


    /**
     * The new about for the user.
     *
     * @var mixed
     */
    public $writerId;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        if(!$this->writerId){
            $this->writerId = Auth::user()->id;
        }
        $this->state = Writer::whereId($this->writerId)->first()->withoutRelations()->toArray();
    }

    /**
     * Update the user's profile information.
     *
     * @return void
     */
    public function updateProfileInformation()
    {
        $this->resetErrorBag();

        if($this->photo){
            $profilePhotoPath = $this->photo->store('public');
        }

        $writer = Writer::whereId($this->writerId)->first();

        if(isset($profilePhotoPath)){
            $writer->profile_photo_path = str_replace('public/', '', $profilePhotoPath);
        }

        $writer->about = $this->state['about'];

        $writer->update();

        $this->emit('saved');

        $this->emit('refresh-navigation-dropdown');
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();

        $this->emit('refresh-navigation-dropdown');
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('writer.profile.update-profile-information-form');
    }
}
