<!-- Componente Livewire para buscar endereço -->
<div class="border-t border-gray-300 dark:border-gray-600 pt-4 mt-4">
    <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Buscar Endereço</h2>

    <div class="flex flex-col w-full">
        <label for="cep" class="form-label text-gray-700 dark:text-gray-300">CEP</label>
        <input type="text" class="border border-gray-300 dark:border-gray-600 rounded-md p-2" id="cep" wire:model.lazy="cep" placeholder="Insira o CEP (Apenas números)" />
        @error('cep')
            <span class="bg-red-500 text-white rounded-md p-1">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex flex-col w-full">
        <label for="state" class="form-label text-gray-700 dark:text-gray-300">Estado</label>
        <input type="text" class="border border-gray-300 dark:border-gray-600 rounded-md p-2" id="state" wire:model="state" />
        @error('state')
            <span class="bg-red-500 text-white rounded-md p-1">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex flex-col w-full">
        <label for="city" class="form-label text-gray-700 dark:text-gray-300">Cidade</label>
        <input type="text" class="border border-gray-300 dark:border-gray-600 rounded-md p-2" id="city" wire:model="city" />
        @error('city')
            <span class="bg-red-500 text-white rounded-md p-1">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex flex-col w-full">
        <label for="neighborhood" class="form-label text-gray-700 dark:text-gray-300">Bairro</label>
        <input type="text" class="border border-gray-300 dark:border-gray-600 rounded-md p-2" id="neighborhood" wire:model="neighborhood" />
        @error('neighborhood')
            <span class="bg-red-500 text-white rounded-md p-1">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex flex-col w-full">
        <label for="street" class="form-label text-gray-700 dark:text-gray-300">Rua</label>
        <input type="text" class="border border-gray-300 dark:border-gray-600 rounded-md p-2" id="street" wire:model="street" />
        @error('street')
            <span class="bg-red-500 text-white rounded-md p-1">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button class="px-4 py-2 bg-green-400 text-black rounded-md" type="button" wire:click="fetchAddress">Buscar Endereço</button>
    </div>
</div>
