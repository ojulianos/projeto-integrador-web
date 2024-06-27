<x-app-layout>
    <x-slot name="header">
        Relatório Alunos X Presença
    </x-slot>

    
    <div class="p-4">
        <form class="flex flex-wrap items-end space-x-4">
            <div class="flex space-x-4">
                <div class="flex-1">
                    <label for="dataIni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Inicial</label>
                    <input type="date"
                    id="dataIni"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ request('dataIni') ?? '' }}"
                    name="dataIni"
                    />
                </div>
                <div class="flex-1">
                    <label for="dataFim" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Final</label>
                    <input type="date"
                    id="dataFim"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ request('dataFim') ?? '' }}"
                    name="dataFim"
                    />
                </div>
            </div>
    
            <div class="flex-1">
                <button type="submit"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black bg-white rounded-lg focus:ring-4 focus:bg-green-800 dark:focus:bg-green-800 ">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <table class="min-w-full divide-y divide-gray-600 table-fixed dark:divide-gray-600">
        @if (!$alunosPresencas)
        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
            <td scope="row" class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <h1>Selecione um periodo e clique em buscar</h1>
            </td>
        </tr>
        @else
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th colspan="2" class="p-4 text-center text-gray-500 uppercase dark:text-gray-400">Resultados para o periodo {{ $alunosPresencas[0]->dataIni }} até {{ $alunosPresencas[0]->dataFim }}</th>
            </tr>
            <tr>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="75%">
                    Nome
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="25%">
                    Quantidade Presenças
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            @foreach ($alunosPresencas as $alunosPresenca)
            <tr class=" hover:bg-gray-100 dark:hover:bg-gray-700">
                <th scope="row" class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {!! $alunosPresenca->StudentName !!}
                </th>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $alunosPresenca->PresenceCount }}
                </td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>

</x-app-layout>
