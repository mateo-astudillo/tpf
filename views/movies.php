<script>
    function remove_movie(id) {
        console.log(id);
        fetch(`/api/movies/${id}`, {
            method: "delete"
        }).then(() => {
            window.location.reload();
        })
    }
</script>

<table class="w-full text-left text-gray-600 bg-white">
    <thead class="text-gray-800 uppercase bg-gray-100">
        <tr>
            <th scope="col" class="py-3 px-6">Nombre</th>
            <th scope="col" class="py-3 px-6">Año de estreno</th>
            <th scope="col" class="py-3 px-6">Género</th>
            <th scope="col" class="py-3 px-6">Reparto</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (get_all_movies() as $m) :; ?>
            <tr class="border">
                <td class="py-4 px-6"><?php echo $m["name"] ?></td>
                <td class="py-4 px-6"><?php echo $m["release_year"] ?></td>
                <td class="py-4 px-6"><?php echo $m["genre"] ?></td>
                <td class="py-4 px-6">
                    <a href=<?php echo "/movies/" . $m["id"] . "/actors" ?>>
                        <?php echo $m["id"] ?>
                    </a>
                </td>
                <td class="py-4 px-6 flex flex-col">
                    <div>
                        <button onclick=<?php echo "remove_movie(" . $m["id"] . ")" ?>>Eliminar</button>
                    </div>
                    <div>
                        <button>Editar</button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
