<?php
	add_theme_support('post-thumbnails');

	function cadastrar_post_type_obra() {
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
		flush_rewrite_rules();
	}

	add_action('init', 'cadastrar_post_type_obra');

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
		return 30;
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








	function adicionar_meta_info_imovel() {
		add_meta_box(
			'informacoes_imovel',
			'Informações',
			'informacoes_imovel_view',
			'imovel',
			'normal',
			'high'
		);
	}

	add_action('add_meta_boxes', 'adicionar_meta_info_imovel');

	function informacoes_imovel_view( $post ) {
		$imoveis_meta_data = get_post_meta( $post->ID ); ?>

		<style>
			.maluras-metabox {
				display: flex;
				justify-content: space-between;
			}

			.maluras-metabox-item {
				flex-basis: 30%;

			}

			.maluras-metabox-item label {
				font-weight: 700;
				display: block;
				margin: .5rem 0;

			}

			.input-addon-wrapper {
				height: 30px;
				display: flex;
				align-items: center;
			}

			.input-addon {
				display: block;
				border: 1px solid #CCC;
				border-bottom-left-radius: 5px;
				border-top-left-radius: 5px;
				height: 100%;
				width: 30px;
				text-align: center;
				line-height: 30px;
				box-sizing: border-box;
				background-color: #888;
				color: #FFF;
			}

			.maluras-metabox-input {
				height: 100%;
				border: 1px solid #CCC;
				border-left: none;
				margin: 0;
			}

		</style>
		<div class="maluras-metabox">
			<div class="maluras-metabox-item">
				<label for="maluras-preco-input">Preço:</label>
				<div class="input-addon-wrapper">
					<span class="input-addon">R$</span>
					<input id="maluras-preco-input" class="maluras-metabox-input" type="text" name="preco_id"
					value="<?= number_format($imoveis_meta_data['preco_id'][0], 2, ',', '.'); ?>">
				</div>
			</div>

			<div class="maluras-metabox-item">
				<label for="maluras-vagas-input">Vagas:</label>
				<input id="maluras-vagas-input" class="maluras-metabox-input" type="number" name="vagas_id"
				value="<?= $imoveis_meta_data['vagas_id'][0]; ?>">
			</div>

			<div class="maluras-metabox-item">
				<label for="maluras-banheiros-input">Banheiros:</label>
				<input id="maluras-banheiros-input" class="maluras-metabox-input" type="number" name="banheiros_id"
				value="<?= $imoveis_meta_data['banheiros_id'][0]; ?>">
			</div>

			<div class="maluras-metabox-item">
				<label for="maluras-quartos-input">Quartos:</label>
				<input id="maluras-quartos-input" class="maluras-metabox-input" type="number" name="quartos_id"
				value="<?= $imoveis_meta_data['quartos_id'][0]; ?>">
			</div>

		</div>
	<?php

	}

	function salvar_meta_info_imoveis( $post_id ) {
		if( isset($_POST['preco_id']) ) {
			update_post_meta( $post_id, 'preco_id', sanitize_text_field( $_POST['preco_id'] ) );
		}
		if( isset($_POST['vagas_id']) ) {
			update_post_meta( $post_id, 'vagas_id', sanitize_text_field( $_POST['vagas_id'] ) );
		}
		if( isset($_POST['banheiros_id']) ) {
			update_post_meta( $post_id, 'banheiros_id', sanitize_text_field( $_POST['banheiros_id'] ) );
		}
		if( isset($_POST['quartos_id']) ) {
			update_post_meta( $post_id, 'quartos_id', sanitize_text_field( $_POST['quartos_id'] ) );
		}
	}

	add_action('save_post', 'salvar_meta_info_imoveis');
?>
