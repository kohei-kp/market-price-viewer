<div class="row">

  <div class="col s12 m12">
    <h4>Add Card</h4>

    <div class="row">
        <a id="add-btn" href="#!" class="btn-floating btn-large wave-effect waves-light">
          <i class="material-icons">add</i>
        </a>
    <div>

    <form action="<?php echo site_url('card/create');?>" method="post">

    <section id="forms">
      <div class="row">
        <div class="input-field col s12">
          <?php echo form_dropdown('group_list', $group_data); ?>
          <label>Materialize Select</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s3">
          <input placeholder="Card Name" id="card_name0" name="card_name0" type="text" class="validate">
          <label for="card_name0">Card Name</label>
        </div>
        <div class="input-field col s3">
          <input placeholder="http://wonder.wisdom-guild.net/graph/" id="url0" name="url0" type="text" class="validate">
          <label for="url0">URL</label>
        </div>
        <div class="input-field col s1">
          <input placeholder="630" id="width0" name="width0" type="text" class="validate">
          <label for="width0">Width</label>
        </div>
        <div class="input-field col s1">
          <input placeholder="240" id="height0" name="height0" type="text" class="validate">
          <label for="height0">Height</label>
        </div>
        <div class="input-field col s1">
          <input placeholder="200" id="top0" name="top0" type="text" class="validate">
          <label for="top0">Top</label>
        </div>
        <div class="input-field col s1">
          <input placeholder="20" id="left0" name="left0" type="text" class="validate">
          <label for="left0">Left</label>
        </div>
      </div>
    </section>

    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
      <i class="material-icons right">send</i>
    </button>
    </form>
  </div>
</div>

<script>
const $add_btn = $('#add-btn');

$('select').material_select();

$add_btn.on('click', e => {
    const $forms = $('#forms');
    const row_number = $forms.children('.row').toArray().length;

    const content = `
      <div class="row">
        <div class="input-field col s3">
          <input placeholder="Card Name" id="card_name${row_number}" name="card_name${row_number}" type="text" class="validate">
          <label for="card_name${row_number}">Card Name</label>
        </div>
        <div class="input-field col s3">
          <input placeholder="http://wonder.wisdom-guild.net/graph/" id="url${row_number}" name="url${row_number}" type="text" class="validate">
          <label for="url${row_number}">URL</label>
        </div>
        <div class="input-field col s1">
          <input placeholder="630" id="width${row_number}" name="width${row_number}" type="text" class="validate">
          <label for="width${row_number}">Width</label>
        </div>
        <div class="input-field col s1">
          <input placeholder="240" id="height${row_number}" name="height${row_number}" type="text" class="validate">
          <label for="height${row_number}">Height</label>
        </div>
        <div class="input-field col s1">
          <input placeholder="200" id="top${row_number}" name="top${row_number}" type="text" class="validate">
          <label for="top${row_number}">Top</label>
        </div>
        <div class="input-field col s1">
          <input placeholder="20" id="left${row_number}" name="left${row_number}" type="text" class="validate">
          <label for="left${row_number}">Left</label>
        </div>
      </div>
    `;

    $forms.append(content);
    Materialize.updateTextFields();
});
</script>
