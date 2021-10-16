<x-template-layout>
    <div class="bg-gray-100 overflow-auto py-2 my-4">
        <h2 class="text-left font-bold uppercase">

        </h2>

    </div>

    <div class="w-full lg:w-3/4 mt-6 pl-0 lg:pl-2">
        <p class="text-xl pb-6 flex items-center">
            <i class="fas fa-list mr-3"></i> {{$title}}
        </p>
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{route('siswa.store')}}" method="POST">
                @csrf
                <div class="my-2">
                    <label class="block text-sm text-gray-600">NIS</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('nis') border-red-500 @enderror" name="nis" type="number" placeholder="" aria-label="Name" value="{{(isset($siswa))?$siswa->nis:old('nis')}}">
                    <div class="texs-xs text-red-600">@error('nis') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">Nama</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('nama_siswa') border-red-500 @enderror" name="nama_siswa" type="text" value="{{(isset($siswa))?$siswa->nama_siswa:old('nama_siswa')}}">
                    <div class="texs-xs text-red-600">@error('nama_siswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">ID kelas</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('kelas_id') border-red-500 @enderror" name="kelas_id" type="text" value="{{(isset($siswa))?$siswa->kelas_id:old('kelas_id')}}">
                    <div class="texs-xs text-red-600">@error('kelas_id') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">JK</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('jk_siswa') border-red-500 @enderror" name="jk_siswa" type="text">
                    <div class="texs-xs text-red-600">@error('jk_siswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">TTL</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('ttl_siswa') border-red-500 @enderror" name="ttl_siswa" type="text">
                    <div clasttl_siswaxs text-red-600">@error('ttl_siswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">alamat siswa</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('alamat_siswa') border-red-500 @enderror" name="alamat_siswa" type="text">
                    <div clasttl_siswaxs text-red-600">@error('alamat_siswa') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">hp</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('no_hp') border-red-500 @enderror" name="no_hp" type="text">
                    <div clasttl_siswaxs text-red-600">@error('no_hp') {{$message}} @enderror</div>
                </div>

                <div class="mt-4">
                    <button class="justify-end px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded " type="submit">simpan</button>
                </div>

            </form>
        </div>

    </div>
</x-template-layout>