<?php

namespace App\Http\Livewire\Writer\Forms;

use App\Http\Controllers\Captchav2Controller;
use App\Mail\EmailVerification;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\WithFileUploads;
use Monarobase\CountryList\CountryListFacade;

class Registration extends Component
{
    use WithFileUploads;

    public $profilePhoto, $step;

    public $question = [];

    public $countries, $writer, $name, $firstName, $secondName, $governmentId, $certificate, $country,
        $city, $emailAddress, $university, $degree, $graduationDate, $about, $password, $email, $gender, $profile, $confirmPassword, $now;

    public function mount()
    {
        $this->step = 1;
        $countries = CountryListFacade::getList('en');
        $this->countries = $countries;
    }

    public function back($step)
    {
        $this->step = $step - 1;
    }

    protected $rules = [
        'firstName' => 'string|required|min:2',
        'secondName' => 'string|required|min:2',
        'governmentId' => 'required|mimes:jpeg,png,jpg',
        'certificate' => 'required|mimes:jpeg,png,jpg,pdf',
        'email' => 'required|email|unique:writers,email|unique:users,email',
        'degree' => 'required|string',
        'country' => 'required|string',
        'city' => 'required|string',
        'graduationDate' => 'required|date|before:today',
        'about' => 'required|min:100',
        'password' => 'required|min:8',
        'name' => 'required|string|min:5|unique:writers,name|unique:users,name',
        'gender' => 'required',
        'university' => 'required|string|min:2',
        'profilePhoto' => 'required|mimes:jpeg,jpg,png',
        'confirmPassword' => 'same:password',
    ];

    protected $messages = [

    ];

    public function firstStepValidate()
    {
        $this->validate([
            'profilePhoto' => 'image|required|mimes:png,jpeg,jpg',
            'name' => 'required|string|min:2|unique:writers,name|unique:users,name',
            'firstName' => 'required|string|min:2',
            'secondName' => 'required|string|min:2',
            'gender' => 'required|string|min:2',
            'country' => 'required|string',
            'city' => 'required|string',
            'email' => 'required|email|unique:writers,email|unique:users,email',
            'governmentId' => 'required|mimes:png,jpeg,jpg,pdf',
        ]);

        $this->step = 2;
    }

    public function secondStepValidate()
    {
        $this->validate([
            'university' => 'string|required|min:2',
            'degree' => 'string|required',
            'graduationDate' => 'date|before:today',
            'certificate' => 'required|mimes:png,jpeg,pdf,jpg',
            'about' => 'string|required|min:100'
        ]);

        $this->step = 3;
    }


    public function Register(Request $request)
    {
        $this->validate();
//        $is_not_robot = Captchav2Controller::verifyCaptcha($request);
//        if(!$is_not_robot){
//            throw \Illuminate\Validation\ValidationException::withMessages([
//                'g_recaptcha' => ['Is a robot'],
//            ]);
//        }

        $this->writer = new Writer();

        $password = Hash::make($this->password);

        $certificate_path = $this->certificate->store('public');
        $profilePhotoPath = $this->profilePhoto->store('public');
        $governmentIdPath = $this->governmentId->store('public');

        $this->writer->name = $this->name;
        $this->writer->first_name = $this->firstName;
        $this->writer->second_name = $this->secondName;
        $this->writer->gender = $this->gender;
        $this->writer->country = $this->country;
        $this->writer->city = $this->city;
        $this->writer->email = $this->email;
        $this->writer->profile_photo_path = str_replace('public/', '', $profilePhotoPath);
        $this->writer->government_id_path = str_replace('public/', '', $governmentIdPath);

        $this->writer->password = $password;
        $this->writer->university = $this->university;
        $this->writer->degree = $this->degree;
        $this->writer->graduation_year = date('Y', strtotime($this->graduationDate));
        $this->writer->certificate_path = str_replace('public/', '', $certificate_path);
        $this->writer->about = $this->about;
        $this->writer->save();

        $this->step = 4;

        Mail::to($this->email)->send(new EmailVerification($this->email));
        Auth::guard('writers')->login($this->writer);

        $request->session()->forget('not_a_robot');

        $this->redirect('available-orders');
    }

    public function render()
    {
        return view('livewire.writer.forms.registration');
    }
}


