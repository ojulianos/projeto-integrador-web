<form class="mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="paymentFinance">
    @csrf
  
    <div class="mb-4">
        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Titulo</label>
        <select id="type"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="type"
            disabled>
            <option selected>Selecione</option>
            <option value="P" {{ $finance->type == 'P' ? 'selected' : '' }}>Pagar</option>
            <option value="R" {{ $finance->type == 'R' ? 'selected' : '' }}>Receber</option>
        </select>
    <div class="mb-4">
        <label for="value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor</label>
        <input type="number"
            id="value"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="00,00"
            value="{{ $finance->value }}"
            name="value"
            disabled />
    </div>
    <div class="mb-4">
        <label for="discount_value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor Desconto</label>
        <input type="number"
            id="discount_value"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="00,00"
            value="{{ $finance->discount_value }}"
            name="discount_value"
            disabled/>
    </div>
    <div class="mb-4">
        <label for="addition_value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Valor Adicional</label>
        <input type="number"
            id="addition_value"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="00,00"
            value="{{ $finance->addition_value}}"
            name="addition_value"
            disabled/>
    </div>
    <div class="mb-4">
        <label for="date_payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Pagamento</label>
        <input type="date"
            id="date_payment"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('date_emission', $finance->date_payment ?? '') }}"
            name="date_payment"
            />
    </div>
   
    <input type="hidden" name="id" value="{{ $finance->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

