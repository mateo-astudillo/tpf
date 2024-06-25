<form action="/api/movies" method="POST" class="flex flex-col items-center bg-slate-200 border-2 border-slate-800 rounded">
    <div class="flex flex-row">
        <div class="flex flex-col gap-y-8 p-10">
            <label for="name" class="px-10 hover:text-gray-700">Nombre</label>
            <label for="genre" class="px-10">Género</label>
            <label for="release_year" class="px-10">Año de estreno</label>
        </div>
        <div class="flex flex-col gap-y-8 p-10">
            <input id="name" name="name" type="text" maxlength="255" required class="rounded">
            <input id="genre" name="genre" type="text" maxlength="64" required class="rounded">
            <input id="release_year" name="release_year" type="number" min="1800" max="2024" required class="rounded">
        </div>
    </div>
    <div class="flex-item m-2">
        <button type="submit" class="inline-flex px-5 py-2 bg-emerald-400 rounded hover:bg-emerald-300">Insertar</button>
    </div>
</form>
