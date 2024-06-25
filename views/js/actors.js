async function show_actors() {
  const actors = await fetch("/api/actors", "GET");
  const tb = document.getElementById("table_body");
  console.log(actors);
  // const tr = document.createElement("tr");

  // const tr = document.createElement("tr");
  
  
}
