<div class="flex gap-4">
    <form action="/api/files" method="POST" enctype="multipart/form-data" class="flex flex-col items-center bg-slate-200 border-2 border-slate-800 rounded">
        <div class="flex">
            <div class="flex flex-col gap-y-8 p-10">
                <label for="actors_file" class="px-10 hover:text-gray-700">Archivo ".csv" de actores</label>
            </div>
            <div class="flex flex-col gap-y-8 p-10">
                <input id="actors_file" name="actors_file" type="file" required class="rounded">
            </div>
        </div>
        <div class="flex-item m-2">
            <button type="submit" class="inline-flex px-5 py-2 bg-emerald-400 rounded hover:bg-emerald-300">Subir archivo</button>
        </div>
    </form>

    <form action="/api/files" method="POST" enctype="multipart/form-data" class="flex flex-col items-center bg-slate-200 border-2 border-slate-800 rounded">
        <div class="flex">
            <div class="flex flex-col gap-y-8 p-10">
                <label for="movies_file" class="px-10 hover:text-gray-700">Archivo ".csv" de películas</label>
            </div>
            <div class="flex flex-col gap-y-8 p-10">
                <input id="movies_file" name="movies_file" type="file" required class="rounded">
            </div>
        </div>
        <div class="flex-item m-2">
            <button type="submit" class="inline-flex px-5 py-2 bg-emerald-400 rounded hover:bg-emerald-300">Subir archivo</button>
        </div>
    </form>
</div>

