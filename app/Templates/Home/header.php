<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title><?php echo $title.' - '.SITETITLE;?></title>
    <?php
    echo $meta;//place to pass data / plugable hook zone
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    Assets::css([
        Url::templateHomePath().'css/bootstrap.min.css',
        Url::templateHomePath().'css/style.css',
    ]);
    echo $css; //place to pass data / plugable hook zone
    ?>

    <?php
        Assets::js([
        Url::templatePath().'js/jquery-2.1.1.js',
        Url::templatePath().'js/moment.js',
        Url::templatePath().'js/tinymce/tinymce.min.js',
        Url::templatePath().'js/tinymce/jquery.tinymce.min.js',
        Url::templatePath().'js/jquery.validate.js',
    ]);
    ?>
<script>
    tinymce.init({
        selector: "textarea",
        statusbar: false,
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        }
    });
</script>
</head>