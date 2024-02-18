@extends('master')
@section('content')



{{-- place for main contents start --}}
<div class="grid grid-cols-12 grid-rows-5">
{{-- first panel start --}}
    <div class=" col-span-2 py-20 h-screen overflow-auto bg-gray-200">
    <ul class="mx-4">
    <a href="{{route('create#journal')}}"><li class=" mb-3 bg-slate-300 border rounded-lg p-3 hover:text-green-700 hover:bg-slate-400 active:text-green-900"><i class="fa-solid fa-plus bg-white p-1 rounded-md"></i> <span class="font-semibold ">New Journal</span></li></a>
    @foreach ($categories as $category)
    <li class="p-2 hover:text-green-700 hover:underline tooltip" data-tip="{{strtolower($category['category_name'])}}"><i class="fa-solid fa-check-double bg-white text- p-1 rounded-md"></i> <span class="font-semibold">{{Str::limit($category['category_name'],17)}}</span></li><br>
    @endforeach
    <li class="p-2 hover:text-green-700 hover:underline active:text-green-900" onclick="my_modal_5.showModal()"><i class="fa-solid fa-plus bg-white p-1 rounded-md"></i> <span class="font-semibold ">New Category</span></li>
    <a href="{{route('setting#setting')}}"><li class="p-2 mt-5 hover:text-green-700 hover:underline"><i class="fa-solid bg-white text- p-1 rounded-md fa-gear"></i><span class="font-semibold"> Settings</span></li></a>
    </ul>
    </div>

    {{-- modal to create new category start --}}
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <div class="flex justify-between">
                <span class="font-bold text-lg">Your New Category</span>
                <form method="dialog">
                <button class="border-none"><i class="fa-solid fa-xmark font-semibold text-xl"></i></button>
                </form>
            </div>
            <form action="{{route('create#Category')}}" method="POST">
                @csrf
                <div class="font-semibold mt-3 mb-2">Category ID - {{$category_id}} </div>
                <div class="font-semibold mt-3 mb-2">Category Name</div>
                <input type="text" name="category_name" placeholder="Type here" class="input w-full max-w-xs" required/><br>
                <button type="submit" class="btn float-right active:bg-green-700 active:text-white font-semibold">Create</button>
            </form>
            <div class="modal-action">

            </div>
        </div>
        </dialog>
    {{-- modal to create new category end --}}
{{-- first panel end --}}

{{-- second panel start --}}
    <div class="h-screen overflow-auto col-span-4 bg-white p-1">
        {{-- search bar start --}}
            <form class="flex items-center my-3  mt-5">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="simple-search" class=" border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-black  rounded-lg border hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
            </form>
            <hr>
        {{-- search bar end --}}

        {{-- show alert here after successful creation of journal start--}}
        @if(session('insertSuccess'))
        Hello
        @endif
        {{-- show alert here after successful creation of journal end--}}

        @if(count($journals)>0)
        @foreach ($journals as $journal)
        {{-- journal list start --}}
            <form method="post" href="javascript:void(0)" onclick="showFunc({{$journal['id']}})" class="flex flex-col items-center mt-2 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="flex flex-col justify-between p-3 leading-normal" >
                <input type="hidden" id="id" name="id" value={{$journal['id']}}>
                <span class="mb-1 text-lg font-bold tracking-tight text-gray-900 dark:text-white">{{Str::limit($journal['title'],37,'...') ?? 'No title'}}</span>
                <p class="mb-2 font-normal text- text-gray-700 dark:text-gray-400">{{Str::limit($journal['journal'],150,'...')}}</p>
            <span class="text-sm">{{ \Carbon\Carbon::parse($journal['created_at'])->format('F j, Y') }}
            </span>
            </div>
            {{-- <div class="border p-3 rounded mr-2">
                <span>SAT</span>
                <span>3/12</span>
            </div> --}}
        </form>
        {{-- journal list end --}}
        @endforeach
        @else
        <p>No journals found.</p>
        @endif
        

    </div>
{{-- second panel end --}}

{{-- third panel start --}}
@if(count($journals)>0)
    <div class="bg-white h-screen overflow-auto col-span-6 px-5 py-2">
            <div class=" flex justify-between pb-2">
                <a href=""><i class="fa-solid text-xl fa-xmark"></i></a>
                <span class="text-normal text-gray-500 font-semibold" id="journalTime">
                    <?php
                    $originalData = Carbon\Carbon::parse($journals[0]['created_at']);
                    $formattedData = $originalData->format('F j, Y g:i:s A');
                    echo $formattedData;
                ?>
                </span>
                <button href="" class="dropdown" id="dropdownDefaultButton" data-dropdown-toggle="dropdown"><i class="fa-solid text-xl fa-ellipsis-vertical"></i></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                          </li>
                          <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                          </li>
                        </ul>
                    </div>

            </div><hr>
            <div class="h-12 flex place-items-center justify-between  px-4">
                {{-- <span class="font-bold text-xl">B</span>
                <i class="fa-solid fa-underline"></i>
                <span class="font-bold text-xl">H1</span>
                <span class="font-bold text-xl">H2</span>
                <span class="font-bold text-xl text-red-600">H3</span>
                <i class="fa-solid fa-paperclip"></i>
                <i class="fa-solid fa-bookmark"></i> --}}
            </div><hr>
            <div class="text-3xl my-3 font-bold" id="journalTitle">{{$journals[0]['title'] ?? 'No title yet'}}</div>
            <p class="" id="journalContent">{{$journals[0]['journal'] ?? 'No journal yet'}}</p>



    </div>
@else
@endif
{{-- third panel end --}}


</div>
{{-- place for main contents end --}}


<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'x-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function myfun(){
        $id=document.getElementById("getID").value;
        alert("hello" + {{$journals[0]['id'] ?? 'no journal yet'}}+ $id);
    }
    function showFunc(id){
       $.ajax({
        type: "POST",
        url: "{{ url('get/journal') }}",
        data: {id:id},
        dataType: 'json',
        success: function(res){
            console.log(res);
            $('#journalTitle').html(res.title);
            $('#journalContent').html(res.journal);
            const formattedTime = new Date(res.created_at).toLocaleString('en-US',{
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                second: 'numeric',
                hour12: true
            });
            $('#journalTime').html(formattedTime);
        },
        error: function(){
            console.log('try again');
        }
       });
    }
</script>
@endsection


