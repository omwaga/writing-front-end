<x-app-layout>
    <div class="flex justify-center py-auto content-center h-screen items-center">
        <div class="bg-white rounded-lg shadow-lg p-5 mx-3 md:mx-0 flex flex-col justify-center content-center items-center md:w-1/3
">
            <h3 class="text-red-400 text-2xl">Verify your email to continue!</h3>
            <p class="text-center">If you did not receive the email or want us to resend the email, kindly click the
                button below.</p>
            @livewire('resend-verification')
        </div>
    </div>
</x-app-layout>
