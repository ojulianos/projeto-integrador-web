<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuários
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3" width="40%">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="30%">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="10%">
                                        Telefone
                                    </th>
                                    <th scope="col" class="px-6 py-3" width="5%">
                                        Tipo
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center" width="15%">
                                        <button 
                                            type="button"
                                            onclick="formUser()"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 inline-flex items-center">
                                            Novo Usuário
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="bg-white border-b">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $user->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->phone }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->permission }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button 
                                            type="button"
                                            onclick="formUser({{ $user->id }})"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 inline-flex items-center">
                                            Editar
                                        </button>
                                        <button 
                                            type="button"
                                            onclick="deleteUser({{ $user->id }})"
                                            class="border border-gray-200 px-2 py-1 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 inline-flex items-center">
                                            Excluir
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    
                        {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <x-form-modal></x-form-modal>

    <script>
        function preventSubmit(method = 'post') {
            let form = document.getElementById('formUser');
            form.addEventListener('submit', (ev) => {
                ev.preventDefault();
                saveUser(form, method);
            });
        }

        function formUser(id = null) {
            let title = 'Novo Usuário';
            let url = `{{ route('user.create') }}`;
            let method = 'post';
            if (id !== null) {
                title = 'Atualizar Usuário';
                url = `{{ url('/user') }}/${id}/edit`;
                method = 'put';
            }

            document.querySelector('#form-modal-title').textContent = title;
            modal.show();

            axios.get(url).then((response) => {
                document.querySelector('#form-modal-content').innerHTML = response.data;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                spinner.classList.add('hidden');
                preventSubmit(method);
            });
        }

        function deleteUser(id) {
            document.querySelector('#form-modal-title').textContent = "Excluir  Usuário";
            alert.show();

            // axios.delete(`{{ url('/user') }}/${id}`)
            // .then(function (response) {
            //     document.querySelector('#form-modal-content').innerHTML = response.data;
            // })
            // .catch(function (error) {
            //     console.log(error);
            // })
            // .finally(function () {
            //     spinner.classList.add('hidden');
            // });
        }

        function saveUser(form) {
            let formData = new FormData(form);
            let url = `{{ url('/user') }}`;
            let method = 'post';
            
            if (formData.get('id').trim().length > 0) {
                url = `{{ url('/user') }}/` + formData.get('id'); 
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
                console.log(response);
            }).catch((error) => {
                console.log(error);
            });

        }

        function formToString(formData) {
            var object = {};
            formData.forEach(function(value, key){
                object[key] = value;
            });
            return JSON.stringify(object); 
        }
    </script>
</x-app-layout>
