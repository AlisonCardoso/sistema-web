<div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
        <div>
            <label for="cnpj" class="block text-gray-800 dark:text-gray-300">CNPJ</label>
            <input type="text" id="cnpj" name="cnpj" class="w-full px-3 py-2 border rounded-md bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('cnpj', $edit->cnpj ?? '') }}" wire:model.lazy="cnpj" required>
            @error('cnpj') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="razao_social" class="block text-gray-800 dark:text-gray-300">Razão Social</label>
            <input type="text" id="razao_social" name="razao_social" class="w-full px-3 py-2 border rounded-md bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('razao_social', $edit->razao_social ?? '') }}" wire:model="razao_social" required>
            @error('razao_social') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
        <div>
            <label for="cnae_fiscal_descricao" class="block text-gray-800 dark:text-gray-300">Nome Fantasia</label>
            <input type="text" id="cnae_fiscal_descricao" name="cnae_fiscal_descricao" class="w-full px-3 py-2 border rounded-md bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('cnae_fiscal_descricao', $edit->cnae_fiscal_descricao ?? '') }}"  wire:model="cnae_fiscal_descricao">
            @error('cnae_fiscal_descricao') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="descricao_situacao_cadastral" class="block text-gray-800 dark:text-gray-300">Situação</label>
            <input type="text" id="descricao_situacao_cadastral" name="descricao_situacao_cadastral" class="w-full px-3 py-2 border rounded-md bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white focus:outline-none focus:ring focus:ring-blue-500" value="{{ old('descricao_situacao_cadastral', $edit->descricao_situacao_cadastral ?? '') }}" wire:model="descricao_situacao_cadastral">
            @error('descricao_situacao_cadastral') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div> 
</div>

