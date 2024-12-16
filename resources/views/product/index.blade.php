<x-app-layout>

<div class="w-full mx-auto p-5 bg-slate-100">

<x-slot name="header">
    <h1 class="text-2xl font-bold text-sky-900">Product</h1>
</x-slot>

@if(session('message'))
    <p class="m-5 px-5 py-2 bg-red-300 border text-red-950">{{session('message')}}</p>
@endif

<a class="inline-block px-3 py-1 bg-sky-500 text-sky-200 hover:text-white my-3" href="{{route('product.create')}}">Create new product</a>

<table class="w-full">
    <tr>
        <th class="p-3 border">{{__('Name')}}</th>
        <th class="p-3 border">{{__('Description')}}</th>
        <th class="p-3 border">{{__('Price')}}</th>
        <th class="p-3 border">{{__('Stock')}}</th>
        <th class="p-3 border">{{__('Photo')}}</th>
        <th class="p-3 border">{{__('Actions')}}</th>
    </tr>
@foreach($products as $p)
    <tr class="odd:bg-white even:bg-slate-50 hover:bg-slate-200">
        <td class="p-1 border">{{$p->name}}</td>
        <td class="p-1 border">{{$p->description}}</td>
        <td class="p-1 border">{{$p->price}} Afs</td>
        <td class="p-1 border">{{$p->stock}}</td>
        <td class="p-1 border"><img src="{{url('storage/'.$p->photo)}}" class="h-10" alt=""></td>
        <td class="p-1 border">
            <a class="bg-sky-500 text-blue-200 inline-block hover:text-white px-3 py-1" href="{{route('product.edit',$p->id)}}">{{__('Edit')}}</a>
            <form class="inline-block" onsubmit="return confirm('Are you sure to delete?')" action="{{route('product.destroy',$p->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input class="bg-red-300 text-red-900 px-2 py-1 ml-1 hover:bg-red-400" type="submit" value="{{__('Delete')}}">
            </form>
        </td>
    </tr>
@endforeach
</table>

</div>

</x-app-layout>