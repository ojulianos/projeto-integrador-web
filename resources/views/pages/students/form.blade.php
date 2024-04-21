<form class="mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formStudent">
    @csrf

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500" data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300" role="tablist">
            <li class="me-2" 
                role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500" 
                    id="student-tab" 
                    data-tabs-target="#student-profile-tab-content" 
                    type="button" 
                    role="tab" 
                    aria-controls="student-profile" 
                    aria-selected="false"
                    
                    >Dados do estudante
                </button>
            </li>
            <li class="me-2" 
                role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                    id="info-tab"
                    data-tabs-target="#info-tab-content" 
                    type="button" 
                    role="tab" 
                    aria-controls="Info" 
                    aria-selected="false"
                    
                    >Dados relevantes   
                </button><!--Não sei oq colar kkkkkkkkkk-->
            </li>
            <li class="me-2" 
                role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" 
                    id="responsible-tab" 
                    data-tabs-target="#responsible-tab-content" 
                    type="button" 
                    role="tab" 
                    aria-controls="responsible" 
                    aria-selected="false"
                    
                    >Dados do responsavel
                </button>
            </li>
        </ul>
    </div>

    <div id="default-styled-tab-content">
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="student-profile-tab-content" role="tabpanel" aria-labelledby="student-tab">
            <div class="mb-4">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                <input type="text"
                    id="name"
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Digite o Nome"
                    value="{{ $student->name }}"
                    name="name"
                    required />
            </div>
            <div class="mb-4">
                <label for="surname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sobrenome</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Digite o sobrenome"
                    value="{{ $student->surname }}"
                    name="surname"
                    required />
            </div>
            <div class="mb-4">
                <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de nascimento</label>
                <input type="date" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->birth_date }}"
                    name="birth_date"
                    required />
            </div>
            <div class="mb-4">
                <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                <input type="phone" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="cpf"
                    placeholder="Digite o CPF"
                    value="{{ $student->cpf }}"
                    pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                    required />
            </div>
            <div class="mb-4">
                <label for="rg" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RG</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="rg"
                    placeholder="Digite o RG"
                    value="{{ $student->rg }}"
                    required />
            </div>
            <div class="mb-4">
                <label for="alergy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alergia</label>
                <textarea rows="2" 
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    placeholder="Alergias do estudante..."
                    name="alergy"
                    value="{{ $student->alergy }}"
                    required>
                </textarea>
            </div>
            <div class="mb-4">
                <label for="medications" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Medicação</label>
                <textarea rows="2"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                    placeholder="Medicações do estudante..."
                    name="medications"
                    value="{{ $student->medications }}"
                    required>
                </textarea>
            </div>
            <div class="mb-4">
                <label for="phone_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primeiro telefone</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->phone_1 }}"
                    name="phone_1"
                    placeholder="Digite o telefone"
                    required />
            </div>
            <div class="mb-4">
                <label for="phone_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segundo telefone</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->phone_2 }}"
                    name="phone_2"
                    placeholder="Digite o Telefone"
                    required />
            </div>
            <div class="mb-4">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->address }}"
                    name="address"
                    placeholder="Digite o endereço"
                    required />
            </div>
            <div class="mb-4">
                <label for="picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                <input type="file" 
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    value="{{ $student->picture }}"
                    name="picture"
                    required />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="attachements_input_help">SVG, PNG ou JPG.</p>
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="info-tab-content" role="tabpanel" aria-labelledby="info-tab">
            <div class="mb-4">
                <label for="position_1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primeira posição</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->position_1 }}"
                    name="position_1"
                    placeholder="Digite a posição"
                    required />
            </div>
            <div class="mb-4">
                <label for="position_2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segunda posição</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->position_2 }}"
                    name="position_2"
                    placeholder="Digite a posição"
                    required />
            </div>
            <div class="mb-4">
                <label for="position_3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Terceira posição</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->position_3 }}"
                    name="position_3"
                    placeholder="Digite a posição"
                    required />
            </div>
            <div class="mb-4">
                <label for="position_4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quarta posição</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->position_4 }}"
                    name="position_4"
                    placeholder="Digite a posição"
                    required />
            </div>
            <div class="mb-4">
                <label for="attachements" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Anexos</label>
                <input type="file" 
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    value="{{ $student->attachements }}"
                    name="attachements"
                    required
                    multiple />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="attachements_input_help">SVG, PNG ou JPG.</p>
            </div>
            <div class="mb-4">
                <label for="kick" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chute</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->kick }}"
                    name="kick"
                    placeholder="Digite o chute"
                    required />
            </div>
            <div class="mb-4">
                <label for="uniform" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Uniforme</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->uniform }}"
                    name="uniform"
                    placeholder="Digite qual o uniforme"
                    required />
            </div>
            <div class="mb-4">
                <label for="uniform_size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tamanho do uniforme</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->uniform_size }}"
                    name="uniform_size"
                    placeholder="Digite o tamanho do uniforme"
                    required />
            </div>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="responsible-tab-content" role="tabpanel" aria-labelledby="responsible-tab">
            <div class="mb-4">
                <label for="cpf_responsible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF do responsavel</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->cpf_responsible }}"
                    name="cpf_responsible"
                    placeholder="Digite o CPF do responsavel"
                    required />
            </div>
            <div class="mb-4">
                <label for="name_responsible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do responsavel</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->name_responsible }}"
                    name="name_responsible"
                    placeholder="Digite o nome do responsavel"
                    required />
            </div>
            <div class="mb-4">
                <label for="phone_responsible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone do responsavel</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->phone_responsible }}"
                    name="phone_responsible"
                    placeholder="Digite o telefone do responsavel"
                    required />
            </div>
            <div class="mb-4">
                <label for="address_responsible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Endereço do responsavel</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->address_responsible }}"
                    name="address_responsible"
                    placeholder="Digite o endereço do responsavel"
                    required />
            </div>
            <div class="mb-4">
                <label for="email_responsible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email do responsavel</label>
                <input type="text" 
                    class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ $student->email_responsible }}"
                    name="email_responsible"
                    placeholder="Digite o email do responsavel"
                    required />
            </div>
        </div>
    </div>

    <input type="hidden" name="id" value="{{ $student->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

