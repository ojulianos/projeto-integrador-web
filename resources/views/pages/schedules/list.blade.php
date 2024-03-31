<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agendas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3" width="30%">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="20%">
                                        Descrição
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="10%">
                                        Semana
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="5%">
                                        Categoria
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="15%">
                                        Data de Inicio
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="15%">
                                        Data Final
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center" width="15%">
                                        <button 
                                            type="button"
                                            onclick="formSchedule()"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 inline-flex items-center">
                                            Nova Agenda
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $schedule->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $schedule->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $schedule->dar_week }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $schedule->category_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $schedule->time_start }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $schedule->time_end }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button 
                                            type="button"
                                            onclick="formSchedule({{ $schedule->id }})"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 inline-flex items-center">
                                            Editar
                                        </button>
                                        <button 
                                            type="button"
                                            onclick="deleteSchedule({{ $schedule->id }})"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 inline-flex items-center">
                                            Excluir
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    
                        {{ $schedules->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-form-modal></x-form-modal>

    <script>
        function preventSubmit(method = 'post') {
            removeAllListeners('#formSchedule');
            let form = document.getElementById('formSchedule');
            form.addEventListener('submit', (ev) => {
                ev.preventDefault();
                saveUser(form, method);
            });
        }

        function formSchedule(id = null) {
            let title = 'Nova Agenda';
            let url = `{{ route('schedule.create') }}`;
            let method = 'post';
            if (id !== null) {
                title = 'Atualizar Agenda';
                url = `{{ url('/schedule') }}/${id}/edit`;
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

        function deleteSchedule(id) {
            document.querySelector('#delete-modal-text').textContent = "Tem certeza da exclusão da agenda?";
            document.querySelector('#delete-modal-action').addEventListener('click', (ev) => {
                confirmDelete(id)
            });
            alertModal.show();
        }

        function saveSchedule(form) {
            let formData = new FormData(form);
            let url = `{{ url('/schedule') }}`;
            let method = 'post';
            
            if (formData.get('id').trim().length > 0) {
                url = `{{ url('/schedule') }}/` + formData.get('id'); 
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
            axios.delete(`{{ url('/schedule') }}/${id}`)
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
