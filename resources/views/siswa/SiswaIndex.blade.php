<x-template-layout>
    <div class="bg-gray-100 overflow-auto py-2 my-4">
        <h2 class="text-left font-bold uppercase">
            {{$title}}
        </h2>
    </div>
    <div class="bg-white overflow-auto">
        <div class="bg-gray-100 overflow-auto py-2 my-4">

            <a href="{{route('siswa.create')}}"><button class="bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
                    tambah siswa</button></a>
        </div>

        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/8 text-left py-3 px-4 uppercase font-semibold text-sm">Nis</th>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">Nama siswa</th>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">kelas</th>
                    <th class="w-1/4 text-left py-3 px-4 uppercase font-semibold text-sm">action</th>
                </tr>
            </thead>
            @foreach($siswa as $data)
            <tbody class="text-gray-700">

                <tr>
                    <td class="w-1/3 text-left py-3 px-4">{{$data->nis}}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{$data->nama_siswa}}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{$data->kelas->nama_kelas}}</td>

                    <td class="text-left py-3 px-4">
                        <form action="{{route('siswa.destroy', $data->nis)}}" method="POST">
                            @csrf
                            @method('delete')
                            <a href="{{route('siswa.edit', $data->nis)}}"><button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    edit</button></a>

                            <button type="submit" class="bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                delete</button>
                        </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-template-layout>