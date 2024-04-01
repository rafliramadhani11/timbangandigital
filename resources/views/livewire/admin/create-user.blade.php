   <div>

       <h6 class="p-5 text-3xl font-semibold text-gray-700 bg-white rounded-lg shadow-md ">
           Buat User Baru
       </h6>

       <form wire:submit="create">
           @csrf
           <div class="grid grid-cols-1 mt-3 bg-white rounded-lg shadow-lg xl:divide-x divide-slate-400/25 lg:grid-cols-2  lg:p-12 gap-y-5">

               <div class="px-6 py-3 lg:py-0 lg:px-10">
                   <span class="text-gray-400">User Akun</span>
                   <hr class="h-0.5 border-0 my-3  bg-gray-200" />

                   <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                       <div>
                           <label for="username" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Username</label>
                           <input wire:model="form.username" value="{{ old('username') }}" type="text" id="username" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" autofocus />
                           @error('form.username')
                           <small class="font-semibold text-red-500 text-start">
                               {{ $message }}
                           </small>
                           @enderror
                       </div>

                       <div class="relative">
                           <label for="password" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Password</label>
                           <input type="password" id="password" wire:model="form.password" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" />
                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute right-3 top-[2.2rem] cursor-pointer text-gray-400" id="notShow">
                               <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                           </svg>
                           @error('form.password')
                           <small class="font-semibold text-red-500 text-start">{{ $message }}</small>
                           @enderror
                       </div>
                   </div>
               </div>

               <div class="px-6 py-3 lg:py-0 lg:px-10">
                   <span class="text-gray-400">User Info</span>
                   <hr class="h-0.5 border-0 my-3 bg-gray-200" />

                   <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                       <div>
                           <label for="name" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Nama Lengkap</label>
                           <input type="text" id="name" wire:model="form.name" value="{{ old('name') }}" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" />
                           @error('form.name')
                           <small class="font-semibold text-red-500 text-start">
                               {{ $message }}
                           </small>
                           @enderror
                       </div>

                       <div>
                           <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Pekerjaan</label>
                           <input type="text" id="pekerjaan" wire:model="form.pekerjaan" value="{{ old('pekerjaan') }}" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" />
                           @error('form.pekerjaan')
                           <small class="font-semibold text-red-500 text-start">
                               {{ $message }}
                           </small>
                           @enderror
                       </div>

                   </div>

                   <div class="grid grid-cols-1 gap-4 my-3 lg:grid-cols-3 md:grid-cols-3">

                       <div>
                           <label for="type" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Tipe Orang Tua</label>
                           <select id="type" wire:model="form.type" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400">
                               @foreach(['', 'Ayah', 'Ibu', 'Wali'] as $type)
                               <option value="{{ $type }}" {{ $type == old('type') ? 'selected' : '' }}>{{ $type }}</option>
                               @endforeach
                           </select>
                           @error('form.type')
                           <small class="font-semibold text-red-500 text-start">{{ $message }}</small>
                           @enderror
                       </div>

                       <div>
                           <label for="region" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Region</label>
                           <select id="region" wire:model="form.region_id" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400">
                               <option value="" {{ old('region_id') == '' ? 'selected' : '' }}>
                               </option>
                               @foreach ($regions as $region)
                               <option value="{{ $region->id }}" {{ old('region_id') == $region->id ? 'selected' : '' }}>
                                   {{ $region->name }}
                               </option>
                               @endforeach
                           </select>

                           @error('form.region_id')
                           <small class="font-semibold text-red-500 text-start">
                               {{ $message }}
                           </small>
                           @enderror
                       </div>

                       <div>
                           <label for="jeniskelamin" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Jenis Kelamin</label>
                           <select id="jeniskelamin" wire:model="form.jeniskelamin" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400">
                               @foreach(['', 'Laki - Laki', 'Perempuan'] as $jeniskelamin)
                               <option value="{{ $jeniskelamin }}" {{ $jeniskelamin == old('jeniskelamin') ? 'selected' : '' }}>{{ $jeniskelamin }}</option>
                               @endforeach
                           </select>

                           @error('form.jeniskelamin')
                           <small class="font-semibold text-red-500 text-start">
                               {{ $message }}
                           </small>
                           @enderror
                       </div>

                   </div>

                   <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                       <div>
                           <label for="nohp" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">No Handphone</label>
                           <input type="number" id="nohp" wire:model="form.nohp" value="{{ old('nohp') }}" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" />
                           @error('form.nohp')
                           <small class="font-semibold text-red-500 text-start">
                               {{ $message }}
                           </small>
                           @enderror
                       </div>

                       <div>
                           <label for="tgllahir" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Tanggal Lahir</label>
                           <input type="date" wire:model="form.tgllahir" id="tgllahir" value="{{ old('tgllahir') }}" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" />
                           @error('form.tgllahir')
                           <small class="font-semibold text-red-500 text-start">{{$message}}</small>
                           @enderror
                       </div>

                   </div>

                   <div class="grid grid-cols-1 gap-4 mt-3 sm:grid-cols-2">

                       <div>
                           <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Kecamatan</label>
                           <input type="text" wire:model="form.kecamatan" id="kecamatan" value="{{ old('kecamatan') }}" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" />
                           @error('form.kecamatan')
                           <small class="font-semibold text-red-500 text-start">{{$message}}</small>
                           @enderror

                       </div>

                       <div>
                           <label for="kelurahan" class="block mb-2 text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Kelurahan</label>
                           <input type="text" wire:model="form.kelurahan" id="kelurahan" value="{{ old('kelurahan') }}" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" />
                           @error('form.kelurahan')
                           <small class="font-semibold text-red-500 text-start">{{$message}}</small>
                           @enderror

                       </div>

                   </div>

                   <div class="grid grid-cols-1 gap-4 mt-3 ">
                       <div>
                           <label for="alamat" class="text-sm font-medium text-gray-900 blockfont-medium whitespace-nowrap ">Alamat</label>
                           <input type="text" wire:model="form.alamat" id="alamat" value="{{ old('alamat') }}" class="block w-full px-3 py-2 mt-1 text-sm text-black bg-white border rounded-md shadow-sm placeholder-slate-200 border-gray-400" />
                           @error('form.alamat')
                           <small class="font-semibold text-red-500 text-start">{{$message}}</small>
                           @enderror

                       </div>
                   </div>



               </div>


           </div>

           <div>
               <button type="submit" class="w-full shadow-md py-3 mt-3 mb-2 text-lg font-medium text-white bg-blue-700 rounded-lg lg:text-sm lg:w-40 px-7 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 me-2 focus:outline-none transition duration-200">Daftar Sekarang</button>
           </div>

       </form>


       @script
       <script type="text/javascript">
           $('#notShow').on('click', function() {
               var inputPassword = document.getElementById('password')
               var icon = document.getElementById('notShow')
               if (inputPassword.type === 'password') {
                   inputPassword.type = 'text'
                   $(this).removeClass('text-gray-500')
                   $(this).addClass('text-black')
                   $(this).html('<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />')
               } else {
                   inputPassword.type = 'password'
                   $(this).removeClass('text-black')
                   $(this).addClass('text-gray-500')
                   $(this).html('<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />')
               }

           })
       </script>
       @endscript
   </div>