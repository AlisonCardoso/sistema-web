<form wire:submit.prevent="storeLabor">
    <div>
        <label for="service_order_id">Ordem de Serviço</label>
        <select wire:model="service_order_id" required>
            <option value="">Selecione uma Ordem de Serviço</option>
            @foreach ($serviceOrders as $order)
                <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->description }}</option>
            @endforeach
        </select>
        @error('service_order_id') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="hours_worked">Horas Trabalhadas</label>
        <input type="number" wire:model="hours_worked" step="0.01" required />
        @error('hours_worked') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="hourly_rate">Valor da Hora</label>
        <input type="number" wire:model="hourly_rate" step="0.01" required />
        @error('hourly_rate') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Total</label>
        <input type="text" wire:model="total_value" readonly />
    </div>

    <button type="submit">Cadastrar Mão de Obra</button>
</form>

