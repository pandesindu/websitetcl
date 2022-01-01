<x-template-layout>
    <div class="bg-gray-100 overflow-auto py-2 my-4">
        <h2 class="text-left font-bold uppercase">
            {{$title}}
        </h2>

    </div>
    <div class="flex flex-row-reverse mx-2 my-2">
        <a href="{{route('kelas.create')}}" class="py-2 px-4 border bg-transparent hover:bg-purple-700 border-purple-400 text-sm font-semibold text-purple-700 hover:text-white  rounded">
            Tambah kelas</a>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    kode kelas
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    nama kelas
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    jurusan
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($kelas as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm font-medium text-gray-900">
                                        {{$data->kd_kelas}}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$data->nama_kelas}}</div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$data->jurusan->nama_jurusan}}</div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{route('kelas.edit', $data->id)}}" class="mx-1 py-2 px-4 border bg-transparent hover:bg-purple-700 border-purple-400 text-sm font-semibold text-purple-700 hover:text-white  rounded">Edit </a>
                                    <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded" type="button" onclick="toggleModal('modal-id')">
                                        Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- modal delete data --}}
    @foreach($kelas as $data)
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="relative w-auto my-6 mx-auto max-w-sm">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
            <!--header-->
            <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
            <h3 class="text-3xl font-semibold">
                Hapus Data
            </h3>
            <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
                </span>
            </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
            <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
              apakah anda yakin ingin menghapus {{$data->nama_kelas}} ?
            </p>
            </div>
            <!--footer-->
            <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
             
                <form action="{{route('kelas.destroy', $data->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        Tidak
                    </button>
                    <button type="submit" class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                        YA, Hapus!
                    </button>


                </form>   

            
            </div>
        </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
    @endforeach

    <script type="text/javascript">
        function toggleModal(modalID){
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>
</x-template-layout>