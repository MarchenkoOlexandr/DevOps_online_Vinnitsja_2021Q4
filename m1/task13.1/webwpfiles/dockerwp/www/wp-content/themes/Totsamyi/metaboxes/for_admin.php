<?php
/* Добавляем ID в админку и к записи, для маски файла
--------------------------------------------------------------------------------------------------------------------------------- */
add_filter('manage_posts_columns' , 'custom_set_posts_columns');
function custom_set_posts_columns($columns) {
return array(
'cb' => '<input type="checkbox" />',
'id' => __('Маска'),
'title' => __('Название Мода / Игры'),
'author' => __('Автор'),
'categories' => __('Раздел'),
'date' => __('Дата добавления'),
);
}

add_action( 'manage_posts_custom_column' , 'custom_set_posts_columns_value', 10, 2 );
function custom_set_posts_columns_value( $column, $post_id ) {
if ($column == 'id'){
echo $post_id;
}
}

add_action('admin_head', 'custom_admin_styling');
function custom_admin_styling() {
echo '<style type="text/css">';
echo 'th#id{width:45px;text-align: center;}';
echo 'td.column-id{text-align: center;}';
echo '</style>';
}

function cf_post_id() {
	global $post;

	// Get the data
	$id = $post->ID;

	// Echo out the field
	echo '<input type="text" name="_id" value="' . $id . '_name_file.exe" class="widefat" disabled />';
}

function ve_custom_meta_boxes() {
    $post_types = get_post_types();
	foreach ( $post_types as $post_type )
	add_meta_box('projects_refid', 'Маска файла:', 'cf_post_id', $post_type, 'side', 'high');
}
add_action('add_meta_boxes', 've_custom_meta_boxes');

//// Покажем ID картинки при загрузке

if ( ! function_exists( 't5_show_attachment_id' ) )
{
    add_filter( 'attachment_fields_to_edit', 't5_show_attachment_id', 10, 2 );

    function t5_show_attachment_id( $form_fields, $post )
    {
        $form_fields['t5_id'] = array (
                'label'      => 'ID картинки',
                'input'      => 'html',
                'html'       => "<font size='5' color='red'><strong>$post->ID</strong></font>",
        );
        return $form_fields;
    }
}


?>