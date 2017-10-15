<div class="container">
  <div class="row">
    <div class="col offset-s4 s4">
      <table class="table border">
        <thead>
          <tr>
            <th>グループ名</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($group_data as $group): ?>
        <?php
            echo '<tr>';
            echo "<td><a href='graph/{$group['group_id']}'>{$group['group_name']}</a></td>";
            echo '<tr>';
        ?>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
