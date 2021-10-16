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
            <form class="p-10 bg-white rounded shadow-xl" action="{{(isset($kelas))?route('kelas.update', $kelas->id):route('kelas.store')}}" method="POST">
                @csrf
                @if(isset($kelas))
                @method('PUT')
                @endif
                <div class="my-2">
                    <label class="block text-sm text-gray-600">Kode Kelas :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('kd_kelas') border-red-500 @enderror" name="kd_kelas" type="text" placeholder="contoh: IPA2019" aria-label="Name" value="{{(isset($kelas))?$kelas->kd_kelas:old('kd_kelas')}}">
                    <div class="texs-xs text-red-600">@error('kd_kelas') {{$message}} @enderror</div>
                </div>

                <div class="my-2">
                    <label class="block text-sm text-gray-600">Nama Kelas :</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded @error('kd_kelas') border-red-500 @enderror" name="nama_kelas" type="text" placeholder="contoh: XI IPA1" aria-label="Name" value="{{(isset($kelas))?$kelas->nama_kelas:old('nama_kelas')}}">
                    <div class="texs-xs text-red-600">@error('nama_kelas') {{$message}} @enderror</div>
                </div>

                <div class="mt-4">
                    <button class="justify-end px-4 py-1 text-white font-light tracking-wider bg-blue-500 rounded " type="submit">Simpan</button>
                </div>

            </form>
        </div>

    </div>
</x-template-layout>