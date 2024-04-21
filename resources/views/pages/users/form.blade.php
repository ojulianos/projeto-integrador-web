<form class="mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formUser">
    @csrf
    
    <div class="mb-4">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
        <input type="text"
            id="name"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Digite o Nome"
            value="{{ $user->name }}"
            name="name"
            required />
    </div>
    <div class="mb-4">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" id="email"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Digite o Email"
            value="{{ $user->email }}"
            name="email"
            required />
    </div>
    <div class="mb-4">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Senha</label>
        <input type="password"
            id="password"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="password"
            required />
    </div>
    <div class="mb-4">
        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data de Nascimento</label>
        <input type="date"
            id="birth_date"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $user->birth_date }}"
            name="birth_date"
            />
    </div>
    <div class="mb-4">
        <label for="sex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sexo</label>
        <select id="sex"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="sex"
            required>
            <option selected>Selecione</option>
            <option value="M" {{ $user->sex == 'M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ $user->sex == 'F' ? 'selected' : '' }}>Feminino</option>
            <option value="N" {{ $user->sex == 'N' ? 'selected' : '' }}>Prefino Não Informar</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
        <input type="phone"
            id="phone"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="phone"
            value="{{ $user->phone }}"
            required />
    </div>
    <div class="mb-4">
        <label for="permission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Usuário</label>
        <select id="permission"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="permission"
            required>
            <option selected>Selecione</option>
            <option value="A" {{ $user->permission == 'A' ? 'selected' : '' }}>Admin</option>
            <option value="P" {{ $user->permission == 'P' ? 'selected' : '' }}>Professor</option>
        </select>
    </div>
    <div class="mb-4">
        <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
        <select id="status"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="status"
            required>
            <option selected>Selecione</option>
            <option value="A" {{ $user->status == 'A' ? 'selected' : '' }}>Ativo</option>
            <option value="I" {{ $user->status == 'I' ? 'selected' : '' }}>Inativo</option>
        </select>
    </div>
    <x-custom.form-address-inputs :formData=$user ></x-custom.form-address-inputs>

    <input type="hidden" name="id" value="{{ $user->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

