<h1 class="capitalize text-4xl w-1/4">
    <?php
        $actor = get_actor($id);
        echo strtolower($actor["first_name"] . " " . $actor["last_name"]);
    ?>
</h1>

<table class="w-full text-left text-gray-600 bg-white">
    <thead class="text-gray-800 uppercase bg-gray-100">
        <tr class="flex justify-around text-center">
            <th scope="col" class="py-3 px-6 w-1/4">Nombre</th>
            <th scope="col" class="py-3 px-6 w-1/4">Género</th>
            <th scope="col" class="py-3 px-6 w-1/4">Personaje</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach(get_movies_by_actor($id) as $m): ; ?>
        <tr class="flex justify-around text-center border capitalize">
            <td class="py-4 px-6 w-1/4"><?php echo strtolower($m["name"]) ?></td>
            <td class="py-4 px-6 w-1/4"><?php echo strtolower($m["genre"]) ?></td>
            <td class="py-4 px-6 w-1/4"><?php echo strtolower(get_character($m["id"], $id)["character"]); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
