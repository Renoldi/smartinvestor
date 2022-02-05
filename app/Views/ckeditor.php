<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Balloon editor</title>
    <script src="<?= base_url('ckeditor5/build/ckeditor.js') ?>"></script>
</head>

<body>
    <h1>Balloon editor</h1>
    <div class="row">
        <div class="document-editor__toolbar"></div>
    </div>
    <div class="row row-editor">

        <div class="editor">

        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'), {
                ckfinder: {
                    uploadUrl: "<?= base_url('home/uploadImages') ?>",
                },
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>