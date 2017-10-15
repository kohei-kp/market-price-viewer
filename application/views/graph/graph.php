<div class="container">

    <div class="row">
    <?php
    foreach ($card_data as $card)
    {
        echo '<div class="col s12 m6">'; // ← 可変にする
        echo '<div class="card">';
        echo '<div class="card-image">';
        echo '<img src="' . base_url() . 'assets/screenshot/' . $card['card_id'] . '.jpg">';
        echo '<a href="' . $card['url'] . '" class="btn-floating btn halfway-fab waves-effect waves-light tooltipped" target="_blank" data-position="bottom" data-delay="50" data-tooltip="Open market price chart.">';
        echo '<i class="material-icons left">multiline_chart</i></a>';
        echo '</div>';
        echo '<div class="card-content">';
        echo '<span class="card-title indigo-text darken-4">' . $card['card_name'] . '</span>';
        echo '</div>';
        echo '<div class="card-action">';
        echo '<a class="btn waves-effect waves-light"><i class="material-icons">refresh</i>REFRESH</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
    </div>
</div>
