<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="deals" class="table table-hover table-bordered stripe">
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Period</th>
                            <th>Booking How</th>
                            <th>Booking By</th>
                            <th>Visibility</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Capacity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr deal="{{$event->id}}">
                                <td>
                                    {{ $event->code }}
                                </td>
                                <td>
                                    {{ $event->name }}
                                </td>
                                <td>
                                    {{ $event->description }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
