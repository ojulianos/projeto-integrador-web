<form class="max-w-sm mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formSchedule">
    @csrf
    
    <div class="mb-4">
        <label for="name" class="block mb-1 text-sm font-medium text-gray-900">Nome</label>
        <input type="text"
            id="name"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            placeholder="Digite o Nome"
            value="{{ $schedules->title }}"
            name="name"
            required />
    </div>
    <div class="mb-4">
        <label for="description" class="block mb-1 text-sm font-medium text-gray-900">Descrição</label>
        <input type="text" id="description"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            placeholder="Digite a Descrição"
            value="{{ $schedules->description }}"
            name="description"
            required />
    </div>
    <div class="mb-4">
        <label for="category_id" class="block mb-1 text-sm font-medium text-gray-900">Categoria</label>
        <input type="text"
            id="category_id"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $schedules->category_id }}"
            name="category_id"
            />
    </div>
    <div class="mb-4">
        <label for="dar_week" class="block mb-1 text-sm font-medium text-gray-900">Semana</label>
        <input type="text"
            id="dar_week"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $schedules->dar_week }}"
            name="dar_week"
            />
    </div>
    <div class="mb-4">
        <label for="time_start" class="block mb-1 text-sm font-medium text-gray-900">Data de inicio</label>
        <input type="Date"
            id="time_start"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $schedules->time_start }}"
            name="time_start"
            />
    </div>
    <div class="mb-4">
        <label for="time_end" class="block mb-1 text-sm font-medium text-gray-900">Data de Final</label>
        <input type="Date"
            id="time_end"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $schedules->time_end }}"
            name="time_end"
            />
    </div>

    <input type="hidden" name="id" value="{{ $schedules->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

