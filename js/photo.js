const img = document.querySelector('img');
// xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
// xhr.send(null);
// console.log("d");
document.onreadystatechange = () => {
	if (document.readyState === "complete"){
		console.log(window.location);
		img.src = "../data/image/" +window.location.search.slice(5) + ".png";
		
		// console.log(window.location.search.slice(5));
		// // console.log("d");
		// // get_
		// img.style.display = "none";
		// // document.innerHTML = "d";
		// // console.log(img);
 		}
 }