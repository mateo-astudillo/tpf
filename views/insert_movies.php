<form action="#" method="POST" class="flex justify-center">
    <div class="flex flex-col gap-y-8 p-10">
        <label for="movie_name" class="px-10 hover:text-gray-700">Nombre</label>
        <label for="genre" class="px-10">Género</label>
        <label for="release_year" class="px-10">Año de estreno</label>
    </div>
    <div class="flex flex-col gap-y-8 p-10">
        <input id="movie_name" name="movie_name" type="text" class="rounded">
        <input id="genre" name="genre" type="text" class="rounded">
        <input id="release_year" name="release_year" type="date" class="rounded">
    </div>
    <button type="submit">Insertar</button>
</form>
