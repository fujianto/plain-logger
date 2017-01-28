<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('theme_options', 'Plain Logger')
    ->set_icon('dashicons-carrot')
    ->set_page_parent('options-general.php')
    ->add_fields(array(
        Field::make('textarea', 'log_area', 'Log area')
));