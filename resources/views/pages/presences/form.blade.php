<form class="max-w-sm mx-auto" action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="formPresence">
    @csrf
    <div class="mb-4">
        <label for="confirmed" class="block mb-1 text-sm font-medium text-gray-900">Confirmar</label>
        <div class="flex">
            <div class="flex items-center me-4">
                <input id="inline-radio" type="radio" name="confirmed" value="S" {{ $presences->confirmed == 'S' ? 'checked' : '' }} name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                <label for="inline-radio" class="ms-2 text-sm font-medium text-gray-900">Sim</label>
            </div>
            <div class="flex items-center me-4">
                <input id="inline-2-radio" type="radio" name="confirmed" value="N" {{ $presences->confirmed == 'N' ? 'checked' : '' }} name="inline-radio-group" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                <label for="inline-2-radio" class="ms-2 text-sm font-medium text-gray-900">Não</label>
            </div>
        </div>

    </div>
    <div class="mb-4">
        <label for="schedule_class_id" class="block mb-1 text-sm font-medium text-gray-900">Agenda</label>
        <select name="schedule_class_id" id="schedule_class_id" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
            <option value="">Selecione uma Agenda</option>
            @foreach ($classes as $class)
            <option value="{{ $class->id }}" {{ $presences->schedule_class_id == $class->id ? 'selected' : '' }}>{{ $class->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="student_id" class="block mb-1 text-sm font-medium text-gray-900">Estudante</label>
        <select name="student_id" id="student_id" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500">
            <option value="">Selecione um aluno</option>
            @foreach ($students as $student)
            <option value="{{ $students->id }}" {{ $schedule->student_id == $students->id ? 'selected' : '' }}>{{ $student->name }}</option>
            @endforeach
        </select>
    </div>
    <input type="hidden" name="id" value="{{ $presences->id }}">
    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Salvar
    </button>
</form>

