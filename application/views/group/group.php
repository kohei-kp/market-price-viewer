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
            <input placeholder="Group Name" id="group_name0" name="group_name0" type="text" class="validate">
            <label for="group_name0">Group Name</label>
          </div>
        </div>
      </section>

      <button class="btn wave-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>
    </form>
  </div>
</div>

<script>
const $add_btn = $('#add-btn');

$add_btn.on('click' , e => {
  const $forms = $('#forms');
  const row_number = $forms.children('.row').toArray().length;

  const content = `
    <div class="row">
      <div class="input-field col s6 offset-s3">
        <input placeholder="Group Name" id="group_name${row_number}" name="group_name${row_number}" type="text" class="validate">
        <label for="group_name${row_number}">Group Name</label>
      </div>
    </div>
  `;

  $forms.append(content);
  Materialize.updateTextFields();
});
</script>
