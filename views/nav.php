<script>
    function reset() {
        fetch("/api/reset", {
            method: "PUT"
        }).then(() => {

            // window.location.reload();
        })
    }
</script>

<header class="bg-gray-800 px-10 py-2">
    <nav class="flex justify-center items-center">
        <a href="/actors" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Actores</a>
        <a href="/movies" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Películas</a>
        <a href="/actors/insert" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Agregar actor/actriz</a>
        <a href="/movies/insert" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Agregar película</a>
        <a href="/files" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Archivos</a>
        <button onclick="reset()" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Restaurar datos</button>
    </nav>
</header>
