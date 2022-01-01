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
            
            
            <form class="p-10 bg-white rounded shadow-xl" action="{{route('transaksi.update', $transaksi->_id)}}" method="POST">
                @csrf
                @method('PATCH')
                

                
                <div class="my-2">
                    <label class="block text-sm text-gray-600">Nama siswa</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('NamaSiswa') border-red-500 @enderror" name="NamaSiswa" type="text" placeholder="{{$siswa[0]->nama_siswa}}" aria-label="Name" value="{{$siswa[0]->nama_siswa}}" readonly>
                    <div class="texs-xs text-red-600">@error('NamaSiswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">NIS</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('NisSiswa') border-red-500 @enderror" name="NisSiswa" type="text" placeholder="{{$siswa[0]->nis}}" aria-label="Name" value="{{$siswa[0]->nis}}" readonly>
                    <div class="texs-xs text-red-600">@error('NisSiswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">jumlah</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('JumlahTransaksi') border-red-500 @enderror" name="JumlahTransaksi" type="number" placeholder="" aria-label="Name" value="{{(isset($transaksi))?$transaksi->JumlahTransaksi:old('JumlahTransaksi')}}">
                    <div class="texs-xs text-red-600">@error('JumlahTransaksi') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    {{-- <label class="block text-sm text-gray-600">status</label> --}}
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('StatusTransaksi') border-red-500 @enderror" name="StatusTransaksi" type="hidden" placeholder="" aria-label="Name" value="belum dibayar">
                    {{-- <div class="texs-xs text-red-600">@error('StatusTransaksi') {{$message}} @enderror</div> --}}
                </div>

             


                <div class="mt-4">
                    <button class="justify-end px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded " type="submit">Simpan</button>
                </div>

            </form>
        </div>

    </div>
</x-template-layout>