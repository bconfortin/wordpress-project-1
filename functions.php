<?php
	add_theme_support('post-thumbnails');

	function register_post_type_obra() {
		$nameSingular = 'Obra';
		$namePlural = 'Obras';
		$description = 'Cadastro de obras da Plano';

		$labels = array(
		    'name' => $namePlural,
		    'singular_name' => $nameSingular,
		    'add_new_item' => 'Adicionar novo ' . strtolower($nameSingular),
		    'edit_item' => 'Editar ' . strtolower($nameSingular)
		);

		$supports = array(
	        'title',
	        'editor',
	        'thumbnail'
		);

		$args = array(
		    'labels' => $labels,
		    'public' => true,
		    'description' => $description,
        	'menu_icon' => 'dashicons-admin-home',
		    'supports' => $supports
		);

		register_post_type('obra', $args);
	}

	add_action('init', 'register_post_type_obra');

	function registrar_menu_navegacao() {
		register_nav_menu('header-menu', 'main-menu');
	}

	add_action('init', 'registrar_menu_navegacao');

	function generateTitle() {
		if (!is_home()) {
			the_title();
			echo ' - ';
		};
		bloginfo('name');
	}

	function custom_excerpt_length( $length ) {
		return 15;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	function new_widgets_init() {
		register_sidebar(
			array(
				'name'          => 'Widgets da direita',
				'id'            => 'widgets_direita',
				'before_widget' => '<div class="padding-15 mbottom-30 bg-fff">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="text-center margin-0 pbottom-15 mbottom-15 bbottom-1-secundario font-1-1em text-uppercase">',
				'after_title'   => '</h3>',
			)
		);
	}
	add_action( 'widgets_init', 'new_widgets_init' );

	function register_taxonomy_tipos_de_obras() {
		$singular = 'Tipo de obra';
		$plural = 'Tipos de obras';

		$labels = array(
			'name' => $plural,
			'singular_name' => $singular,
			'view_item' => 'Ver ' . strtolower($singular),
			'edit_item' => 'Editar ' . strtolower($singular),
			'new_item' => 'Novo ' . strtolower($singular),
			'add_new_item' => 'Adicionar novo ' . strtolower($singular)
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'hierarchical' => true
		);
		// register_taxonomy(nome, qual_custom_tipe, argumentos);
		register_taxonomy('tipo_de_obra', 'obra', $args);
	}

	add_action( 'init' , 'register_taxonomy_tipos_de_obras' );

	function register_taxonomy_localizacao() {
		$singular = 'Estado e cidade';
		$plural = 'Estados e cidades';

		$labels = array(
			'name' => $plural,
			'singular_name' => $singular,
			'view_item' => 'Ver ' . strtolower($singular),
			'edit_item' => 'Editar ' . strtolower($singular),
			'new_item' => 'Nova ' . strtolower($singular),
			'add_new_item' => 'Adicionar nova ' . strtolower($singular)
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'hierarchical' => true
		);
		// register_taxonomy(nome, qual_custom_tipe, argumentos);
		register_taxonomy('localizacao', 'obra', $args);
	}

	add_action( 'init' , 'register_taxonomy_localizacao' );

	function is_selected_taxonomy($taxonomy, $search) {
		if($taxonomy->slug === $search) {
			echo 'selected';
		}
	}

	function adicionar_meta_info_obra() {
		add_meta_box(
			'informacoes_obra',
			'Informações',
			'informacoes_obra_view',
			'obra',
			'normal',
			'high'
		);
	}

	add_action('add_meta_boxes', 'adicionar_meta_info_obra');

	function informacoes_obra_view( $post ) {
		$obras_meta_data = get_post_meta( $post->ID ); ?>

		<style>
			.metabox-form {
				margin-top: 15px;
			}

			.metabox-form .form-group {
				display: inline-block;
				width: 49.7%;
				margin-bottom: 15px;
			}

			.metabox-form .form-group label {
				display: block;
				font-weight: 700;
				margin-bottom: 5px;
			}

			.metabox-form .form-group input {
				display: block;
				width: 100%;
			}
		</style>

		<div class="metabox-form">
			<div class="form-group">
				<label for="obra_prazo">Prazo estipulado:</label>
				<input type="text" name="obra_prazo" class="form-control" placeholder="" value="<?= $obras_meta_data['obra_prazo'][0]; ?>">
			</div>
			<div class="form-group">
				<label for="obra_conclusao">Tempo de conclusão:</label>
				<input type="text" name="obra_conclusao" class="form-control" placeholder="" value="<?= $obras_meta_data['obra_conclusao'][0]; ?>">
			</div>
			<!-- <div class="form-group">
				<label for="obra_img_desktop">Imagem 1920x450:</label>
				<input type="file" name="obra_img_desktop" class="form-control" accept="image/*" value="<?= $obras_meta_data['obra_img_desktop'][0]; ?>">
			</div>
			<div class="form-group">
				<label for="obra_img_mobile">Imagem 993x600:</label>
				<input type="file" name="obra_img_mobile" class="form-control" accept="image/*" value="<?= $obras_meta_data['obra_img_mobile'][0]; ?>">
			</div> -->
		</div>

	<?php }

	function salvar_meta_info_obras( $post_id ) {
		if( isset($_POST['obra_prazo']) ) {
			update_post_meta( $post_id, 'obra_prazo', sanitize_text_field( $_POST['obra_prazo'] ) );
		}
		if( isset($_POST['obra_conclusao']) ) {
			update_post_meta( $post_id, 'obra_conclusao', sanitize_text_field( $_POST['obra_conclusao'] ) );
		}
		// if( isset($_POST['obra_img_desktop']) ) {
		// 	update_post_meta( $post_id, 'obra_img_desktop', $_POST['obra_img_desktop'] );
		// }
		// if( isset($_POST['obra_img_mobile']) ) {
		// 	update_post_meta( $post_id, 'obra_img_mobile', $_POST['obra_img_mobile'] );
		// }
	}

	add_action('save_post', 'salvar_meta_info_obras');














	add_action( 'add_meta_boxes', 'listing_image_add_metabox' );
	function listing_image_add_metabox () {
		add_meta_box( 'listingimagediv', __( 'Imagem mobile (993x600)', 'text-domain' ), 'listing_image_metabox', 'obra', 'side', 'low');
	}
	function listing_image_metabox ( $post ) {
		global $content_width, $_wp_additional_image_sizes;
		$image_id = get_post_meta( $post->ID, '_listing_image_id', true );
		$old_content_width = $content_width;
		$content_width = 254;
		if ( $image_id && get_post( $image_id ) ) {
			if ( ! isset( $_wp_additional_image_sizes['post-thumbnail'] ) ) {
				$thumbnail_html = wp_get_attachment_image( $image_id, array( $content_width, $content_width ) );
			} else {
				$thumbnail_html = wp_get_attachment_image( $image_id, 'post-thumbnail' );
			}
			if ( ! empty( $thumbnail_html ) ) {
				$content = $thumbnail_html;
				$content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_image_button" >' . esc_html__( 'Remover imagem', 'text-domain' ) . '</a></p>';
				$content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="' . esc_attr( $image_id ) . '" />';
			}
			$content_width = $old_content_width;
		} else {
			$content = '<img src="" style="width:' . esc_attr( $content_width ) . 'px;height:auto;border:0;display:none;" />';
			$content .= '<p class="hide-if-no-js"><a title="' . esc_attr__( 'Defina uma imagem', 'text-domain' ) . '" href="javascript:;" id="upload_listing_image_button" id="set-listing-image" data-uploader_title="' . esc_attr__( 'Defina uma imagem', 'text-domain' ) . '" data-uploader_button_text="' . esc_attr__( 'Defina uma imagem', 'text-domain' ) . '">' . esc_html__( 'Defina uma imagem', 'text-domain' ) . '</a></p>';
			$content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="" />';
		}
		echo $content;
	}
	add_action( 'save_post', 'listing_image_save', 10, 1 );
	function listing_image_save ( $post_id ) {
		if( isset( $_POST['_listing_cover_image'] ) ) {
			$image_id = (int) $_POST['_listing_cover_image'];
			update_post_meta( $post_id, '_listing_image_id', $image_id );
		}
	}

	function add_admin_scripts( $hook ) {
		global $post;
		wp_enqueue_script( 'myscript', get_stylesheet_directory_uri().'/js/scripts.js' );
	}
	add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );


	function replace_featured_image_box() {
	    remove_meta_box( 'postimagediv', 'obra', 'side' );
	    add_meta_box('postimagediv', __('Imagem desktop (1920x450)'), 'post_thumbnail_meta_box', 'obra', 'side', 'low');
	}
	add_action('do_meta_boxes', 'replace_featured_image_box');
?>
