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
        //   ClassicEditor
        //     .create(document.querySelector('#isi'),{
        //         ckfinder:{
        //             uploadUrl: "<?= base_url('home/uploadImages') ?>",
        //         },
        //     }).then(editor=>{
        //         console.log(editor);
        //     }).catch(error=>{
        //         console.log(error);
        //     });

        ClassicEditor
            .create(document.querySelector('.editor'), {

                licenseKey: '',
                ckfinder: {
                    uploadUrl: "<?= base_url('home/uploadImages') ?>",
                },


            })
            .then(editor => {
                window.editor = editor;




            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                console.warn('Build id: h2o1b6rgt1mp-ef4vw334qih7');
                console.error(error);
            });
    </script>
</body>

</html>