<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Balloon editor</title>
    <script src="<?= base_url('ckeditor5/build/ckeditor.js') ?>"></script>
</head>

<body>
    <h1>Balloon editor</h1>
    <form>
        <?= csrf_field() ?>
        <div class="row">
            <div class="document-editor__toolbar"></div>
        </div>
        <div class="row row-editor">

            <div class="editor">

            </div>
        </div>
    </form>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'), {
                ckfinder: {
                    uploadUrl: "<?= base_url('home/uploadImages') ?>",
                },
                headers: {
                    'X-CSRF-TOKEN': "<?= csrf_hash() ?>",
                    // Authorization: 'Bearer <JSON Web Token>'
                }
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