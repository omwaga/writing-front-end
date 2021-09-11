<div>
    {{-- The whole world belongs to you --}}
    <div class="py-12">
        <div class="min-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg w-2/3 mx-auto">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden flex flex-row">
                                <div class="w-1/3">
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Staff Name
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Staff Level
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Staff Group
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Designation
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Institution
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Contract Date
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Contract Duration
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Renewal Agreement
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Expected Port Of Entry
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Marital Status
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Nationality
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        No of Dependants
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Staff Resident Location
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Work Permit No
                                    </p>
                                    <p class="border-b px-2 py-2 bg-gray-50 text-left text-sm   font-medium text-gray-500 uppercase tracking-wider">
                                        Diplomatic ID No.
                                    </p>
                                    <p class="px-2 py-2 border-b bg-gray-50 text-left text-sm   font-medium text-gray-500 uppercase tracking-wider">
                                        Type Of Document
                                    </p>
                                    <p class="px-2 py-2 border-b bg-gray-50 text-left text-sm   font-medium text-gray-500 uppercase tracking-wider">
                                        Travel Document No.
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 border-b text-left text-sm   font-medium text-gray-500 uppercase tracking-wider">
                                        Mobile Number
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left border-b text-sm   font-medium text-gray-500 uppercase tracking-wider">
                                        KRA PIN
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Sex
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Date Of Arrival
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Date Of Birth
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Place Of Birth
                                    </p>
                                    <p class="px-2 py-2 bg-gray-50 text-left text-sm border-b   font-medium text-gray-500 uppercase tracking-wider">
                                        Email Address
                                    </p>
                                </div>
                                <div class="w-1/3">
                                    @foreach($staffDetails as $index=>$staff)
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            {{ $staff->STAFFNAME }}
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            {{ $staff->STAFFLEVEL }}
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            {{ $staff->STAFFGROUP }}
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            {{ $staff->DESIGNATION }}
                                        </p>

                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            {{ $staff->INSTNAME }}
                                        </p>

                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->CONTRACTDATE == "")
                                                <br>
                                            @else
                                                {{ date('d/m/Y', strtotime($staff->CONTRACTDATE)) }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->CONTRACTDURATION == "")
                                                <br>
                                            @else
                                                {{ $staff->CONTRACTDURATION }}
                                            @endif
                                        </p>

                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->RENEWALAGREEMENT == "")
                                                <br>
                                            @else
                                                {{ $staff->RENEWALAGREEMENT }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->EXPECTEDPORTOFENTRY == "")
                                                <br>
                                            @else
                                                {{ $staff->EXPECTEDPORTOFENTRY }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->MARITALSTATUS == "")
                                                <br>
                                            @else
                                                {{ $staff->MARITALSTATUS }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->NATIONALITY == "")
                                                <br>
                                            @else
                                                {{ $staff->NATIONALITY }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->NOOFDEPENDANTS == "")
                                                <br>
                                            @else
                                                {{ $staff->NOOFDEPENDANTS }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->STAFFRESIDENTLOCATION == "")
                                                <br>
                                            @else
                                                {{ $staff->STAFFRESIDENTLOCATION }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->WORKPERMITNO == "")
                                                <br>
                                            @else
                                                {{ $staff->WORKPERMITNO }}
                                            @endif
                                        </p>


                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->DIPLOMATICIDNO == "")
                                                <br>
                                            @else
                                                {{ $staff->DIPLOMATICIDNO }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->TYPEOFTRAVELDOCUMENT == "")
                                                <br>
                                            @else
                                                {{ $staff->TYPEOFTRAVELDOCUMENT }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->TRAVELDOCUMENTNUMBER == "")
                                                <br>
                                            @else
                                                {{ $staff->TRAVELDOCUMENTNUMBER }}
                                            @endif
                                        </p>

                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->MOBILENUMBER == "")
                                                <br>
                                            @else
                                                {{ $staff->MOBILENUMBER }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->KRAPIN == "")
                                                <br>
                                            @else
                                                {{ $staff->KRAPIN }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->SEX == "")
                                                <br>
                                            @else
                                                {{ $staff->SEX}}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->DATEOFARRIVAL == "")
                                                <br>
                                            @else
                                                {{ date('d/m/Y', strtotime($staff->DATEOFARRIVAL)) }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->DATEOFBIRTH == "")
                                                <br>
                                            @else
                                                {{ date('d/m/Y', strtotime($staff->DATEOFBIRTH)) }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->PLACEOFBIRTH == "")
                                                <br>
                                            @else
                                                {{ $staff->PLACEOFBIRTH }}
                                            @endif
                                        </p>
                                        <p class="px-2 py-2 whitespace-no-wrap text-sm border-b">
                                            @if($staff->EMAILADDRESS == "")
                                                <br>
                                            @else
                                                {{ $staff->EMAILADDRESS }}
                                            @endif
                                        </p>

                                    @endforeach

                                </div>
                                <div class="w-1/3">
                                    <h1 class="underline mt-3 text-center">Staff Photo</h1>
                                    <img src="{{ $photo }}" alt="Image not available" style="width: auto; height: 250px"
                                         class="rounded mx-auto">
                                    @livewire('confirm-staff-image', ['staffCode'=>$staffCode])
                                </div>
                            </div>

                            <div
                                class="flex flex-row text-center mt-5 mb-5 text-center text-center mx-auto flex justify-content-center align-items-center">
                                <a href="/mfadata/staff/details/edit/{{{$staffCode}}}"
                                   class="bg-blue-500 hover:bg-blue-800 p-2 text-white rounded ml-4 mr-4">Edit
                                    Details</a>
                                <a href="/mfadata/staff/id/{{{$staffCode}}}"
                                   class="bg-blue-500 hover:bg-blue-800 p-2 text-white rounded ml-4 mr-4">Staff ID
                                    Details</a>
                                @livewire('confirm-details', ['staffCode'=>$staffCode])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
