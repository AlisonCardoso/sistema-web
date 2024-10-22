<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Cadastro de Oficina') }}
        </h2>
        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-gray-200 dark:bg-slate-800 p-6 rounded-lg shadow-md w-1/2 mt-5">
        @if (session()->has('success'))
        <span class="text-green-500 my-3">{{ session('success') }}</span>
   @endif
    <form  class="border-b-2 pb-10"method="post" action="@if (isset($edit->id)){{ route('workshops.update', ['id' => $edit->id]) }}@else{{ route('workshops.store') }} @endif" enctype="multipart/form-data">
    @csrf




        <!-- Nome da oficina-->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nome Fantasia da Empresa') " />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!--endereço de email da oficina-->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="cnpj" :value="__('CNPJ')" />
            <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj" :value="old('cnpj')" required autofocus autocomplete="cnpj" />
            <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="insrcicao_estadual" :value="__('Inscrição Estadual')" />
            <x-text-input id="insrcicao_estadual" class="block mt-1 w-full" type="text" name="insrcicao_estadual" :value="old('insrcicao_estadual')" required autofocus autocomplete="insrcicao_estadual" />
            <x-input-error :messages="$errors->get('insrcicao_estadual')" class="mt-2" />
        </div>
            <!-- telefone da oficina-->
            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Telefone')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>
             <!-- responsavel da oficina-->
            <div class="mt-4">
                <x-input-label for="responsavel" :value="__('Responsavel')" />
                <x-text-input id="responsavel" class="block mt-1 w-full" type="text" name="responsavel" :value="old('responsavel')" required autofocus autocomplete="responsavel" />
                <x-input-error :messages="$errors->get('responsavel')" class="mt-2" />
            </div>


 <!-- estado formulario via livewire-->


 @livewire('buscar-cep')

 {{-- 

            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="category">
                    Estado
                </label>
                <select name="state_id"  id="state_id"
                        class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                    <option value="">Selecione um Estado</option>
                    @foreach ($states as $state)
                    <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
                <span class="text-red-500">@error('state_id') {{ $message }} @enderror</span>
                <x-input-error :messages="$errors->get('state_id')" class="mt-2" />

            </div>
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="category">
                    Cidade
                </label>
                <select name="city_id"  id="city_id"
                        class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                    <option value="">Selecione uma Cidade</option>
                    @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                </select>
                <span class="text-red-500">@error('state_id') {{ $message }} @enderror</span>
                <x-input-error :messages="$errors->get('state_id')" class="mt-2" />

            </div>

                        

     
         <!-- cep da oficina-->
         <div class="mt-4">
            <x-input-label for="cep" :value="__('CEP')" />
            <x-text-input id="cep" class="block mt-1 w-full" type="text" name="cep" :value="old('cep')" required autofocus autocomplete="cep" />
            <x-input-error :messages="$errors->get('cep')" class="mt-2" />
        </div>
           <!-- enderço da oficina-->
           <div class="mt-4">
            <x-input-label for="number" :value="__('Endereço: ')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

           <!-- bairro da oficina-->
           <div class="mt-4">
            <x-input-label for="district" :value="__('Bairro: ')" />
            <x-text-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" required autofocus autocomplete="district" />
            <x-input-error :messages="$errors->get('district')" class="mt-2" />
        </div>
        --}}
        <div class="mt-4">
            <x-input-label for="number" :value="__('Numero: ')" />
            <x-text-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required autofocus autocomplete="number" />
            <x-input-error :messages="$errors->get('number')" class="mt-2" />
        </div>

         <!-- complemento da oficina-->
         <div class="mt-4">
            <x-input-label for="complement" :value="__('Complemento ')" />
            <x-text-input id="complement" class="block mt-1 w-full" type="text" name="complement" :value="old('complement')"  autofocus autocomplete="complement" />
            <x-input-error :messages="$errors->get('complement')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <x-secondary-button xhref="{{ route('workshops.index') }}">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button class="ms-3">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </div>
    </div>

        </form>
    </x-slot>


         </div>
      </div>
</x-app-layout>
