@props(['formData'])

<div class="mb-4">
    <label for="zip_code" class="block mb-1 text-sm font-medium text-gray-900">CEP</label>
    <input type="text"
        id="zip_code"
        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="zip_code"
        value="{{ $formData->zip_code }}"
        required />
</div>
<div class="mb-4">
    <label for="state" class="block mb-1 text-sm font-medium text-gray-900">UF</label>
    <select id="state"
        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="state"
        >
        <option>Selecione</option>
        <option value="AC" {{ $formData->state == 'AC' ? 'selected' : '' }}>Acre</option>
        <option value="AL" {{ $formData->state == 'AL' ? 'selected' : '' }}>Alagoas</option>
        <option value="AP" {{ $formData->state == 'AP' ? 'selected' : '' }}>Amapá</option>
        <option value="AM" {{ $formData->state == 'AM' ? 'selected' : '' }}>Amazonas</option>
        <option value="BA" {{ $formData->state == 'BA' ? 'selected' : '' }}>Bahia</option>
        <option value="CE" {{ $formData->state == 'CE' ? 'selected' : '' }}>Ceará</option>
        <option value="ES" {{ $formData->state == 'ES' ? 'selected' : '' }}>Espírito Santo</option>
        <option value="GO" {{ $formData->state == 'GO' ? 'selected' : '' }}>Goiás</option>
        <option value="MA" {{ $formData->state == 'MA' ? 'selected' : '' }}>Maranhão</option>
        <option value="MT" {{ $formData->state == 'MT' ? 'selected' : '' }}>Mato Grosso</option>
        <option value="MS" {{ $formData->state == 'MS' ? 'selected' : '' }}>Mato Grosso do Sul</option>
        <option value="MG" {{ $formData->state == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
        <option value="PA" {{ $formData->state == 'PA' ? 'selected' : '' }}>Pará</option>
        <option value="PB" {{ $formData->state == 'PB' ? 'selected' : '' }}>Paraíba</option>
        <option value="PR" {{ $formData->state == 'PR' ? 'selected' : '' }}>Paraná</option>
        <option value="PE" {{ $formData->state == 'PE' ? 'selected' : '' }}>Pernambuco</option>
        <option value="PI" {{ $formData->state == 'PI' ? 'selected' : '' }}>Piauí</option>
        <option value="RJ" {{ $formData->state == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
        <option value="RN" {{ $formData->state == 'RN' ? 'selected' : '' }}>Rio Grande do Norte</option>
        <option value="RS" {{ $formData->state == 'RS' ? 'selected' : '' }}>Rio Grande do Sul</option>
        <option value="RO" {{ $formData->state == 'RO' ? 'selected' : '' }}>Rondônia</option>
        <option value="RR" {{ $formData->state == 'RR' ? 'selected' : '' }}>Roraima</option>
        <option value="SC" {{ $formData->state == 'SC' ? 'selected' : '' }}>Santa Catarina</option>
        <option value="SP" {{ $formData->state == 'SP' ? 'selected' : '' }}>São Paulo</option>
        <option value="SE" {{ $formData->state == 'SE' ? 'selected' : '' }}>Sergipe</option>
        <option value="TO" {{ $formData->state == 'TO' ? 'selected' : '' }}>Tocantins</option>
    </select>
</div>
<div class="mb-4">
    <label for="city" class="block mb-1 text-sm font-medium text-gray-900">Cidade</label>
    <input type="text"
        id="city"
        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="city"
        value="{{ $formData->city }}"
        required />
</div>
<div class="mb-4">
    <label for="address" class="block mb-1 text-sm font-medium text-gray-900">Endereço</label>
    <input type="text"
        id="address"
        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="address"
        value="{{ $formData->address }}"
        />
</div>
<div class="mb-4">
    <label for="number" class="block mb-1 text-sm font-medium text-gray-900">Número</label>
    <input type="number"
        id="number"
        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="number"
        value="{{ $formData->number }}"
        />
</div>
<div class="mb-4">
    <label for="zone" class="block mb-1 text-sm font-medium text-gray-900">Bairro</label>
    <input type="text"
        id="zone"
        class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        name="zone"
        value="{{ $formData->zone }}"
        />
</div>