<x-app-layout>
    <x-slot name="header">
            Usuários
    </x-slot>

    <div class="sm:flex p-4">
        <div
            class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
            <form class="lg:pr-3" action="#" method="GET">
                <label for="users-search" class="sr-only">Search</label>
                <div class="relative mt-1 lg:w-64 xl:w-96">
                    <input type="text" name="email" id="users-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Buscar usuários">
                </div>
            </form>
        </div>
        <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
            <button type="button" 
                onclick="formUser()"
                class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center dark:text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd"></path>
                </svg>
                Novo Usuário
            </button>
        </div>
    </div>

    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th scope="col"
                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                    Nome
                </th>
                <th scope="col"
                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                    Email
                </th>
                <th scope="col"
                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                    Telefone
                </th>
                <th scope="col"
                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                    Tipo
                </th>
                <th scope="col"
                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                    &nbsp;
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

            @foreach ($users as $user)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->name }}
                </td>
                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->email }}
                </td>
                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->phone }}
                </td>
                <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->permission }}
                </td>
                <td class="p-4 space-x-2 whitespace-nowrap">
                    <x-custom.edit-button :functionName="'formUser'" :itemId=$user />
                    <x-custom.delete-button :functionName="'deleteUser'" :itemId=$user />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}


    <x-form-modal></x-form-modal>

    <script>
        function preventSubmit(method = 'post') {
            removeAllListeners('#formUser');
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
            formModal.show();

            axios.get(url).then((response) => {
                document.querySelector('#form-modal-content').innerHTML = response.data;
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                spinner.classList.add('hidden');
                preventSubmit(method);
                initTabs();
                CarregarMascara();
            });
        }

        function deleteUser(id) {
            document.querySelector('#delete-modal-text').textContent = "Tem certeza da exclusão do usuário?";
            document.querySelector('#delete-modal-action').addEventListener('click', (ev) => {
                confirmDelete(id)
            });
            alertModal.show();
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
                alert(response.data.message);
                if (response.data.status) {
                    window.location.reload();
                }
            }).catch((error) => {
                let errorData = error.response.data;
                let errorList = '';
                for (let error in errorData.errors) {
                    errorList += errorData.errors[error][0] + "<br>\n";
                }
                showToast(errorList);
            });
        }

        function confirmDelete(id) {
            axios.delete(`{{ url('/user') }}/${id}`)
            .then(function (response) {
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

        function CarregarMascara(){
            const phone = document.getElementById('phone');
            
            const maskOptions = {
              mask: '(00)00000-0000'
            };
            const mask_phone = IMask(phone, maskOptions);
        }
    </script>
</x-app-layout>
