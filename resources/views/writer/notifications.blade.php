<x-app-layout>
    @include('writer.top')
    @include('writer.sidebar')

    <div class="absolute top-20 bg-white rounded shadow w-2/3 ml-1/4 p-4 text-center text-xl">

        @if(count($notifications) == 0)
            <p class="text-gray-700">No new notifications</p>

        @else
            <table class="min-w-full">
                <tbody class="bg-white">
                    @foreach($notifications as $notification)

                        <tr>


                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-7 text-gray-900">
                                    <div class="text-left">
                                        {{ $notification->notification }}
                                    </div>
                                    <div class="text-sm leading-7 text-left text-gray-500">{{ @$notification->intended->name }}</div>
                                </div>
                            </td>



                            <td
                                class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                @if(Auth::user()->id === $notification->for)
                                <a href="/writer/notification/seen/{{{$notification->id}}}"
                                   class="text-indigo-600 hover:text-indigo-900 font-bold border-b">Mark Seen</a>

                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-5 mb-5">
            </div>
        @endif
    </div>
</x-app-layout>
