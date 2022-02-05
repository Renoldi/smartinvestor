<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Balloon editor</title>
    <script src="<?= base_url('assets/ckeditor5/ckeditor.js')?>"></script>
</head>

<body>
    <h1>Balloon editor</h1>
    <div id="isi">
        <p>This is some sample content.</p>
    </div>
    <script>
          ClassicEditor
            .create(document.querySelector('#isi'),{
                ckfinder:{
                    uploadUrl: "<?= base_url('home/uploadImages') ?>",
                },
            }).then(editor=>{
                console.log(editor);
            }).catch(error=>{
                console.log(error);
            });
    </script>
</body>

</html>