<x-app-layout>
    <x-slot name="header">
        Presenças
    </x-slot>

    <div class="p-4">
        <form class="flex flex-wrap items-end space-x-4" action="?buscarAlunos">
            <div class="flex-1">
                <label for="aula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agenda</label>
                <select id="aula"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="aula"
                    required>
                    <option value="">Selecione uma Aula</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ request('aula') == $class->id ? 'selected' : '' }} >{{ $class->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex-1">
                <label for="dataAula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data da Aula</label>
                <input type="date"
                    id="dataAula"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ request('dataAula') ?? '' }}"
                    name="dataAula"
                    />
            </div>
            <div class="flex-1">
                <button type="submit"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black bg-white rounded-lg focus:ring-4 focus:bg-green-800 dark:focus:bg-green-800 ">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    @if (!$presences)
        <table class="min-w-full divide-y divide-gray-600 table-fixed dark:divide-gray-600">
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td scope="row" class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <h1>Por Favor selecione uma data e uma aula/agenda</h1>
                </td>
            </tr>
        </table>
    @else
        <form action="{{ route('presence.create') }}" method="POST" id="savePresences">
            @csrf
            <input type="hidden" name="schedule_class_id" value="{{ request('aula') }}">
            <input type="hidden" name="created_at" value="{{ request('dataAula') }}">

            <table class="min-w-full divide-y divide-gray-600 table-fixed dark:divide-gray-600">

                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th colspan="3" class="p-4 text-center text-gray-500 uppercase dark:text-gray-400">
                            @foreach ($classes as $class)
                                {{ request('aula') == $class->id ? $class->title : '' }}
                            @endforeach
                        </th>
                    </tr>
                    <tr>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                            width="5%">
                            Excluir
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                            width="90%">
                            Aluno
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                            width="5%">
                            Confirmar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($presences as $key => $presence)
                        <tr class=" hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <input type="checkbox" name="deleted[{{ $key }}]"
                                    value="{{ $presence->presence_id }}"
                                    class="deleteItem w-4 h-4 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    data-key="{{ $key }}"
                                    {{ $presence->confirmed == 'Y' ? '' : 'disabled' }} />
                            </td>
                            <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $presence->name }}
                                <input type="hidden" name="student_id[{{ $key }}]"
                                    value="{{ $presence->student_id }}">
                            </td>
                            <th scope="row"
                                class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                <input type="checkbox" {{ $presence->confirmed == 'Y' ? 'checked' : '' }}
                                    name="confirmed[{{ $key }}]" value="{{ $presence->presence_id }}"
                                    class="insertItem w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    data-key="{{ $key }}" />
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-center p-6">
                <button type="submit"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black bg-white rounded-lg focus:ring-4 focus:bg-green-800 dark:focus:bg-green-800 ">
                    Salvar
                </button>
            </div>
        </form>
    @endif


    <script>
        let savePresences = document.getElementById('savePresences');
        savePresences.addEventListener('submit', function(ev) {
            ev.preventDefault();
            savePresences.classList.add('hidden');

            let formData = new FormData(savePresences);

            axios({
                method: 'post',
                url: `{{ url('/presence') }}`,
                data: formToString(formData),
                headers: {
                    'Content-Type': 'application/json'
                }
            }).then((response) => {
                alert(response.data.message);
                if (response.data.status) {
                    window.location.reload();
                }
            }).catch((error) => {
                let errorList = '';
                console.log('Error', error.message);
            });

        });

        function formToString(formData) {
            var object = {};
            formData.forEach(function(value, key) {
                object[key] = value;
            });
            return JSON.stringify(object);
        }

        let deleteItems = document.querySelectorAll('.deleteItem');
        for (deleteItem of deleteItems) {
            deleteItem.addEventListener('click', function(ev) {
                let inputClear = document.querySelector('input[name="confirmed[' + this.getAttribute('data-key') +
                    ']"]');
                inputClear.checked = !this.checked;
            });
        }

        let insertItems = document.querySelectorAll('.insertItem');
        for (insertItem of insertItems) {
            insertItem.addEventListener('click', function(ev) {
                let inputClear = document.querySelector('input[name="deleted[' + this.getAttribute('data-key') +
                    ']"]');
                inputClear.checked = false;
            });
        }
    </script>
</x-app-layout>
