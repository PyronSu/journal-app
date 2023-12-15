@extends('master')
@section('content')



{{-- place for main contents start --}}
<div class="grid grid-cols-12 grid-rows-5">
{{-- first panel start --}}
    <div class=" col-span-2 py-20 h-screen bg-gray-200">
    <ul class="mx-4">
    @foreach ($categories as $category)
    <li class="p-2 hover:text-green-700 hover:underline"><i class="fa-solid fa-check-double bg-white text- p-1 rounded-md"></i> <span class="font-semibold">{{$category['category_name']}}</span></li>
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
            <form action="{{route('journal#homepage')}}" method="POST">
                @csrf
                <div class="font-semibold mt-3 mb-2">Category ID</div>
                <input type="text" placeholder="You can't touch this" class="input input-bordered w-full max-w-xs" disabled />
                <div class="font-semibold mt-3 mb-2">Category Name</div>
                <input type="text" name="category_name" placeholder="Type here" class="input w-full max-w-xs" /><br>
                <button class="btn float-right active:bg-green-700 active:text-white font-semibold">Create</button>
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

        @for ($i=0;$i<5;$i++)
        {{-- journal list start --}}
            <a href="#" class="flex flex-col items-center mt-2 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="flex flex-col justify-between p-3 leading-normal">
                <span class="mb-1 text-lg font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions.....</span>
                <p class="mb-2 font-normal text- text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order. I love coding, algorithms.....</p>
                <span class="text-sm">9:11</span>
            </div>
            <div class="border p-3 rounded mr-2">
                <span>SAT</span>
                <span>3/12</span>
            </div>
            </a>
        {{-- journal list end --}}
        @endfor

    </div>
{{-- second panel end --}}

{{-- third panel start --}}
    <div class="bg-white h-screen overflow-auto col-span-6 px-5 py-2">
            <div class=" flex justify-between pb-2">
                <a href=""><i class="fa-solid text-xl fa-xmark"></i></a>
                <span class="text-normal text-gray-500 font-semibold">Thursday, 14 December 2023, 7:17</span>
                <a href=""><i class="fa-solid text-xl fa-ellipsis-vertical"></i></a>
            </div><hr>
            <div class="h-12 flex place-items-center justify-between  px-4">
                <span class="font-bold text-xl">B</span>
                <i class="fa-solid fa-underline"></i>
                <span class="font-bold text-xl">H1</span>
                <span class="font-bold text-xl">H2</span>
                <span class="font-bold text-xl text-red-600">H3</span>
                <i class="fa-solid fa-paperclip"></i>
                <i class="fa-solid fa-bookmark"></i>
            </div><hr>
            <div class="text-3xl my-3 font-bold">Exploring different cultures around the world</div>
            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem repudiandae dolore deserunt libero tempora unde odit eveniet dolor inventore quidem magnam itaque mollitia, necessitatibus temporibus blanditiis laudantium! Consequatur beatae odit blanditiis porro! Assumenda nostrum minus blanditiis ullam quos veniam deleniti? Error aspernatur provident nulla? Sint aliquid commodi eaque necessitatibus enim quisquam veniam sapiente! Non voluptatibus fugiat voluptates nam molestiae sapiente atque, a repellat, facere, corrupti sint quisquam quae in. Omnis officiis, distinctio doloremque blanditiis veniam esse atque delectus cumque nostrum minima at nobis quas sunt neque ipsam iste voluptates eligendi laudantium magnam ea beatae placeat natus? Quaerat officia aperiam quas?     Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet suscipit, delectus, aperiam dignissimos necessitatibus voluptate architecto, officiis animi molestiae modi dolorem expedita illo. Tempore sequi quidem recusandae veniam, aut culpa sit sunt? Temporibus accusamus itaque deserunt est iure quisquam perferendis repellat sint, ea doloremque fugit, ad pariatur. Maxime, consequatur sequi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, sequi incidunt magnam repellat repellendus vero dolorem beatae doloremque cupiditate, eaque numquam veniam voluptatibus eum quod, doloribus molestias repudiandae quia unde dicta illum! Odit totam doloremque optio. Minima eos necessitatibus voluptatibus reprehenderit nostrum quo perferendis ad perspiciatis blanditiis pariatur consectetur earum cumque ipsa labore unde commodi, exercitationem consequatur corporis dignissimos debitis molestiae. Eos praesentium, in eum consequuntur magni beatae similique obcaecati odio architecto earum maxime culpa voluptatum minus facere laboriosam aperiam quae. Minus odit nulla enim suscipit tempora id voluptatibus ea facilis molestiae deserunt ab optio, illum error doloremque sunt. Ea.</p>
    </div>
{{-- third panel end --}}

</div>
{{-- place for main contents end --}}


@endsection


