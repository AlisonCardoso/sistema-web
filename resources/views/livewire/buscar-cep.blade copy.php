<div>

    <form class="p-8 bg-gray-200 flex flex-col w-1/2 mx-auto gap-4">
        <h1>Buscar CEP</h1>
        <div class="flex flex-col w-1/2">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" class="border" id="cep" wire:model.lazy="cep" placeholder="Insira o CEP (Apenas números)" />
            @error('cep')
            <span class="bg-red-500 text-white border-spacing-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-1/2">
            <label for="state" class="form-label">Estado</label>
            <input type="text" class="border" id="state" wire:model="state">
            @error('state')
            <span class="bg-red-500 text-white border-spacing-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-1/2">
            <label for="city" class="form-label">Cidade</label>
            <input type="text" class="border" id="city" wire:model="city">
            @error('city')
            <span class="bg-red-500 text-white border-spacing-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-1/2">
            <label for="neighborhood" class="form-label">Bairro</label>
            <input type="text" class="border" id="neighborhood" wire:model="neighborhood">
            @error('neighborhood')
            <span class="bg-red-500 text-white border-spacing-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col w-1/2">
            <label for="street" class="form-label">Rua</label>
            <input type="text" class="border" id="street" wire:model="street">
            @error('street')
            <span class="bg-red-500 text-white border-spacing-2">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <button class="px-4 py-2 bg-green-400 text-black rounded-md" type="button" wire:click="save" >Buscar Endereço</button>
        </div>
    </form>
</div>
