<x-template-layout>
    <div class="bg-gray-100 overflow-auto py-2 my-4">
        <h2 class="text-left font-bold uppercase">
            {{$title}}
        </h2>

    </div>
    <div class="flex flex-row-reverse mx-2 my-2">
        <a href="{{route('transaksi.create')}}" class="py-2 px-4 border bg-transparent hover:bg-purple-700 border-purple-400 text-sm font-semibold text-purple-700 hover:text-white  rounded">
            Tambah transaksi</a>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    waktu transaksi
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    nis
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    nama
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    kelas
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    jumlah pembayaran
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($transaksi as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm font-medium text-gray-900">
                                        {{$data->updated_at}}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm font-medium text-gray-900">
                                        {{$data->siswa->nis}}
                                    </div>

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$data->siswa->nama_siswa}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$data->siswa->kelas->nama_kelas}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$data->jumlah_pembayaran}}</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                    <form action="{{route('transaksi.destroy', $data->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a href="{{route('transaksi.edit', $data->id)}}" class="mx-1 py-2 px-4 border bg-transparent hover:bg-purple-700 border-purple-400 text-sm font-semibold text-purple-700 hover:text-white  rounded">Edit </a>

                                        <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                                            Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-template-layout>