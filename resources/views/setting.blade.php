@extends('master')
@section('content')


{{-- place for main contents start --}}
<div class="grid grid-cols-12 grid-rows-5">
{{-- first panel start --}}
    <div class=" col-span-2 py-20 h-screen overflow-auto bg-gray-200">
    <ul class="mx-4">
    @foreach ($categories as $category)
    <li class="p-2 hover:text-green-700 hover:underline tooltip" data-tip="{{strtolower($category['category_name'])}}"><i class="fa-solid fa-check-double bg-white text- p-1 rounded-md"></i> <span class="font-semibold">{{Str::limit($category['category_name'],17)}}</span></li><br>
    @endforeach
    <li class="p-2 hover:text-green-700 hover:underline active:text-green-900" onclick="create()" data-modal-target="default-modal" data-modal-toggle="default-modal"><i class="fa-solid fa-plus bg-white p-1 rounded-md"></i> <span class="font-semibold ">New Category</span></li>
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
    <div class=" col-span-10  h-screen overflow-auto">
        {{-- category setting card start --}}
            <div class="flex flex-row justify-between w-2/5 p-4 border-1 border-gray-700 bg-gray-300">
                <div class="font-bold self-center text-xl">Category</div>
                <i class="self-center fa-solid fa-gear"></i>
            </div>
            <div class=" w-2/5 h-4/5 bg-gray-100 overflow-auto">
            {{-- table start --}}
                <div class="">
                    <div class="" id="test"></div>
                    <table class="table" id="categoryTable">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th class="text-center">Id</th>
                          <th class="text-center">Name</th>
                          <th class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody id="">
                          @if (isset($categories))
                              @foreach ($categories as $category)
                              <tr id="categoryRow" data-category-id="{{$category['id']}}">
                                  <td>{{$category['id']}}</td>
                                  <td>{{$category['category_name']}}</td>
                                  <td class="text-center">
                                        <button class="btn" onclick="edit({{$category['id']}})" data-modal-target="default-modal" data-modal-toggle="default-modal"><i class="fa-solid fa-pen"></i></button>
                                        <button class="btn"><i class="fa-solid fa-trash"></i></button>
                                  </td>
                              </tr>
                              @endforeach
                          @endif
                      </tbody>
                    </table>

                </div>
            {{-- table end --}}

            {{-- modal to edit start --}}
                {{-- <div class="card w-96 bg-base-100 shadow-xl" id="category-modal">
                    <div class="card-body">
                    <div class="card-actions justify-between">
                        <span class="font-bold text-xl">Edit Category</span>
                        <button class="btn btn-square btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                    <form action="javascript:void(0)">
                        <div class="font-semibold">Edit Category Name: </div>
                        <input type="text" class="input input-bordered my-2 w-full">
                        <button type="submit" class="btn float-right">Submit</button>
                    </form>
                    </div>
                </div> --}}
            {{-- modal to edit end --}}

            {{-- modal to edit start flowbite --}}
                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center  md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="formTitle">
                                        Edit Category
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 md:p-5 space-y-4 h-40">
                                    <form action="javascript:void(0)" id="editCategoryForm" method="POST">
                                        <input type="hidden" id="id" name="id">
                                        <div class="font-semibold" id="labelText">Edit Category Name: </div>
                                        <input type="text" name="category" id="category" class="input input-bordered my-2 w-full">
                                        <button type="submit" class="btn float-right" data-modal-hide="default-modal">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
            {{-- modal to edit end flowbite --}}
            </div>


        {{-- category setting card end --}}
    </div>
{{-- second panel end --}}

</div>
{{-- place for main contents end --}}

<script type="text/javascript">
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  });
  function add(){
    my_modal_5.showModal();
  }
  function create(){
    $('#formTitle').html("Create Category");
    $('#labelText').html("Create Category Name: ");
    $('#editCategoryForm').trigger('reset');
  }
  function edit(id){
    $('#formTitle').html("Edit Category");
    $('#labelText').html("Edit Category Name: ");
    $.ajax({
        type: "POST",
        url: "{{ route('edit-category') }}",
        data: {id:id},
        dataType: 'json',
        success: function(res){
            console.log(res);
            $('#id').val(res.categorydata.id);
            $('#category').val(res.categorydata.category_name);
           // console.log(res.categorydata.category_name);
        },
        error: function (xhr, status, error) {
    console.error(xhr.responseText);
    console.error(status);
    console.error(error);
}
    });
  }
  $('#editCategoryForm').submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: "{{ url('store') }}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            var categoryId = data.id;
            var categoryName = data.category_name;

            // Find the corresponding table row and update the content
            var rowToUpdate = $('#categoryTable tr[data-category-id="' + categoryId + '"]');
            rowToUpdate.find('td:eq(1)').text(categoryName);
            $('#editCategoryForm').trigger('reset');
        },
        error: function (data) {
            console.log("Try again");
        }
    });
});

</script>
@endsection


