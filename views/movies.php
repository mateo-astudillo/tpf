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
    <?php
    $movies = get_all_movies();
    foreach ($movies as $m) {
        echo '
        <tr class="border">
            <td class="py-4 px-6">'.$m["name"].'</td>
            <td class="py-4 px-6">'.$m["release_year"].'</td>
            <td class="py-4 px-6">'.$m["genre"].'</td>
            <td class="py-4 px-6"><a href="/movies/'.$m["id"].'/actors">'.$m["id"].'</a></td>
            <td class="py-4 px-6 flex flex-col">
                <div>
                    <button onclick="remove_movie('.$m["id"].')">Eliminar</button>
                </div>
                <div>
                    <button>Editar</button>
                </div>
            </td>
        </tr>
        ';
    }
    ?>
    </tbody>
</table>
