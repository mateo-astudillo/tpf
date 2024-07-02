<h1 class="capitalize text-4xl w-1/3">
    <?php
        $movie = get_movie($id);
        echo strtolower($movie["name"]);
    ?>
</h1>

<table class="w-full text-left text-gray-600 bg-white">
    <thead class="text-gray-800 uppercase bg-gray-100">
        <tr class="flex justify-around text-center">
            <th scope="col" class="py-3 px-6 w-1/3">Nombre</th>
            <th scope="col" class="py-3 px-6 w-1/3">Personaje</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach(get_actors_by_movie($id) as $a): ; ?>
        <tr class="flex justify-around text-center border capitalize">
            <td class="py-4 px-6 w-1/3">
                <?php echo strtolower($a["first_name"] . " " . $a["last_name"]) ?>
            </td>
            <td class="py-4 px-6 w-1/3">
                <?php echo strtolower(get_character($id, $a["id"])["character"]); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
