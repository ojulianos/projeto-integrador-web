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
                    <option value="{{ $class->id }}" {{ request()->dataAula == $class->id ? 'selected' : '' }} >{{ $class->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex-1">
                <label for="dataAula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data da Aula</label>
                <input type="date"
                id="dataAula"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ request()->dataAula ?? '' }}"
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


    <table class="min-w-full divide-y divide-gray-600 table-fixed dark:divide-gray-600">
        @if (!$presences)
        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
            <td scope="row" class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <h1>Por Favor selecione uma data e uma aula/agenda</h1>
            </td>
        </tr>
        @else
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th colspan="2" class="p-4 text-center text-gray-500 uppercase dark:text-gray-400">xxx</th>
            </tr>
            <tr>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="75%">
                    Confirmado
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="25%">
                    Aluno
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="25%">
                    Aula / Agenda
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            @foreach ($presences as $aluno)
            <tr class=" hover:bg-gray-100 dark:hover:bg-gray-700">
                <th scope="row" class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $presence->confirmed }}
                </th>
                <td class="px-6 py-4">
                    {{ $presence->schedule_class_id }}
                </td>
                <td class="px-6 py-4">
                    {{ $presence->student_id }}
                </td>
                <td class="px-6 py-4">

                </td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>

    <x-form-modal></x-form-modal>

    <script>
        function preventSubmit(method = 'post') {
            removeAllListeners('#formPresence');
            let form = document.getElementById('formPresence');
            form.addEventListener('submit', (ev) => {
                ev.preventDefault();
                savePresence(form, method);
            });
        }

        function formPresence(id = null) {
            let title = 'Nova presença';
            let url = `{{ route('presence.create') }}`;
            let method = 'post';
            if (id !== null) {
                title = 'Atualizar presença';
                url = `{{ url('/presence') }}/${id}/edit`;
                method = 'put';
            }

            document.querySelector('#form-modal-title').textContent = title;
            formModal.show();

            axios.get(url).then((response) => {
                document.querySelector('#form-modal-content').innerHTML = response.data;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                spinner.classList.add('hidden');
                preventSubmit(method);
            });
        }

        function deletePresence(id) {
            document.querySelector('#delete-modal-text').textContent = "Tem certeza da exclusão da presença?";
            document.querySelector('#delete-modal-action').addEventListener('click', (ev) => {
                confirmDelete(id)
            });
            alertModal.show();
        }

        function savePresence(form) {
            let formData = new FormData(form);
            let url = `{{ url('/presence') }}`;
            let method = 'post';
            
            if (formData.get('id').trim().length > 0) {
                url = `{{ url('/presence') }}/` + formData.get('id'); 
                method = 'put';
            }

            axios({
                method: method,
                url: url,
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
                // for (let i = 0; i < error.errors.length; i++) {
                //     errorList += error.errors[i] + "\n";
                // }
                
                console.log('Error', error.message);
            });
        }

        function confirmDelete(id) {
            axios.delete(`{{ url('/presence') }}/${id}`)
            .then(function (response) {
                alert(response.data.message);
                if (response.data.status) {
                    window.location.reload();
                }
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function () {
                spinner.classList.add('hidden');
            });
        }
    </script>
</x-app-layout>
