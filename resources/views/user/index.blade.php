<x-app-layout>

<x-slot name="header">
    <p class="font-bold text-xl text-blue-600">{{__('Users')}}</p>
</x-slot>

<div class="m-3 bg-slate-100">

    <table class="w-full border">
        <thead>
            <tr>
                <th class="border-2 border-slate-200 p-3">ID</th>
                <th class="border-2 border-slate-200 p-3">{{__('Name')}}</th>
                <th class="border-2 border-slate-200 p-3">{{__('Email')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="odd:bg-white">
                    <td class="border-2 border-slate-200 p-3">{{ $user->id }}</td>
                    <td class="border-2 border-slate-200 p-3">{{ $user->name }}</td>
                    <td class="border-2 border-slate-200 p-3">{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

</x-app-layout>