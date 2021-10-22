<x-template-layout>
    <div class="bg-gray-100 overflow-auto py-2 my-4">
        <h2 class="text-left font-bold uppercase">

        </h2>

    </div>

    <div class="w-full lg:w-3/4 mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-plus mr-3"></i> {{$title}}
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{(isset($transaksi))?route('transaksi.update', $transaksi->id):route('transaksi.store')}}" method="POST">
                @csrf
                @if(isset($transaksi))
                @method('PUT')
                @endif

                <div class="relative inline-block w-full text-gray-700">
                    <label class="block text-sm text-gray-600">NIS :</label>

                    <select class="bg-gray-200 w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline @error('siswa_id') border-red-500 @enderror" name="siswa_id">
                        @foreach($siswa as $data)
                        <option class="my-2" value="{{$data->id}}">{{$data->nama_siswa}}</option>
                        @endforeach

                    </select>

                    <div class="mx-1 absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="texs-xs text-red-600">@error('siswa_id') {{$message}} @enderror</div>
                </div>


                <div class="my-2">
                    <label class="block text-sm text-gray-600">semester :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('semester_siswa') border-red-500 @enderror" name="semester_siswa" type="text" placeholder="" aria-label="Name" value="{{(isset($transaksi))?$transaksi->semester_siswa:old('semester_siswa')}}">
                    <div class="texs-xs text-red-600">@error('semester_siswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">Jumlah pembayaran :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('jumlah_pembayaran') border-red-500 @enderror" name="jumlah_pembayaran" type="number" placeholder="" aria-label="Name" value="{{(isset($transaksi))?$transaksi->jumlah_pembayaran:old('jumlah_pembayaran')}}">
                    <div class="texs-xs text-red-600">@error('jumlah_pembayaran') {{$message}} @enderror</div>
                </div>


                <div class="mt-4">
                    <button class="justify-end px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded " type="submit">Simpan</button>
                </div>

            </form>
        </div>

    </div>
</x-template-layout>