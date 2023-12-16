@extends('master')
@section('content')



{{-- place for main contents start --}}
<div class="grid grid-cols-12 grid-rows-5">
{{-- first panel start --}}
    <div class=" col-span-2 py-20 h-screen overflow-auto bg-gray-200">
    <ul class="mx-4">
    @foreach ($categories as $category)
    <li class="p-2 hover:text-green-700 hover:underline"><i class="fa-solid fa-check-double bg-white text- p-1 rounded-md"></i> <span class="font-semibold">{{Str::limit($category['category_name'],17)}}</span></li>
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
        <form action="">
            <div class=" flex justify-between pb-2">
                <i class="fa-solid text-xl fa-xmark cursor-pointer" onclick="my_modal_4.showModal()"></i>
                {{-- modal for confirmation before close start --}}
                    <!-- You can open the modal using ID.showModal() method -->
                        <dialog id="my_modal_4" class="modal">
                        <div class="modal-box w-3/12 max-w-5xl">
                            <h3 class="font-bold text-lg text-center">Are you sure?</h3>
                            <p class="py-4">You haven't saved your journal. Are you sure you want to delete this?</p>
                            <div class="modal-action">
                            <form method="dialog ">
                                <!-- if there is a button, it will close the modal -->
                                <button class="btn btn-success" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                <button class="btn btn-error">Don't save</button>
                                <button class="btn">Go back</button>
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

            {{-- write journal title here start --}}
                <label for="countries" class="block mb-2 font-medium text-gray-900 text-normal dark:text-white">Select a category</label>
                <select id="countries" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a category</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="FR">France</option>
                <option value="DE">Germany</option>
                </select>
                <input type="text" name="title" class="text-3xl w-full  font-bold border-none focus:outline-none focus:ring-0  p-2  rounded-md" placeholder="Enter Title">

            {{-- write journal title here end --}}
            {{-- write journal content here start --}}
                <textarea id="message" name="journal" rows="4" class="block p-2.5 w-full h-80 overflow-auto text-normal bg-gray-100 rounded-lg border-none focus:ring-0" placeholder="Write your thoughts here...">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quod fugit corporis incidunt soluta rerum mollitia corrupti adipisci id. Perspiciatis et rerum fugit repellat repudiandae tempora sapiente laudantium aliquam nam ad assumenda alias sequi architecto, totam veritatis voluptates a adipisci est reiciendis consectetur quas voluptas sed ipsa odio. Sed nesciunt enim maxime expedita nam amet dicta sunt voluptatum perspiciatis odio illum alias quo blanditiis delectus dolores doloremque earum cupiditate, voluptatibus dolorem labore. Eligendi explicabo error perspiciatis repellendus, perferendis ab unde facilis doloremque, eum labore temporibus reiciendis voluptatum suscipit numquam optio rem, nulla voluptas? Quas, vel voluptas iste libero eaque error architecto. Nihil recusandae accusantium laborum aperiam repellendus hic magnam iste est? Labore vitae est quod deserunt nemo! Delectus alias illo earum praesentium sed, odio architecto sequi vel dignissimos tempora totam aspernatur, accusamus eveniet explicabo fugit rem quaerat. Incidunt dolore est, aspernatur amet rerum illum vel exercitationem! Similique, aperiam voluptatum quam laboriosam exercitationem adipisci numquam minima rem magnam! Dolore esse necessitatibus dolorem adipisci odio unde. Rem numquam quod maiores nihil quibusdam voluptatem nulla officia sunt, in perspiciatis, labore id aspernatur impedit quo? Iure, odio magni enim corporis eligendi nemo in. Excepturi autem quasi sit eveniet neque tempora eaque cumque facere impedit facilis dignissimos sunt ipsa ratione, fuga in dicta esse dolor obcaecati asperiores quis itaque, voluptatibus doloremque. Sunt similique dolores ipsam vitae veritatis debitis, consequuntur aut recusandae quibusdam blanditiis, cupiditate doloremque mollitia doloribus exercitationem illum quae corporis accusantium! Rerum minus nulla saepe sunt aperiam, molestiae obcaecati praesentium, placeat nostrum, tenetur exercitationem vero fugit iure? Debitis ut, aliquid, quas dignissimos possimus expedita voluptas, quasi vitae sunt quibusdam dolores accusantium ducimus omnis iure corporis! Fugiat deleniti, a veritatis voluptates minus necessitatibus, voluptatem modi neque aut veniam totam eius. Quae, ducimus corporis facere praesentium nisi consectetur cumque distinctio expedita? Recusandae error consectetur, nemo alias perspiciatis officia possimus iure molestias quaerat repudiandae quo vitae voluptas, tempore consequuntur! Accusamus necessitatibus id molestias eaque sint assumenda voluptatem repellendus rerum non iure. Incidunt ipsum, quos hic totam sit laborum, temporibus suscipit, odio ducimus inventore exercitationem quod voluptatibus? Veritatis mollitia eligendi architecto, deleniti libero vitae adipisci dolores maxime cupiditate maiores repudiandae consequatur ipsum, nemo neque ex iure tempora recusandae, nulla distinctio laboriosam sequi! Sint, fugit, molestias dolores minima voluptatem nam omnis sed cum repudiandae in explicabo, reprehenderit laboriosam non. Rerum, fugiat. Labore, natus. Doloribus natus ab odit mollitia, eligendi, omnis eos laudantium assumenda dolor voluptates rerum laboriosam tenetur sed necessitatibus iure quo quasi exercitationem, non consectetur? Praesentium atque dignissimos, officiis numquam sequi eos possimus officia quod nisi quibusdam. Iusto praesentium quisquam tempora adipisci dicta suscipit! Porro, recusandae quidem earum optio facilis fugiat voluptate libero eos explicabo fuga quod aspernatur veniam eum nisi hic corrupti a esse consectetur ad magnam similique minima sapiente ullam. Ducimus quis magnam veniam assumenda culpa optio itaque at, nam corporis sed, aut quae, voluptas porro molestiae ipsum non! Tempora porro quae beatae qui alias? Sit culpa, dicta ipsum cum vero hic explicabo dignissimos neque fugiat alias voluptatum sapiente consequuntur dolorem nulla facere aut voluptatibus impedit quo expedita quasi quibusdam? Aliquid eligendi exercitationem beatae atque placeat dolores distinctio, laborum suscipit. Ipsam pariatur, excepturi amet animi ex fugit praesentium, explicabo reiciendis autem debitis cum deserunt quas. Unde voluptates laudantium non mollitia adipisci doloremque cumque quas minus id alias quo placeat inventore iusto, perferendis sed vitae voluptatem velit vel excepturi laborum. Quam commodi qui alias placeat quia vitae aliquid, porro eaque fugit! Velit nam magnam, fuga quam quis assumenda omnis enim recusandae molestiae veritatis quas maxime iure eveniet praesentium. Asperiores, veritatis accusantium. Eveniet eaque, soluta omnis facere animi suscipit quibusdam quaerat asperiores, eligendi similique repellat placeat laudantium sit, expedita dignissimos? Adipisci quam labore pariatur iste libero similique cupiditate tenetur, impedit eos officia optio, omnis quia! Iure necessitatibus deserunt repudiandae nostrum officia voluptas reiciendis eligendi molestiae placeat, labore consequatur quidem. Recusandae sit praesentium laboriosam hic sed repellendus blanditiis ea voluptatibus harum. Illum placeat minus consequatur laudantium accusantium, exercitationem rerum, harum at enim molestiae reiciendis ab deserunt ipsum excepturi error necessitatibus dolorum eligendi vel praesentium saepe veritatis itaque omnis? Beatae molestias temporibus reprehenderit a illum accusantium veniam commodi corporis modi. Error repudiandae voluptatibus sit repellendus perspiciatis inventore neque reiciendis dicta accusamus delectus. Quos saepe mollitia nemo unde iste voluptatibus soluta suscipit aspernatur. Laboriosam obcaecati delectus enim alias officia eveniet corrupti distinctio impedit incidunt. Optio, enim ab culpa similique quasi tempore illo vero expedita reprehenderit quos sint debitis, in voluptatibus dolorem! Voluptatum asperiores consequatur quos illo reprehenderit optio ut officiis quibusdam laborum, quis ratione debitis! Impedit enim quo dignissimos numquam voluptatibus est accusamus quae, ex veritatis aliquam fuga iure deserunt quia, voluptatem dolorum distinctio eius voluptas pariatur? Placeat adipisci, possimus autem sequi obcaecati in eos eaque illo, voluptate incidunt quisquam voluptatibus unde dignissimos facilis veniam illum nobis! Quos itaque laborum, reiciendis rem explicabo incidunt natus sed libero quo ex aspernatur quasi ipsa similique ratione alias ullam est dicta labore nobis? Veritatis placeat sunt eveniet odit error saepe neque facere, fugit nobis aspernatur, tenetur asperiores animi. Quis magnam, delectus iure quaerat eos nihil quibusdam, veritatis neque illum exercitationem veniam corrupti repellat fuga nobis quia temporibus amet vitae ipsam! Eum esse harum molestiae. Quasi suscipit dolores quidem corrupti deleniti, perspiciatis, culpa repellat adipisci numquam eum perferendis. Excepturi, explicabo eaque? Hic neque cumque ipsa dolorem aliquid ipsum minus, vitae, ipsam fugiat culpa alias obcaecati quidem minima, quasi nobis. Et tempore doloribus ipsum nulla id magni quo. Ex beatae error possimus nisi nobis voluptatibus reiciendis expedita. In laboriosam eos libero perferendis ipsa quaerat est unde animi, nostrum voluptatibus quo cupiditate voluptatum reprehenderit illo reiciendis nihil fugit dicta culpa sunt dolore qui natus enim. Amet accusantium eaque sed velit, repudiandae repellendus recusandae. A, eaque veniam! Placeat illo ullam iusto aliquam dolores? Exercitationem odio et fugiat neque aspernatur dignissimos odit? Recusandae, inventore? Autem, sequi. Quam necessitatibus mollitia provident, dicta sapiente est aut illum sequi odit exercitationem facere nisi pariatur eveniet consequuntur velit, facilis labore reiciendis nesciunt! Perspiciatis qui maxime voluptas in eveniet. Quo, ipsum. Aliquam provident quo non accusantium ipsam dolorem quia, rerum, dolor cupiditate labore officiis veniam.</textarea>
            {{-- write journal content here end --}}
                <button class="btn btn-success float-right my-3" type="submit">&nbsp; &nbsp;Save&nbsp;&nbsp; </button>
        </form>
    </div>
{{-- second panel end --}}

</div>
{{-- place for main contents end --}}


@endsection


