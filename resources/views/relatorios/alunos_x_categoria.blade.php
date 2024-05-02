<x-app-layout>
    <x-slot name="header">
        Relatório Alunos X Categoria
    </x-slot>

    <div class="sm:flex p-4">
        <div
            class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
            <form class="lg:pr-3" action="" method="GET">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria</label>
                <select name="category_id" id="category_id" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Selecione uma Categoria</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request()->categoria == $categoria->id ? 'selected' : '' }}>{{ $categoria->name }}</option>
                    @endforeach
                </select>

                <button>Enviar</button>
            </form>
        </div>
    </div>

    @if (!$alunos)
        <h1>Selecione uma categoria e clique em buscar</h1>
    @else
    <table border="1">
        <thead>
            <tr>
                <th width="75%">
                    Nome
                </th>
                <th width="25%">
                    Categoria
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
            <tr>
                <th>
                    {{ $aluno->name }}
                </th>
                <td>
                    {{ $aluno->categoria }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    @endif

</x-app-layout>
