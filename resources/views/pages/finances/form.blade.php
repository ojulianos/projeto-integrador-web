<form class="max-w-sm mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formFinance">
    @csrf
    
    <div class="mb-4">
        <label for="type" class="block mb-1 text-sm font-medium text-gray-900">Tipo de Titulo</label>
        <select id="type"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            name="type"
            required>
            <option selected>Selecione</option>
            <option value="A" {{ $finance->type == 'P' ? 'selected' : '' }}>Pagar</option>
            <option value="P" {{ $finance->type == 'R' ? 'selected' : '' }}>Receber</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="description" class="block mb-1 text-sm font-medium text-gray-900">Descrição</label>
        <input type="text" id="description"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            placeholder="Digite a descriçao"
            value="{{ $finance->description }}"
            name="description"
            required />
    </div>
    <div class="mb-4">
        <label for="value" class="block mb-1 text-sm font-medium text-gray-900">Valor</label>
        <input type="number"
            id="value"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $finance->value }}"
            name="value"
            required />
    </div>
    <div class="mb-4">
        <label for="discount_value" class="block mb-1 text-sm font-medium text-gray-900">Valor Desconto</label>
        <input type="number"
            id="discount_value"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $finance->discount_value }}"
            name="discount_value"
            />
    </div>
    <div class="mb-4">
        <label for="addition_value" class="block mb-1 text-sm font-medium text-gray-900">Valor Adicional</label>
        <input type="number"
            id="addition_value"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $finance->addition_value}}"
            name="addition_value"
            />
    </div>
    <div class="mb-4">
        <label for="date_maturiry" class="block mb-1 text-sm font-medium text-gray-900">Data Vencimento</label>
        <input type="date"
            id="date_maturiry"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $finance->date_maturiry }}"
            name="date_maturiry"
            />
    </div>
    <div class="mb-4">
        <label for="date_emission" class="block mb-1 text-sm font-medium text-gray-900">Data Emissao</label>
        <input type="date"
            id="date_emission"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $finance->date_emission }}"
            name="date_emission"
            />
    </div>
    <div class="mb-4">
        <label for="date_payment" class="block mb-1 text-sm font-medium text-gray-900">Data Pagamento</label>
        <input type="date"
            id="date_payment"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $finance->date_payment }}"
            name="date_payment"
            />
    </div>
   
    <input type="hidden" name="id" value="{{ $finance->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

