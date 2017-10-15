<div class"row">

  <div class="col s12 m12">
    <h4>Add Group</h4>

    <div class="row">
      <a id="add-btn" href="#!" class="btn-floating btn-large wave-effect waves-light">
        <i class="material-icons">add</i>
      </a>
    </div>

    <form action="<?php echo site_url('group/create');?>" method="post">

      <section id="forms">
        <div class="row">
          <div class="input-field col s6 offset-s3">
            <input placeholder="Group Name" id="group_name" name="group_name" type="text" class="validate">
            <label for="group_name">Group Name</label>
          </div>
        </div>
      </section>

      <button class="btn wave-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>
    </form>
  </div>
</div>
