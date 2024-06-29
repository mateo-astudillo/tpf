<?php $movie = get_movie($id); ?>
<script>
    function update(id) {
        fetch(`/api/movies/${id}`, {
            method: "PATCH"
        }).then(() => {
            location.replace("/movies")
        })
    }
</script>
<div class="flex flex-col items-center bg-slate-200 border-2 border-slate-800 rounded">
    <div class="flex flex-row">
        <div class="flex flex-col gap-y-8 p-10">
            <label for="first_name" class="px-10 hover:text-gray-700">Nombre</label>
            <label for="birthdate" class="px-10">Género</label>
            <label for="last_name" class="px-10">Año de estreno</label>
        </div>
        <div class="flex flex-col gap-y-8 p-10">
            <input id="name" name="name" type="text" maxlength="255" required class="rounded" value='<?php echo $movie["name"] ?>'>
            <input id="genre" name="genre" type="text" maxlength="64" class="rounded" value='<?php echo $movie["genre"] ?>'>
            <input id="release_year" name="release_year" type="number" min="1800" max='<?php echo Date("Y"); ?>' required class="rounded" value='<?php echo $movie["release_year"] ?>'>
        </div>
    </div>
    <div class="flex-item m-2">
        <button onclick=<?php echo "update(" . $actor["id"] . ")"; ?> class="inline-flex px-5 py-2 bg-emerald-400 rounded hover:bg-emerald-300">Actualizar</button>
    </div>
</div>
