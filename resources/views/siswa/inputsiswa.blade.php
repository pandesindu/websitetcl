<x-template-layout>
    <div class="bg-gray-100 overflow-auto py-2 my-4">
        <h2 class="text-left font-bold uppercase">

        </h2>

    </div>

    <div class="w-full lg:w-3/4 mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-user-plus mr-3"></i> {{$title}}
        </p>
        <div class="leading-loose">
            <form class="p-10  rounded shadow-xl" action="{{(isset($siswa))?route('siswa.update', $siswa->id):route('siswa.store')}}" method="POST">
                @csrf
                @if(isset($siswa))
                @method('PUT')
                @endif
                <div class="my-2">
                    <label class="block text-sm text-gray-600">NIS :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('nis') border-red-500 @enderror" name="nis" type="number" placeholder="" aria-label="Name" value="{{(isset($siswa))?$siswa->nis:old('nis')}}">
                    <div class="texs-xs text-red-600">@error('nis') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">Nama :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('nama_siswa') border-red-500 @enderror" name="nama_siswa" type="text" value="{{(isset($siswa))?$siswa->nama_siswa:old('nama_siswa')}}">
                    <div class="texs-xs text-red-600">@error('nama_siswa') {{$message}} @enderror</div>
                </div>

                <div class="relative inline-block w-full text-gray-700">
                    <label class="block text-sm text-gray-600">Kelas :</label>
                    <select class="bg-gray-200 w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline @error('kelas_id') border-red-500 @enderror" name="kelas_id">
                        @foreach($kelas as $data)
                        <option class="my-2" value="{{$data->id}}">{{$data->nama_kelas}}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="texs-xs text-red-600">@error('kelas_id') {{$message}} @enderror</div>
                </div>

                <div class="relative inline-block w-full text-gray-700">
                    <label class="block text-sm text-gray-600">Jenis Kelamin :</label>
                    <select class="bg-gray-200 w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline @error('jk_siswa') border-red-500 @enderror" name="jk_siswa">
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="texs-xs text-red-600">@error('jk_siswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">Tempat dan Tanggal Lahir :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('ttl_siswa') border-red-500 @enderror" name="ttl_siswa" type="text" value="{{(isset($siswa))?$siswadetail->ttl_siswa:old('jk_siswa')}}">
                    <div clasttl_siswaxs text-red-600">@error('ttl_siswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">Alamat Siswa :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('alamat_siswa') border-red-500 @enderror" name="alamat_siswa" type="text" value="{{(isset($siswa))?$siswadetail->alamat_siswa:old('alamat_siswa')}}">
                    <div clasttl_siswaxs text-red-600">@error('alamat_siswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">Nomor HP :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('no_hp') border-red-500 @enderror" name="no_hp" type="text" value="{{(isset($siswa))?$siswadetail->no_hp:old('no_hp')}}">
                    <div clasttl_siswaxs text-red-600">@error('no_hp') {{$message}} @enderror</div>
                </div>

                <div class="mt-4">
                    <button class="justify-end px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded " type="submit">Simpan</button>
                </div>
            </form>
        </div>

    </div>
</x-template-layout>