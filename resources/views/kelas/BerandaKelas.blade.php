<x-template-layout>
    <div class="bg-gray-100 overflow-auto py-2 my-4">
        <h2 class="text-left font-bold uppercase">
            {{$title}}
        </h2>

    </div>
    <div class="bg-gray-100 overflow-auto">
        <div class="bg-gray-100 overflow-auto py-2 my-4">

            <a href="{{route('kelas.create')}}"><button class="bg-transparent hover:bg-purple-500 text-purple-700 font-semibold hover:text-white py-2 px-4 border border-purple-500 hover:border-transparent rounded">
                    <i class="fas fa-plus mr-3"></i>
                    Tambah Kelas</button></a>
        </div>

        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/8 text-left border py-3 px-4 uppercase font-semibold text-sm">KODE KELAS</th>
                    <th class="w-1/4 text-left border py-3 px-4 uppercase font-semibold text-sm">NAMA KELAS</th>
                    <th class="w-1/4 text-left border py-3 px-4 uppercase font-semibold text-sm">ACTION</th>
                </tr>
            </thead>
            @foreach($kelas as $data)
            <tbody class="text-gray-700">

                <tr>
                    <td class="w-1/3 text-left border py-3 px-4">{{$data->kd_kelas}}</td>
                    <td class="w-1/3 text-left border py-3 px-4">{{$data->nama_kelas}}</td>
                    <td class="text-left py-3 border px-4">
                        <a href="{{route('kelas.edit', $data->id)}}"><button class="my-2 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Edit</button></a>
                        <form action="{{route('kelas.destroy', $data->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-template-layout>