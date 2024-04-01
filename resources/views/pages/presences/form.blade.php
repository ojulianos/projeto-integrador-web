<form class="max-w-sm mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formPresence">
    @csrf
    <div class="mb-4">
        <label for="confirmed" class="block mb-1 text-sm font-medium text-gray-900">Confirmar</label>
        <input type="text"
            id="confirmed"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            placeholder="Confirmar presença"
            value="{{ $presences->confirmed }}"
            name="confirmed"
            required />
    </div>
    <div class="mb-4">
        <label for="schedule_class_id" class="block mb-1 text-sm font-medium text-gray-900">Agenda</label>
        <input type="text" id="schedule_class_id"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            placeholder="Agenda"
            value="{{ $presences->schedule_class_id }}"
            name="schedule_class_id"
            required />
    </div>
    <div class="mb-4">
        <label for="student_id" class="block mb-1 text-sm font-medium text-gray-900">Estudante</label>
        <input type="text"
            id="student_id"
            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500"
            value="{{ $presences->student_id }}"
            name="student_id"
            />
    </div>
    <input type="hidden" name="id" value="{{ $presences->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

