<form class="max-w-sm mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formSchedule">
    @csrf
    
    <div class="mb-4">
        <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Nome</label>
        <input type="text"
            id="title"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Digite o Nome"
            value="{{ $schedule->title }}"
            name="title"
            required />
    </div>
    <div class="mb-4">
        <label for="description" class="block mb-1 text-sm font-medium text-gray-900">Descrição</label>
        <input type="text" id="description"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Digite a Descrição"
            value="{{ $schedule->description }}"
            name="description"
            required />
    </div>
    <div class="mb-4">
        <label for="category_id" class="block mb-1 text-sm font-medium text-gray-900">Categoria</label>
        <select name="category_id" id="category_id" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Selecione uma Categoria</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $schedule->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label class="block mb-1 text-sm font-medium text-gray-900">Semana</label>
        
        <div class="flex">
            @foreach ($dias_semana as $dia_semana)
            <div class="flex items-center me-4">
                <input id="dia_semana_{{ $dia_semana['numero'] }}" type="checkbox" value="{{ $dia_semana['numero'] }}" name="day_week[{{ $dia_semana['numero'] }}]" {{ $schedule->hasDay($dia_semana['numero']) }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                <label for="dia_semana_{{ $dia_semana['numero'] }}" class="ms-2 text-sm font-medium text-gray-900">{{ $dia_semana['dia'] }}</label>
            </div>
            @endforeach
        </div>

    </div>
    <div class="mb-4">
        <label for="time_start" class="block mb-1 text-sm font-medium text-gray-900">Data de inicio</label>
        <input type="time"
            id="time_start"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $schedule->time_start }}"
            name="time_start"
            />
    </div>
    <div class="mb-4">
        <label for="time_end" class="block mb-1 text-sm font-medium text-gray-900">Data de Final</label>
        <input type="time"
            id="time_end"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $schedule->time_end }}"
            name="time_end"
            />
    </div>

    <input type="hidden" name="id" value="{{ $schedule->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

