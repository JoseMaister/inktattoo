<div class="container">
   <h2>Edit</h2>
   <form method="POST" action=<?= base_url('admin/update') ?> enctype="multipart/form-data">
      <input type="hidden" class="form-control" value="<?= $data->id ?>" name='id'>
      <div class="form-group">
      <div class="form-group">
         <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" value="<?= $data->tittle ?>" name='tittle'>
      </div>
         <label for="exampleInputEmail1">Category</label>
            <input type="text" class="form-control" value="<?= $data->category ?>" name='category'>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Intro Text</label>
            <input type="text" class="form-control" value="<?= $data->intro_text ?>" name='intro_text'>
      </div>
      <div class="form-outline w-100 mb-4">
         <label for="exampleInputEmail1">Content</label>
         <textarea class="form-control"  rows="3" name="content">
            <?= $data->content ?></textarea>
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Images</label>
            <input type="file" class="form-control" name="foto" accept="image/*">
      </div>
         <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit </button>
   </form>
</div>