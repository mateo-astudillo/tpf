<form action="/api/actors" method="POST" class="flex flex-col items-center bg-slate-200 border-2 border-slate-800 rounded">
    <div class="flex flex-row">
        <div class="flex flex-col gap-y-8 p-10">
            <label for="first_name" class="px-10 hover:text-gray-700">Nombre</label>
            <label for="last_name" class="px-10">Apellido</label>
            <label for="birthdate" class="px-10">Fecha de nacimiento</label>
        </div>
        <div class="flex flex-col gap-y-8 p-10">
            <input id="first_name" name="first_name" type="text" required class="rounded">
            <input id="last_name" name="last_name" type="text" required class="rounded">
            <input id="birthdate" name="birthdate" type="date" required class="rounded">
        </div>
    </div>
    <div class="flex-item m-2">
        <button type="submit" class="inline-flex px-5 py-2 bg-emerald-400 rounded hover:bg-emerald-300">Insertar</button>
    </div>
</form>
