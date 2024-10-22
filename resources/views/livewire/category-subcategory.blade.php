<div>
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-gray-200 dark:bg-slate-800 p-6 rounded-lg shadow-md w-1/2 mt-5">
        
        @if (session()->has('success'))
            <span class="text-green-500 my-3">{{ session('success') }}</span>
        @endif
            <form wire:submit="storeProduct" class="border-b-2 pb-10">
                <div>
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="name">
                        Nome do Produto 
                    </label>
                    <input wire:model="name" type="text"
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />   
                    <span class="text-red-500">@error('name') {{ $message }} @enderror</span>
                    <x-input-error class="mt-2 text-red-500" :messages="$errors->get('name')" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="description">Descrição do Produto</label>
                    <input wire:model="description" type="text"
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />   
                    <span class="text-red-500">@error('description') {{ $message }} @enderror</span>
                    <x-input-error class="mt-2 text-red-500" :messages="$errors->get('description')" />
                </div>

                <!-- Novo campo para Estoque -->
                <div>
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="stock">Estoque</label>
                    <input wire:model="stock" type="number"
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />   
                    <span class="text-red-500">@error('stock') {{ $message }} @enderror</span>
                    <x-input-error class="mt-2 text-red-500" :messages="$errors->get('stock')" />
                </div>

                <!-- Novo campo para Preço -->
                <div>
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="price">Preço</label>
                    <input wire:model="price" type="text"
                           class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />   
                    <span class="text-red-500">@error('price') {{ $message }} @enderror</span>
                    <x-input-error class="mt-2 text-red-500" :messages="$errors->get('price')" />
                </div>

                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="category">
                        Categoria
                    </label>
                    <select wire:model.live="category" name="category"
                            class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" required>
                        <option value="">Selecione a Categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-red-500">@error('category') {{ $message }} @enderror</span>
                </div>
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-200" for="subcategory">
                        Sub Categoria
                    </label>
                    <select name="subcategory" wire:model="subcategory"
                            class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                        <option value="">Selecione Subcategoria</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-red-500">@error('subcategory') {{ $message }} @enderror</span>
                </div>
                <div class="flex items-center mt-4">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-green-600 active:bg-gray-900 dark:active:bg-green-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                        Adicionar Produto
                    </button>
                </div>
            </form>

            <h3 class="font-bold text-xl mt-10 mb-5 dark:text-gray-100">Últimos Produtos</h3>
            <table class="min-w-full bg-gray-300 dark:bg-slate-700">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Produto</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Descrição</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Estoque</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Preço</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Subcategoria</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider dark:text-gray-100">Categoria</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->name }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->description }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->stock }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->price }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->subcategory ? $product->subcategory->name : 'N/A' }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $product->subcategory && $product->subcategory->category ? $product->subcategory->category->name : 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-5">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
