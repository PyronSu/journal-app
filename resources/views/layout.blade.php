@extends('master')
@section('content')

<div class="h-screen mt-7">
    <div class="nav h-20 bg-pink-300">
    </div>

    {{-- <div class="h-2/3 w-1/5 bg-green-500"></div> --}}
    <div class="grid grid-cols-5 h-2/3 gap-10">
        <div class="sidebar bg-green-200"></div>
        <div class="content bg-yellow-200 col-span-4">
            <div class="grid grid-cols-3 grid-rows-3 gap-10">
                <div class="box h-28  row-start-3 bg-orange-400 w"></div>
                <div class="box h-28 row-start-3 bg-orange-400 w"></div>
                <div class="box h-28 row-start-3 bg-orange-400 w"></div>
            </div>
        </div>
    </div>

    <div class="footer h-20 bg-pink-300">
    </div>
</div>
@endsection
