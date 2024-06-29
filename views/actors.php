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
        <tr>
            <th scope="col" class="py-3 px-6">Actor/Actriz</th>
            <th scope="col" class="py-3 px-6">Edad</th>
            <th scope="col" class="py-3 px-6">Películas</th>
            <th scope="col" class="py-3 px-6">Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach (get_all_actors() as $a): ; ?>
            <tr class="border">
                <td class="py-4 px-6"><?php echo $a["first_name"] . " " . $a["last_name"] ?></td>
                <td class="py-4 px-6"><?php echo age($a["birthdate"]) ?></td>
                <td class="py-4 px-6">
                    <a href=<?php echo "/actors/" . $a["id"] . "/movies" ?>>
                        <?php echo $a["id"] ?>
                    </a>
                </td>
                <td class="py-4 px-6 flex flex-col">
                    <div>
                        <button onclick=<?php echo "remove_actor(" . $a["id"] . ")" ?>>Eliminar</button>
                    </div>
                    <div>
                        <button>
                            <a href=<?php echo "/actors/edit/". $a["id"] ?>>
                                Editar
                            </a>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
