function handleFileInputChange() {
    const fileInput = document.getElementById('input-file');
    const previewImage = document.getElementById('image-preview');

    const file = fileInput.files[0];

    if (file) {
        // Read the selected file as a data URL
        const reader = new FileReader();

        reader.onload = function (e) {
            // Set the preview image source
            previewImage.src = e.target.result;
        };

        reader.readAsDataURL(file);
    } else {
        // Clear the preview if no file is selected
        previewImage.src = '';
    }
}

// Attach the handleFileInputChange function to the file input change event
const fileInput = document.getElementById('input-file');
if (fileInput) {
    fileInput.addEventListener('change', handleFileInputChange);
}

const images = [];

function handleMultipleFileInputChange() {
    const fileInput = document.getElementById('input-file-multiple');
    const previewContainer = document.getElementById('preview-container');

    // Clear existing previews
    previewContainer.innerHTML = '';
    images.push(fileInput.files);
    console.log(images);
    // Loop through each selected file
    images.map(image => {
        for (const file of image) {
            // Create a new image element for each file
            const previewImage = document.createElement('img');
            // previewImage.classList.add('col-5');
            previewImage.style.maxWidth = "250px";
            previewImage.style.margin = "10px 0";
            previewImage.style.objectFit = "contain";


            // Read the selected file as a data URL
            const reader = new FileReader();

            reader.onload = function (e) {
            // Set the preview image source
            previewImage.src = e.target.result;
            console.log(image)
        };

            reader.readAsDataURL(file);

            // Append the preview image to the container
            previewContainer.appendChild(previewImage);
        }
    })
}

// Attach the handleFileInputChange function to the file input change event
const multipleFileInput = document.getElementById('input-file-multiple');
if (multipleFileInput) {
    multipleFileInput.addEventListener('change', handleMultipleFileInputChange);
}
