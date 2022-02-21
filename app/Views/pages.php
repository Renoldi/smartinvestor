<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <form class="row g-3 needs-validation" novalidate method="POST" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="col-12">
            <label for="exampleFormControlInput1" class="form-label">Menu</label>
            <select class="form-select" aria-label="Default select example">

              <?php
              foreach ($menu as $me) {
                echo '<option value="' . $me->id . '">' . $me->menu . '</option>';
              }
              ?>

            </select>
          </div>
          <div class="col-12">
            <label for="exampleFormControlInput1" class="form-label">Section</label>
            <select class="form-select" aria-label="Default select example">
              <option selected value="about">about</option>
              <option value="profit">profit</option>
              <option value="package">package</option>
            </select>
          </div>
          <div class="col-12">
            <label for="exampleFormControlInput1" class="form-label">Section</label>
            <select class="form-select" aria-label="Default select example">
              <option selected value="all">all</option>
              <option value="img">img</option>
              <option value="desc">desc</option>
            </select>
          </div>
          <div class="col-12">
            <label for="exampleFormControlTextarea1" class="form-label">descrition</label>
            <div class="row">
              <div class="document-editor__toolbar"></div>
            </div>
            <textarea class="form-control editor" id="exampleFormControlTextarea1" rows="0"></textarea>
          </div>

          <div class="col-12">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
              <label class="form-check-label" for="flexSwitchCheckDefault">Active</label>
            </div>
          </div>
          <div class="col-12">
            <label for="formFile" class="form-label">Default file input example</label>
            <input class="form-control" type="file" id="formFile" name="image">
          </div>
          <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="<?= base_url('ckeditor5/build/ckeditor.js') ?>"></script>
  <script>
    ClassicEditor
      .create(document.querySelector('.editor'), {
        ckfinder: {
          uploadUrl: "<?= base_url('pages/uploadImages') ?>",
        },

        headers: {
          '<?= csrf_header() ?>': '<?= csrf_hash() ?>',
        }
      })
      .then(editor => {
        window.editor = editor;
      })
      .catch(error => {
        console.error(error);
      });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>