<?php $actor = get_actor($id); ?>
<script>
    function update(id) {
        let actor = {
            "first_name": document.getElementById("first_name").value,
            "last_name": document.getElementById("last_name").value,
            "birthdate": document.getElementById("birthdate").value
        };
        fetch(`/api/actors/${id}`, {
            method: "PATCH",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(actor)
        }).then(() => {
            location.replace("/actors");
        });
    }
</script>
<div class="flex flex-col items-center w-min bg-slate-200 border-2 border-slate-800 rounded">
    <div class="flex flex-row">
        <div class="flex flex-col gap-y-8 p-10">
            <label for="first_name" class="px-10 hover:text-gray-700">Nombre</label>
            <label for="last_name" class="px-10">Apellido</label>
            <label for="birthdate" class="px-10">Fecha de nacimiento</label>
        </div>
        <div class="flex flex-col gap-y-8 p-10">
            <input id="first_name" name="first_name" type="text" required class="rounded" value='<?php echo $actor["first_name"] ?>'>
            <input id="last_name" name="last_name" type="text" required class="rounded" value='<?php echo $actor["last_name"]?>'>
            <input id="birthdate" name="birthdate" type="date" required class="rounded" value='<?php echo $actor["birthdate"]?>'>
        </div>
    </div>
    <div class="flex-item m-2">
        <button onclick='<?php echo "update(" . $actor["id"] . ")"; ?>' class="inline-flex px-5 py-2 bg-emerald-400 rounded hover:bg-emerald-300">Actualizar</button>
    </div>
</div>
