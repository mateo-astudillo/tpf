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
        <tr class="flex justify-around text-center">
            <th scope="col" class="py-3 px-6 w-1/5">Nombre</th>
            <th scope="col" class="py-3 px-6 w-1/5">Año de estreno</th>
            <th scope="col" class="py-3 px-6 w-1/5">Género</th>
            <th scope="col" class="py-3 px-6 w-1/5">Reparto</th>
            <th scope="col" class="py-3 px-6 w-1/5">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (get_all_movies() as $m): ; ?>
            <tr class="flex justify-around text-center border">
                <td class="py-4 px-6 w-1/5 capitalize"><?php echo strtolower($m["name"]) ?></td>
                <td class="py-4 px-6 w-1/5"><?php echo $m["release_year"] ?></td>
                <td class="py-4 px-6 w-1/5 capitalize"><?php echo strtolower($m["genre"]) ?></td>
                <td class="py-4 px-6 w-1/5 hover:text-gray-900">
                    <a href=<?php echo "/movies/" . $m["id"] . "/actors" ?>>
                        <?php echo get_number_of_actors_by_movie($m["id"])["actors"]; ?>
                    </a>
                </td>
                <td class="flex justify-around py-4 px-6 w-1/5">
                        <button>
                            <a class="hover:text-gray-900" href=<?php echo "/movies/edit/". $m["id"] ?>>
                                Editar
                            </a>
                        </button>
                        <button class="hover:text-gray-900" onclick=<?php echo "remove_movie(" . $m["id"] . ")" ?>>Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
