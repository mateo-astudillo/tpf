<script>
    function reset() {
        fetch("/api/reset", {
            method: "PUT"
        }).then(() => {
            location.replace("/")
        })
    }
</script>

<header class="bg-gray-800 px-10 py-2">
    <nav class="flex justify-center items-center">
        <a href="/actors" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Actores</a>
        <a href="/movies" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Películas</a>
        <a href="/insert" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Insertar</a>
        <a href="/files" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Archivos</a>
        <button onclick="reset()" class="rounded px-4 py-2 font-medium text-gray-300 hover:bg-red-400 hover:text-black">Restaurar datos</button>
    </nav>
</header>
