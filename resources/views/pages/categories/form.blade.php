<form class="mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formCategory">
    @csrf
    
    <div class="mb-4">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
        <input type="text"
            id="name"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Digite o Nome"
            value="{{ $category->name }}"
            name="name"
            required />
    </div>
    <div class="mb-4">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
        <input type="text" id="description"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Digite a descriçao"
            value="{{ $category->description }}"
            name="description"
            required />
    </div>
    <div class="mb-4">
        <label for="age_max" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Idade Máxima</label>
        <input type="number"
            id="age_max"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $category->age_max }}"
            name="age_max"
            required />
    </div>
    <div class="mb-4">
        <label for="age_min" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Idade Mínima</label>
        <input type="number"
            id="age_min"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $category->age_min }}"
            name="age_min"
            />
    </div>
   
    <input type="hidden" name="id" value="{{ $category->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

