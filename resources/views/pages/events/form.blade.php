<form class="mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formEvent">
    @csrf
    <div class="mb-4">
        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
        <input type="text"
            id="title"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Título do Evento"
            value="{{ $event->title }}"
            name="title"
            required />
    </div>
    <div class="mb-4">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
        <input type="text" id="description"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Descrição do Evento"
            value="{{ $event->description }}"
            name="description"
            required />
    </div>
    <div class="mb-4">
        <label for="date_event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data evento</label>
        <input type="date"
            id="date_event"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $event->date_event }}"
            name="date_event"
            />
    </div>
    <input type="hidden" name="id" value="{{ $event->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

