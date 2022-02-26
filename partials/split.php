<?php
$gradient = $args['gradient'];
$info = $args['info'];
?>
<div class="row mb-4">
    <div class="col col-lg-6 col-12" id="featured-image">

    </div>
    <div class="col col-lg-6 col-12 white-text <?php echo $gradient; ?>">

<?php

// 

echo "<div class = 'col  p-3'>";
echo "<div>";
foreach ($info as $key => $value) {
    if ($key == 'repo') {
        $url = $value['url'];
        $is_private = $value['is_private'];
        echo "<p><strong class = 'highlight'>Code Repository:</strong> <a href = {$url} target=\"_new\" class=\"white-text\">$url</a>";
        if ($is_private == "true") {
            echo " <em>(code is password-protected)</em>";
        }
        echo "</p>";
    } else if (str_contains($key, "empty")) {
        echo "<p>{$value}</p>";
    } else {
        echo "<p><strong class = 'highlight'>{$key}:</strong> {$value}</p>";
    }
}
echo "</div>";
echo "</div>";

        ?>
    </div>
</div>
