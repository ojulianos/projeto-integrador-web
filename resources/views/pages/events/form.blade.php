<form class="max-w-sm mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formPresence">
    @csrf
    <div class="mb-4">
        <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Titulo</label>
        <input type="text"
            id="title"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            placeholder="Confirmar presença"
            value="{{ $events->title }}"
            name="title"
            required />
    </div>
    <div class="mb-4">
        <label for="title" class="block mb-1 text-sm font-medium text-gray-900">Descrição</label>
        <input type="text" id="title"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            placeholder="Descrição"
            value="{{ $events->description }}"
            name="title"
            required />
    </div>
    <div class="mb-4">
        <label for="date_event" class="block mb-1 text-sm font-medium text-gray-900">Data evento</label>
        <input type="Date"
            id="date_event"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $events->date_event }}"
            name="date_event"
            />
    </div>
    <input type="hidden" name="id" value="{{ $events->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

