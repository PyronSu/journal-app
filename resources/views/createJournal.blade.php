@extends('master')
@section('content')



{{-- place for main contents start --}}
<div class="grid grid-cols-12 grid-rows-5">
{{-- first panel start --}}
    <div class=" col-span-2 py-20 h-screen overflow-auto bg-gray-200">
    <ul class="mx-4">
    @foreach ($categories as $category)
    <li class="p-2 hover:text-green-700 hover:underline tooltip" data-tip="{{$category['category_name']}}"><i class="fa-solid fa-check-double bg-white text- p-1 rounded-md"></i> <span class="font-semibold">{{Str::limit($category['category_name'],17)}}</span></li>
    @endforeach
    <li class="p-2 hover:text-green-700 hover:underline active:text-green-900" onclick="my_modal_5.showModal()"><i class="fa-solid fa-plus bg-white p-1 rounded-md"></i> <span class="font-semibold ">New Category</span></li>
    <li class="p-2 mt-5 hover:text-green-700 hover:underline"><i class="fa-solid bg-white text- p-1 rounded-md fa-gear"></i><span class="font-semibold"> Settings</span></li>
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
    <div class="col-span-10 bg-white h-screen overflow-auto  px-5 py-2">
        {{-- <form action="{{route('save#journal')}}" method="post">
            @csrf --}}
            <div class=" flex justify-between pb-2">
                <i class="fa-solid text-xl fa-xmark cursor-pointer" onclick="my_modal_4.showModal()"></i>
                {{-- modal for confirmation before close start --}}
                    <!-- You can open the modal using ID.showModal() method -->
                        <dialog id="my_modal_4" class="modal">
                        <div class="modal-box w-3/12 max-w-5xl">
                            <h3 class="font-bold text-lg text-center">Are you sure?</h3>
                            <p class="py-4">You haven't saved your journal. Are you sure you want to delete this?</p>
                            <div class="modal-action">
                            <form action="{{route('save#journal')}}" method="post">
                                @csrf
                                <!-- if there is a button, it will close the modal -->
                                <button class="btn btn-success" name="action" value="save1" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                <a href="{{route('journal#home')}}"><button class="btn btn-error "  name="action" value="nosave1" type="button">Don't save</button></a>
                            </form>
                            <form method="dialog ">
                                <button class="btn"  name="action" value="nosave2" >Go back</button>
                                </form>
                            </div>
                        </div>
                        </dialog>
                {{-- modal for confirmation before close end --}}
                <span class="text-normal text-gray-500 font-semibold">{{$currentTime->toDateTimeString()}}</span>
                <a href=""><i class="fa-solid text-xl fa-ellipsis-vertical"></i></a>
            </div><hr>
            <div class="h-12 flex flex-row-reverse place-items-center justify-between  px-4">
                {{-- <span class="font-bold text-xl">B</span>
                <i class="fa-solid fa-underline"></i>
                <span class="font-bold text-xl">H1</span>
                <span class="font-bold text-xl">H2</span>
                <span class="font-bold text-xl text-red-600">H3</span>
                <i class="fa-solid fa-paperclip"></i>
                <i class="fa-solid fa-bookmark"></i> --}}
            </div><hr>
        <form action="{{route('save#journal')}}" method="post">
            @csrf
            {{-- write journal title here start --}}
                <label for="countries" class="block mb-2 font-medium text-gray-900 text-normal dark:text-white">Select a category</label>
                <select id="countries" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{-- <option selected value="1">General</option> --}}
                @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                @endforeach
                </select>
                @error('title')
                    <small class="text-red-600">{{$message}}</small>
                @enderror
                <input type="text" name="title" class="text-3xl w-full  font-bold border-none focus:outline-none focus:ring-0  p-2  rounded-md" placeholder="Enter Title" value="{{old('title')}}">

            {{-- write journal title here end --}}
            {{-- write journal content here start --}}
                @error('journal')
                    <small class="text-red-600">{{$message}}</small>
                @enderror
                <textarea id="message" name="journal" rows="4" class="block p-2.5 w-full h-80 overflow-auto text-normal bg-gray-100 rounded-lg border-none focus:ring-0" placeholder="Write your thoughts here...">{{old('journal')}}</textarea>
            {{-- write journal content here end --}}
                <button class="btn btn-success float-right my-3"  name="action" value="save2" type="submit">&nbsp; &nbsp;Save&nbsp;&nbsp; </button>
        </form>
    </div>
{{-- second panel end --}}

</div>
{{-- place for main contents end --}}


@endsection


