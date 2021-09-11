<x-app-layout>
    <div class="flex flex-col h-screen items-center pt-32 px-4 md:px-0 md:pt-64">
        <h1 class="text-3xl font-bold text-left">Hi!</h1>
        <h2 class="text-3xl font-bold">We'd love to hear from you.</h2>
        @livewire('forms.contact-us')
    </div>
    @include('includes.footer')
</x-app-layout>
