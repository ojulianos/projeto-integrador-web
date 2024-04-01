<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Presenças
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
                                        Confirmado
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="20%">
                                        Agenda
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="10%">
                                        Estudante
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center" width="15%">
                                        <button 
                                            type="button"
                                            onclick="formPresence()"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 inline-flex items-center">
                                            Nova presença
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($presences as $presence)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $presence->confirmed }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $presence->schedule_class_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $presence->student_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button 
                                            type="button"
                                            onclick="formPresence({{ $presence->id }})"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 inline-flex items-center">
                                            Editar
                                        </button>
                                        <button 
                                            type="button"
                                            onclick="deletePresence({{ $presence->id }})"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 inline-flex items-center">
                                            Excluir
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    
                        {{ $presences->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-form-modal></x-form-modal>

    <script>
        function preventSubmit(method = 'post') {
            removeAllListeners('#formPresence');
            let form = document.getElementById('formPresence');
            form.addEventListener('submit', (ev) => {
                ev.preventDefault();
                saveUser(form, method);
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
