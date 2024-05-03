FilePond.registerPlugin(
    FilePondPluginImagePreview
    );

let elements = document.querySelectorAll(".filepond")


elements.forEach(
   Element => {
    FilePond.create(
        Element, 
        {
            storeAsFile: true,
            imagePreviewHeight: 170,
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            files: [
                {
                    options: {type : 'image/png'}
                }
            ]
        }
    );
   } 
)