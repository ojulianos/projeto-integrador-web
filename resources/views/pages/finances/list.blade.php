<x-app-layout>
    <x-slot name="header">
        Títulos
    </x-slot>

    <div class="p-4">
        <form class="flex flex-wrap items-end space-x-4">
            <div class="flex-1">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Título</label>
                <select id="type"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="type"
                    required>
                    <option selected>Selecione</option>
                    <option value="P">Pagar</option>
                    <option value="R">Receber</option>
                </select>
            </div>
    
            <div class="flex-1">
                <label for="date_initial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Vencimento Inicio</label>
                <input type="date"
                id="date_initial"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $finance->date_maturiry ?? '' }}"
                name="date_initial"
            />
            </div>
    
            <div class="flex-1">
                <label for="date_final" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data Vencimento Fim</label>
                <input type="date"
                id="date_final"
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{ $finance->date_maturiry ?? '' }}"
                name="date_final"
            />
            </div>
    
            <div class="flex-1">
                <button type="submit"
                    class="w-full sm:w-auto px-3 py-2 text-sm font-medium text-black rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:text-white focus:ring-primary-800">
                    Buscar
                </button>
            </div>
        </form>
    </div>
    
    <div class="p-2">
        <form>
            <div class="flex items-center space-x-2 sm:space-x-3">
                <button type="button" 
                    onclick="formFinance()"
                    class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-center text-black rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 sm:w-auto dark:bg-primary-600 dark:text-white hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Novo Título
                </button>
            </div>
        </form>
    </div>

    <table class="min-w-full divide-y divide-gray-600 table-fixed dark:divide-gray-600">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="5%">
                    Tipo
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="30%">
                    Descrição
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="15%">
                    Valor
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="15%">
                    Valor Desconto
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="15%">
                    Valor Acrescimo
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="15%">
                    Data Emissão
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="15%">
                    Data Vencimento
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400" width="15%">
                    Data Pagamento
                </th>
                <th scope="col" class="p-4 text-xs font-medium text-center text-gray-500 uppercase dark:text-gray-400" width="10%">
                    {{-- &nbsp; --}}
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            @foreach ($finances as $finance)
            <tr class=" hover:bg-gray-100 dark:hover:bg-gray-700">
                <th scope="row" class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {!! $finance->type_financial !!}
                </th>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $finance->description }}
                </td>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    R$ {{number_format($finance->value,2,',','.')}}
                </td>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    R$ {{number_format($finance->discount_value,2,',','.')}}
                </td>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    R$ {{number_format($finance->addition_value,2,',','.')}}
                </td>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ date('d/m/Y', strtotime($finance->date_emission)) }}
                </td>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ date('d/m/Y', strtotime($finance->date_maturiry)) }}
                </td>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ date('d/m/Y', strtotime($finance->date_payment)) }}
                </td>
                <td class="p-4 text-left font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <button 
                        type="button"
                        onclick="payFinance({{ $finance->id }})"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black bg-green-600 rounded-lg hover:bg-green-600 focus:ring-4 focus:bg-green-800 dark:focus:bg-green-800 hover:bg-green-800 ">
                        <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill="#62ff00" d="M8 13a1 1 0 0 1-.707-.293l-2-2a1 1 0 1 1 1.414-1.414l1.42 1.42 5.318-3.545a1 1 0 0 1 1.11 1.664l-6 4A1 1 0 0 1 8 13Z"></path>               
                        </svg>
                        Pagar
                    </button>
                    <button 
                        type="button"
                        onclick="formFinance({{ $finance->id }})"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-black rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"clip-rule="evenodd"></path>
                        </svg>
                        Editar
                    </button>
                    <button 
                        type="button"
                        onclick="deleteFinance({{ $finance->id }})"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        Excluir
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> 
    
{{ $finances->links() }}

<x-form-modal></x-form-modal>

<script>
    function preventSubmit(method = 'post', pg = false) {
        if (!pg) {
            removeAllListeners('#formFinance');
            let form = document.getElementById('formFinance');
            form.addEventListener('submit', function (ev) {
                ev.preventDefault();
                saveFinance(form, method);
            });
        } else {
            removeAllListeners('#paymentFinance');
            let formPay = document.getElementById('paymentFinance');
            formPay.addEventListener('submit', function (ev) {
                ev.preventDefault();
                saveFinance(formPay, true);
            });
        }

    }

    function formFinance(id = null) {
        let title = 'Novo Titulo';
        let url = `{{ route('finance.create') }}`;
        let method = 'post';
        if (id !== null) {
            title = 'Atualizar Titulo';
            url = `{{ url('/finance') }}/${id}/edit`;
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

    function payFinance(id = null) {
        let title = 'Pagar Titulo';
        let url = `{{ url('/finance') }}/${id}/pay`;
        let method = 'put';

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

    function deleteFinance(id) {
        document.querySelector('#delete-modal-text').textContent = "Tem certeza da exclusão do titulo?";
        document.querySelector('#delete-modal-action').addEventListener('click', (ev) => {
            confirmDelete(id)
        });
        alertModal.show();
    }

    function saveFinance(form, pg = false) {
        let formData = new FormData(form);
        let url = `{{ url('/finance') }}`;
        let method = 'post';
        
        if (formData.get('id').trim().length > 0) {
            url = `{{ url('/finance') }}/` + formData.get('id'); 
            method = 'put';
        }
debugger
        if (pg) {
            url = `{{ url('/finance') }}/` + formData.get('id')/'pay'; 
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
        axios.delete(`{{ url('/finance') }}/${id}`)
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
