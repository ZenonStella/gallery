fileToUpload = document.getElementById('fileToUpload')
imgPreview = document.getElementById('imgPreview')

fileToUpload.addEventListener("change", function () {
	let input = this;
	let oFReader = new FileReader(); // on créé un nouvel objet FileReader
	oFReader.readAsDataURL(this.files[0]);
	oFReader.onload = function (oFREvent) {
		imgPreview.setAttribute('src', oFREvent.target.result);
	};
})