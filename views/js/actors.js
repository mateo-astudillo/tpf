async function show_actors() {
  const data = await fetch("/api/actors", "GET");
  const tb = document.getElementById("table_body");
  const actors = JSON.parse(data.body());
  actors.foreach((e) => {
    console.log(e.first_name);
    console.log(e.last_name);
    console.log(e.birthdate);
  })
}
