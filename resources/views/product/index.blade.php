<x-app-layout>

<div class="w-full mx-auto p-5 bg-slate-100">

<x-slot name="header">
    <h1 class="text-2xl font-bold text-sky-800">{{__('Products')}}</h1>
</x-slot>

@if(session('message'))
    <p class="m-5 px-5 py-2 bg-red-300 border text-red-950">{{session('message')}}</p>
@endif

<a class="inline-block px-3 py-1 text-green-700 bg-green-200 hover:bg-green-300 font-bold my-3" href="{{route('product.create')}}">Create new product</a>

<div class="w-full p-3 flex flex-wrap justify-center">
    @foreach($products as $p)
    <div class="w-72 overflow-hidden m-1 bg-white rounded shadow">
        <div class="p-2 flex">
            <img src="" alt="" class="h-10 w-10 rounded-full bg-slate-300 mr-2">
            <div class="">
                <p class="font-bold">{{$p->user->name}}</p>
                <p class="text-[12px] text-slate-500">{{date('h:m A M j, Y',strtotime($p->created_at))}}</p>
            </div>
        </div>
        <img src="{{url('storage/'.$p->photo)}}" alt="" class="h-40 w-full">
        <div class="p-3">
            <p class="font-bold py-1">{{$p->name}}</p>
            <p class="p-1 text-[12px] text-green-700 bg-green-200"><span class="font-bold">{{$p->stock}}</span> left in stock</p>
            <p class="py-1 text-[14px] text-slate-700">{{$p->description}}</p>
            <p class="py-1 font-bold text-slate-700">${{$p->price}}</p>
            @if(auth()->user()->id == $p->user->id)
                <div class="p-1 flex justify-end">
                    <a class="bg-sky-500 text-blue-200 inline-block hover:text-white px-2" href="{{route('product.edit',$p->id)}}">{{__('Edit')}}</a>
                    <form class="inline-block" onsubmit="return confirm('Are you sure to delete?')" action="{{route('product.destroy',$p->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="bg-red-300 text-red-900 px-2 ml-1 hover:bg-red-400" type="submit" value="{{__('Delete')}}">
                    </form>
                </div>
            @endif
        </div>
    </div>
    @endforeach
</div>


</div>

</x-app-layout>