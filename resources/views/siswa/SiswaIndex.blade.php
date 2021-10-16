<x-template-layout>
    <div class="bg-gray-100 overflow-auto py-2 my-4">
        <h1 class="text-left font-bold uppercase">
            {{$title}}
        </h1>
    </div>
    <div class="bg-gray-100 overflow-auto">
        <div class="bg-gray-100 overflow-auto py-2 my-4">

            <a href="{{route('siswa.create')}}"><button class="bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
                    <i class="fas fa-user-plus mr-3"></i>
                    Tambah Data Siswa</button></a>
        </div>

        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/8 text-left  border py-3 px-4 uppercase font-semibold text-sm ">NIS</th>
                    <th class="w-1/4 text-left border py-3 px-4 uppercase font-semibold text-sm">NAMA SISWA</th>
                    <th class="w-1/4 text-left border py-3 px-4 uppercase font-semibold text-sm">KELAS</th>
                    <th class="w-1/4 text-left  borderpy-3 px-4 uppercase font-semibold text-sm">ACTION</th>
                </tr>
            </thead>
            @foreach($siswa as $data)
            <tbody class="text-gray-700">

                <tr>
                    <td class="w-1/8 text-left border py-3 px-4 ">{{$data->nis}}</td>
                    <td class="w-1/8 text-left border py-3 px-4">{{$data->nama_siswa}}</td>
                    <td class="w-1/8 text-left border py-3 px-4">{{$data->kelas->nama_kelas}}</td>

                    <td class="text-left py-3 border px-4">
                        <a href="{{route('siswa.edit', $data->id)}}"><button class="my-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Edit</button></a>
                        <form action="{{route('siswa.destroy', $data->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                Delete</button>
                        </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-template-layout>