function previewImages() {
    const preview = document.getElementById('image-preview');
    const files = document.querySelector('input[type=file]').files;

    if (!preview) {
        const previewDiv = document.createElement('div');
        previewDiv.id = 'image-preview';
        previewDiv.className = 'mt-4 grid grid-cols-4 gap-4';
        document.querySelector('input[type=file]').parentNode.appendChild(previewDiv);
    }

    preview.innerHTML = '';
    
    function readAndPreview(file) {
        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
            return;
        }

        const reader = new FileReader();
        
        reader.addEventListener('load', function() {
            const image = new Image();
            image.height = 128;
            image.title = file.name;
            image.src = this.result;
            image.className = 'w-full h-32 object-cover rounded';
            
            const imageContainer = document.createElement('div');
            imageContainer.className = 'relative';
            imageContainer.appendChild(image);
            
            preview.appendChild(imageContainer);
        });
        
        reader.readAsDataURL(file);
    }

    if (files) {
        Array.prototype.forEach.call(files, readAndPreview);
    }
}