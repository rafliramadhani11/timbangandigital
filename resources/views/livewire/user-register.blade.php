<form wire:submit="create" class="space-y-3 ">
    @csrf

    <!-- NAMA AYAH / IBU -->
    <div>
        <label for="name" class="block text-sm font-medium text-slate-700">Nama Lengkap Orang Tua</label>
        <input type="text" id="name" wire:model="form.name" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" placeholder="John Dee" value="{{ old('name') }}" autofocus />
        @error('form.name')
        <small class="font-semibold text-red-500 text-start">
            {{ $message }}
        </small>
        @enderror
    </div>
    <!-- ------------------------------------------- -->
    <!-- TIPE & REGION -->
    <div class="grid gap-3 text-black grid-cols-2">
        <!-- Tipe Orang Tua -->
        <div>
            <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Tipe Orang Tua</label>
            <select id="type" wire:model="form.type" class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm placeholder-slate-400 ">
                <option value="" {{ old('type') == '' ? 'selected' : '' }} disabled></option>
                <option value="Ayah" {{ old('type') == 'Ayah' ? 'selected' : '' }}>Ayah</option>
                <option value="Ibu" {{ old('type') == 'Ibu' ? 'selected' : '' }}>Ibu</option>
                <option value="Wali" {{ old('type') == 'Wali' ? 'selected' : '' }}>Wali</option>
            </select>
            @error('form.type')
            <small class="font-semibold text-red-500 text-start">{{ $message }}</small>
            @enderror
        </div>

        <!-- REGION -->
        <div>
            <label for="region" class="block mb-2 text-sm font-medium text-gray-900">Region</label>
            <select id="region" wire:model="form.region_id" class="block w-full px-3 py-2 mt-1 text-sm bg-white border rounded-md shadow-sm placeholder-slate-400">
                <option value="" {{ old('region_id') == '' ? 'selected' : '' }} disabled>

                </option>
                @foreach ($regions as $region)
                <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>{{ $region->name }}</option>
                @endforeach
            </select>
            @error('form.region_id')
            <small class="font-semibold text-red-500 text-start">
                {{ $message }}
            </small>
            @enderror
        </div>
    </div>
    <!-- ------------------------------------------- -->
    <!-- USERNAME -->
    <div>
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
        <input type="text" wire:model="form.username" id="username" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400" placeholder="johndee1234" value="{{ old('username') }}">
        @error('form.username')
        <small class="font-semibold text-red-500 text-start">{{ $message }}</small>
        @enderror
    </div>
    <!-- ------------------------------------------------ -->
    <!-- PASSWORD -->
    <div class="relative">
        <span class="block text-sm font-medium text-slate-700 ">Password</span>
        <input type="password" id="password" wire:model="form.password" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-400">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute right-3 top-[2.1rem] cursor-pointer text-gray-400" id="notShow">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
        </svg>
        @error('form.password')
        <small class="font-semibold text-red-500 text-start">{{ $message }}</small>
        @enderror
    </div>
    <!-- ------------------------------------------------ -->
    <div>
        <button type="submit" class="w-full p-2 text-white transition-colors duration-300 bg-black rounded-md hover:bg-gray-800 focus:outline-none focus:bg-black focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
            Daftar Sekarang
        </button>
    </div>
</form>