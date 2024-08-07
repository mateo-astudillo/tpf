<script>
    function remove_actor(id) {
        console.log(id);
        fetch(`/api/actors/${id}`, {
            method: "delete"
        }).then(() => {
            window.location.reload();
        })
    }
</script>

<table class="w-full text-left text-gray-600 bg-white">
    <thead class="text-gray-800 uppercase bg-gray-100">
        <tr class="flex justify-around text-center">
            <th scope="col" class="py-3 px-6 w-1/4">Actor/Actriz</th>
            <th scope="col" class="py-3 px-6 w-1/4">Edad</th>
            <th scope="col" class="py-3 px-6 w-1/4">Películas</th>
            <th scope="col" class="py-3 px-6 w-1/4">Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach (get_all_actors() as $a): ; ?>
            <tr class="flex justify-around text-center border">
                <td class="py-4 px-6 w-1/4 capitalize"><?php echo strtolower($a["first_name"] . " " . $a["last_name"]) ?></td>
                <td class="py-4 px-6 w-1/4"><?php echo age($a["birthdate"]) ?></td>
                <td class="py-4 px-6 w-1/4">
                    <a class="px-2 py-2 rounded hover:underline hover:text-black" href=<?php echo "/actors/" . $a["id"] . "/movies" ?>>
                        <?php echo get_number_of_movies_by_actor($a["id"])["movies"]; ?>
                    </a>
                </td>
                <td class="flex justify-around py-4 px-6 w-1/4">
                        <button class="rounded px-4 py-2 hover:bg-green-400 hover:text-black">
                            <a href=<?php echo "/actors/edit/". $a["id"] ?>>
                                Editar
                            </a>
                        </button>
                        <button class="rounded px-4 py-2 hover:bg-red-400 hover:text-black" onclick=<?php echo "remove_actor(" . $a["id"] . ")" ?>>
                            Eliminar
                        </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
