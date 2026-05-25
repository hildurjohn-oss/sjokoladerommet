<?php
/**
 * ACF Custom Blocks — registration and field definitions.
 * Requires ACF Pro (acf_register_block_type + acf_add_local_field_group).
 */

if ( ! function_exists( 'acf_register_block_type' ) ) {
	return;
}

// ─── Custom block category ────────────────────────────────────────────────────
add_filter( 'block_categories_all', function ( $categories ) {
	return array_merge(
		[ [ 'slug' => 'sjokoladerommet', 'title' => 'Sjokoladerommet', 'icon' => null ] ],
		$categories
	);
} );

// ─── Register ACF block types ─────────────────────────────────────────────────
add_action( 'acf/init', function () {
	$dir    = get_template_directory() . '/blocks/';
	$blocks = [
		[
			'name'        => 'hero-section',
			'title'       => 'Hero – Seksjon',
			'description' => 'Fullskjerm forside-hero (med stripet bakgrunn og bilde) eller enkel sidetittel for undersider.',
			'icon'        => 'align-center',
			'keywords'    => [ 'hero', 'header', 'overskrift', 'forside' ],
		],
		[
			'name'        => 'text-section',
			'title'       => 'Tekstseksjon',
			'description' => 'Enkel seksjon med etikett, overskrift, ingress og brødtekst. Valgfri bakgrunnsfarge.',
			'icon'        => 'editor-paragraph',
			'keywords'    => [ 'tekst', 'avsnitt', 'overskrift' ],
		],
		[
			'name'        => 'menu-list',
			'title'       => 'Menyliste',
			'description' => 'En menykategori (f.eks. Konfekt, Kaker, Drikke) med produktnavn, beskrivelse og pris.',
			'icon'        => 'list-view',
			'keywords'    => [ 'meny', 'produkt', 'pris', 'konfekt', 'kake' ],
		],
		[
			'name'        => 'timeline',
			'title'       => 'Tidslinje',
			'description' => 'Vertikal tidslinje med årstall, tittel og beskrivelse. For historiske milepæler.',
			'icon'        => 'chart-line',
			'keywords'    => [ 'tidslinje', 'historie', 'årstall', 'kronologi' ],
		],
		[
			'name'        => 'card-grid',
			'title'       => 'Kortgrid',
			'description' => 'Responsivt grid med bilde- eller blomstikon-kort. Brukes for produkter og kjerneverdier.',
			'icon'        => 'grid-view',
			'keywords'    => [ 'kort', 'grid', 'produkt', 'verdier', 'tre kolonner' ],
		],
		[
			'name'        => 'quote',
			'title'       => 'Sitat',
			'description' => 'Stort sentrert sitat med blomstikon og attributt. Passer som avslutning på en side.',
			'icon'        => 'format-quote',
			'keywords'    => [ 'sitat', 'quote', 'Janett', 'avslutning' ],
		],
		[
			'name'        => 'cta',
			'title'       => 'CTA – Mørk bakgrunn',
			'description' => 'Mørk brun CTA-seksjon med overskrift, tekst og handlingsknapp.',
			'icon'        => 'megaphone',
			'keywords'    => [ 'cta', 'knapp', 'kom innom', 'oppfordring' ],
		],
		[
			'name'        => 'two-column',
			'title'       => 'To kolonner – Bilde og tekst',
			'description' => 'Tokolonne-layout: bilde på én side, tekst (og valgfritt sitat/tjenester) på den andre.',
			'icon'        => 'columns',
			'keywords'    => [ 'to kolonner', 'bilde', 'tekst', 'historie', 'velvære' ],
		],
	];

	foreach ( $blocks as $b ) {
		acf_register_block_type( [
			'name'            => $b['name'],
			'title'           => $b['title'],
			'description'     => $b['description'],
			'render_template' => $dir . $b['name'] . '/render.php',
			'category'        => 'sjokoladerommet',
			'icon'            => $b['icon'],
			'keywords'        => $b['keywords'],
			'supports'        => [ 'anchor' => true, 'align' => false ],
		] );
	}
} );

// ─── ACF field groups ─────────────────────────────────────────────────────────
add_action( 'acf/init', function () {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	// ── Hero Section ──────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sjok_hero',
		'title'  => 'Hero – Innstillinger',
		'fields' => [
			[
				'key'           => 'field_sjok_hero_style',
				'name'          => 'style',
				'label'         => 'Layout-stil',
				'type'          => 'select',
				'choices'       => [
					'simple'    => 'Enkel (undersider: Meny, Om oss, Bestill kake)',
					'fullbleed' => 'Fullskjerm med bilde (forside)',
				],
				'default_value' => 'simple',
				'instructions'  => 'Velg "Fullskjerm" for forsiden, "Enkel" for alle undersider.',
			],
			[
				'key'          => 'field_sjok_hero_eyebrow',
				'name'         => 'eyebrow',
				'label'        => 'Etikett',
				'type'         => 'text',
				'placeholder'  => 'Sjokoladerommet · Made in Lofoten',
				'instructions' => 'Liten tekst over overskriften.',
			],
			[
				'key'         => 'field_sjok_hero_title',
				'name'        => 'title',
				'label'       => 'Overskrift',
				'type'        => 'text',
				'placeholder' => 'Sjokolade laget med hjerte, midt i Lofoten.',
				'required'    => 1,
			],
			[
				'key'         => 'field_sjok_hero_lead',
				'name'        => 'lead',
				'label'       => 'Ingress',
				'type'        => 'textarea',
				'rows'        => 3,
				'placeholder' => 'Et lite, fargerikt hus på Gravdal...',
			],
			[
				'key'               => 'field_sjok_hero_image',
				'name'              => 'image',
				'label'             => 'Bilde (4:5-format)',
				'type'              => 'image',
				'return_format'     => 'array',
				'preview_size'      => 'medium',
				'instructions'      => 'Portrettfoto vises til høyre. 4:5-format gir best resultat.',
				'conditional_logic' => [
					[ [ 'field' => 'field_sjok_hero_style', 'operator' => '==', 'value' => 'fullbleed' ] ],
				],
			],
			[
				'key'         => 'field_sjok_hero_chip1',
				'name'        => 'chip1',
				'label'       => 'Infomerke 1',
				'type'        => 'text',
				'placeholder' => '★ Torsdag–søndag 11–16',
				'instructions' => 'Teal-merke under ingress.',
			],
			[
				'key'         => 'field_sjok_hero_chip2',
				'name'        => 'chip2',
				'label'       => 'Infomerke 2',
				'type'        => 'text',
				'placeholder' => 'Gravdalsgata 15, Lofoten',
			],
			[
				'key'         => 'field_sjok_hero_btn1_label',
				'name'        => 'btn1_label',
				'label'       => 'Knapp 1 – tekst',
				'type'        => 'text',
				'placeholder' => 'Se menyen',
			],
			[
				'key'         => 'field_sjok_hero_btn1_url',
				'name'        => 'btn1_url',
				'label'       => 'Knapp 1 – URL',
				'type'        => 'url',
				'placeholder' => '/meny/',
			],
			[
				'key'         => 'field_sjok_hero_btn2_label',
				'name'        => 'btn2_label',
				'label'       => 'Knapp 2 – tekst (valgfri)',
				'type'        => 'text',
				'placeholder' => 'Bestill kake →',
			],
			[
				'key'         => 'field_sjok_hero_btn2_url',
				'name'        => 'btn2_url',
				'label'       => 'Knapp 2 – URL (valgfri)',
				'type'        => 'url',
				'placeholder' => '/bestill-kake/',
			],
		],
		'location' => [ [ [ 'param' => 'block', 'operator' => '==', 'value' => 'acf/hero-section' ] ] ],
	] );

	// ── Text Section ──────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sjok_text',
		'title'  => 'Tekstseksjon – Innstillinger',
		'fields' => [
			[
				'key'           => 'field_sjok_text_bg',
				'name'          => 'background',
				'label'         => 'Bakgrunnsfarge',
				'type'          => 'select',
				'choices'       => [
					'none'      => 'Ingen (standard krem)',
					'krem-deep' => 'Dyp krem',
					'fjord'     => 'Fjordblå',
				],
				'default_value' => 'none',
			],
			[
				'key'           => 'field_sjok_text_align',
				'name'          => 'align',
				'label'         => 'Tekstjustering',
				'type'          => 'select',
				'choices'       => [ 'left' => 'Venstre', 'center' => 'Sentrert' ],
				'default_value' => 'left',
			],
			[
				'key'   => 'field_sjok_text_eyebrow',
				'name'  => 'eyebrow',
				'label' => 'Etikett (liten tekst)',
				'type'  => 'text',
			],
			[
				'key'           => 'field_sjok_text_hlevel',
				'name'          => 'heading_level',
				'label'         => 'Overskriftsnivå',
				'type'          => 'select',
				'choices'       => [ 'h1' => 'H1 (sidetittel)', 'h2' => 'H2 (seksjonstittel)' ],
				'default_value' => 'h2',
			],
			[
				'key'      => 'field_sjok_text_title',
				'name'     => 'title',
				'label'    => 'Overskrift',
				'type'     => 'text',
				'required' => 1,
			],
			[
				'key'   => 'field_sjok_text_lead',
				'name'  => 'lead',
				'label' => 'Ingress',
				'type'  => 'textarea',
				'rows'  => 3,
			],
			[
				'key'   => 'field_sjok_text_body',
				'name'  => 'body',
				'label' => 'Brødtekst',
				'type'  => 'textarea',
				'rows'  => 5,
			],
		],
		'location' => [ [ [ 'param' => 'block', 'operator' => '==', 'value' => 'acf/text-section' ] ] ],
	] );

	// ── Menu List ─────────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sjok_menu',
		'title'  => 'Menyliste – Innstillinger',
		'fields' => [
			[
				'key'         => 'field_sjok_menu_title',
				'name'        => 'title',
				'label'       => 'Kategoritittel',
				'type'        => 'text',
				'required'    => 1,
				'placeholder' => 'Konfekt & sjokolade',
			],
			[
				'key'           => 'field_sjok_menu_accent',
				'name'          => 'accent',
				'label'         => 'Aksentfarge',
				'type'          => 'select',
				'choices'       => [
					'accent-deep' => 'Rose (standard)',
					'fjord-deep'  => 'Fjordblå',
				],
				'default_value' => 'accent-deep',
			],
			[
				'key'          => 'field_sjok_menu_items',
				'name'         => 'items',
				'label'        => 'Produkter',
				'type'         => 'repeater',
				'required'     => 1,
				'min'          => 1,
				'button_label' => 'Legg til produkt',
				'sub_fields'   => [
					[
						'key'          => 'field_sjok_menu_item_name',
						'name'         => 'name',
						'label'        => 'Navn',
						'type'         => 'text',
						'required'     => 1,
						'column_width' => 30,
					],
					[
						'key'          => 'field_sjok_menu_item_desc',
						'name'         => 'description',
						'label'        => 'Beskrivelse',
						'type'         => 'text',
						'column_width' => 40,
					],
					[
						'key'          => 'field_sjok_menu_item_price',
						'name'         => 'price',
						'label'        => 'Pris',
						'type'         => 'text',
						'placeholder'  => '32 kr/stk',
						'column_width' => 20,
					],
					[
						'key'          => 'field_sjok_menu_item_sig',
						'name'         => 'signature',
						'label'        => 'Signatur',
						'type'         => 'true_false',
						'ui'           => 1,
						'column_width' => 10,
					],
				],
			],
		],
		'location' => [ [ [ 'param' => 'block', 'operator' => '==', 'value' => 'acf/menu-list' ] ] ],
	] );

	// ── Timeline ──────────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sjok_timeline',
		'title'  => 'Tidslinje – Innstillinger',
		'fields' => [
			[
				'key'         => 'field_sjok_tl_eyebrow',
				'name'        => 'eyebrow',
				'label'       => 'Etikett',
				'type'        => 'text',
				'placeholder' => 'Veien hit',
			],
			[
				'key'         => 'field_sjok_tl_title',
				'name'        => 'title',
				'label'       => 'Overskrift',
				'type'        => 'text',
				'required'    => 1,
				'placeholder' => 'Fra kjøkkenbenk til Gravdalsgata.',
			],
			[
				'key'          => 'field_sjok_tl_items',
				'name'         => 'items',
				'label'        => 'Steg',
				'type'         => 'repeater',
				'required'     => 1,
				'min'          => 1,
				'button_label' => 'Legg til steg',
				'sub_fields'   => [
					[
						'key'          => 'field_sjok_tl_item_year',
						'name'         => 'year',
						'label'        => 'Årstall',
						'type'         => 'text',
						'required'     => 1,
						'placeholder'  => '2018',
						'column_width' => 15,
					],
					[
						'key'          => 'field_sjok_tl_item_title',
						'name'         => 'step_title',
						'label'        => 'Tittel',
						'type'         => 'text',
						'required'     => 1,
						'column_width' => 30,
					],
					[
						'key'          => 'field_sjok_tl_item_desc',
						'name'         => 'description',
						'label'        => 'Beskrivelse',
						'type'         => 'textarea',
						'rows'         => 3,
						'column_width' => 55,
					],
				],
			],
		],
		'location' => [ [ [ 'param' => 'block', 'operator' => '==', 'value' => 'acf/timeline' ] ] ],
	] );

	// ── Card Grid ─────────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sjok_cardgrid',
		'title'  => 'Kortgrid – Innstillinger',
		'fields' => [
			[
				'key'   => 'field_sjok_cg_eyebrow',
				'name'  => 'eyebrow',
				'label' => 'Etikett',
				'type'  => 'text',
			],
			[
				'key'      => 'field_sjok_cg_title',
				'name'     => 'title',
				'label'    => 'Overskrift',
				'type'     => 'text',
				'required' => 1,
			],
			[
				'key'           => 'field_sjok_cg_columns',
				'name'          => 'columns',
				'label'         => 'Antall kolonner',
				'type'          => 'select',
				'choices'       => [ '3' => '3 kolonner', '4' => '4 kolonner' ],
				'default_value' => '3',
			],
			[
				'key'           => 'field_sjok_cg_card_style',
				'name'          => 'card_style',
				'label'         => 'Kortstil',
				'type'          => 'select',
				'choices'       => [
					'image' => 'Med bilde (produktkort)',
					'icon'  => 'Med blomstikon (verdikort)',
				],
				'default_value' => 'image',
				'instructions'  => 'Velg "Med bilde" for produktkort, "Med blomstikon" for verdikort.',
			],
			[
				'key'          => 'field_sjok_cg_cards',
				'name'         => 'cards',
				'label'        => 'Kort',
				'type'         => 'repeater',
				'required'     => 1,
				'min'          => 1,
				'button_label' => 'Legg til kort',
				'sub_fields'   => [
					[
						'key'           => 'field_sjok_cg_card_image',
						'name'          => 'image',
						'label'         => 'Bilde',
						'type'          => 'image',
						'return_format' => 'array',
						'preview_size'  => 'thumbnail',
						'column_width'  => 20,
					],
					[
						'key'          => 'field_sjok_cg_card_ribbon',
						'name'         => 'ribbon',
						'label'        => 'Bånd (valgfri)',
						'type'         => 'text',
						'placeholder'  => 'Vår signatur',
						'column_width' => 20,
					],
					[
						'key'          => 'field_sjok_cg_card_title',
						'name'         => 'card_title',
						'label'        => 'Tittel',
						'type'         => 'text',
						'required'     => 1,
						'column_width' => 30,
					],
					[
						'key'          => 'field_sjok_cg_card_desc',
						'name'         => 'description',
						'label'        => 'Beskrivelse',
						'type'         => 'textarea',
						'rows'         => 2,
						'column_width' => 30,
					],
				],
			],
		],
		'location' => [ [ [ 'param' => 'block', 'operator' => '==', 'value' => 'acf/card-grid' ] ] ],
	] );

	// ── Quote ─────────────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sjok_quote',
		'title'  => 'Sitat – Innstillinger',
		'fields' => [
			[
				'key'         => 'field_sjok_quote_text',
				'name'        => 'quote_text',
				'label'       => 'Sitatekst',
				'type'        => 'textarea',
				'rows'        => 4,
				'required'    => 1,
				'placeholder' => '"Jeg drømte ikke om en kjede eller noe stort..."',
				'instructions' => 'Sitatene rendres i kursiv Playfair Display. Ikke ta med anførselstegn — de legges til automatisk.',
			],
			[
				'key'         => 'field_sjok_quote_author',
				'name'        => 'attribution',
				'label'       => 'Hvem sa det',
				'type'        => 'text',
				'placeholder' => '— Janett',
			],
			[
				'key'           => 'field_sjok_quote_flower',
				'name'          => 'show_flower',
				'label'         => 'Vis blomstikon',
				'type'          => 'true_false',
				'ui'            => 1,
				'default_value' => 1,
			],
		],
		'location' => [ [ [ 'param' => 'block', 'operator' => '==', 'value' => 'acf/quote' ] ] ],
	] );

	// ── CTA ───────────────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sjok_cta',
		'title'  => 'CTA – Innstillinger',
		'fields' => [
			[
				'key'         => 'field_sjok_cta_title',
				'name'        => 'title',
				'label'       => 'Overskrift',
				'type'        => 'text',
				'required'    => 1,
				'placeholder' => 'Kom innom på torsdag.',
			],
			[
				'key'         => 'field_sjok_cta_body',
				'name'        => 'body',
				'label'       => 'Tekst',
				'type'        => 'textarea',
				'rows'        => 3,
				'placeholder' => 'Vi gleder oss alltid til å se deg...',
			],
			[
				'key'         => 'field_sjok_cta_btn_label',
				'name'        => 'btn_label',
				'label'       => 'Knapp – tekst',
				'type'        => 'text',
				'placeholder' => 'Få veibeskrivelse →',
			],
			[
				'key'         => 'field_sjok_cta_btn_url',
				'name'        => 'btn_url',
				'label'       => 'Knapp – URL',
				'type'        => 'url',
			],
			[
				'key'         => 'field_sjok_cta_address',
				'name'        => 'address',
				'label'       => 'Adresse (vises ved siden av knappen)',
				'type'        => 'text',
				'placeholder' => 'Gravdalsgata 15 · 8372 Gravdal',
			],
		],
		'location' => [ [ [ 'param' => 'block', 'operator' => '==', 'value' => 'acf/cta' ] ] ],
	] );

	// ── Two Column ────────────────────────────────────────────────────────────
	acf_add_local_field_group( [
		'key'    => 'group_sjok_twocol',
		'title'  => 'To kolonner – Innstillinger',
		'fields' => [
			[
				'key'           => 'field_sjok_tc_bg',
				'name'          => 'background',
				'label'         => 'Bakgrunnsfarge',
				'type'          => 'select',
				'choices'       => [
					'none'      => 'Ingen (standard krem)',
					'krem-deep' => 'Dyp krem',
					'fjord'     => 'Fjordblå',
				],
				'default_value' => 'none',
			],
			[
				'key'           => 'field_sjok_tc_imgpos',
				'name'          => 'image_position',
				'label'         => 'Bildeposisjon',
				'type'          => 'select',
				'choices'       => [ 'left' => 'Bilde til venstre', 'right' => 'Bilde til høyre' ],
				'default_value' => 'right',
			],
			[
				'key'           => 'field_sjok_tc_image',
				'name'          => 'image',
				'label'         => 'Bilde',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'required'      => 1,
			],
			[
				'key'           => 'field_sjok_tc_aspect',
				'name'          => 'image_aspect',
				'label'         => 'Bildeformat',
				'type'          => 'select',
				'choices'       => [
					'3/4' => 'Portrett (3:4)',
					'4/5' => 'Høy portrett (4:5)',
					'1/1' => 'Kvadrat (1:1)',
					'4/3' => 'Landskap (4:3)',
				],
				'default_value' => '3/4',
			],
			[
				'key'   => 'field_sjok_tc_eyebrow',
				'name'  => 'eyebrow',
				'label' => 'Etikett',
				'type'  => 'text',
			],
			[
				'key'      => 'field_sjok_tc_title',
				'name'     => 'title',
				'label'    => 'Overskrift',
				'type'     => 'text',
				'required' => 1,
			],
			[
				'key'   => 'field_sjok_tc_lead',
				'name'  => 'lead',
				'label' => 'Ingress',
				'type'  => 'textarea',
				'rows'  => 3,
			],
			[
				'key'   => 'field_sjok_tc_body',
				'name'  => 'body',
				'label' => 'Brødtekst (valgfri)',
				'type'  => 'textarea',
				'rows'  => 4,
			],
			[
				'key'          => 'field_sjok_tc_quote',
				'name'         => 'quote_text',
				'label'        => 'Sitat (valgfri)',
				'type'         => 'textarea',
				'rows'         => 3,
				'instructions' => 'Vises som stilisert sitatblokk under teksten.',
			],
			[
				'key'         => 'field_sjok_tc_quote_author',
				'name'        => 'quote_author',
				'label'       => 'Sitatattributt',
				'type'        => 'text',
				'placeholder' => '— Janett Haug Larsen, grunnlegger',
			],
			[
				'key'           => 'field_sjok_tc_mode',
				'name'          => 'text_mode',
				'label'         => 'Tekstside-innhold',
				'type'          => 'select',
				'choices'       => [
					'text'     => 'Tekst og knapp',
					'services' => 'Tjenesteliste (Velværeavdelingen)',
				],
				'default_value' => 'text',
				'instructions'  => 'Velg "Tjenesteliste" for Velværeavdelingen-seksjonen.',
			],
			[
				'key'          => 'field_sjok_tc_btn_label',
				'name'         => 'btn_label',
				'label'        => 'Knapp – tekst (valgfri)',
				'type'         => 'text',
				'conditional_logic' => [
					[ [ 'field' => 'field_sjok_tc_mode', 'operator' => '==', 'value' => 'text' ] ],
				],
			],
			[
				'key'          => 'field_sjok_tc_btn_url',
				'name'         => 'btn_url',
				'label'        => 'Knapp – URL',
				'type'         => 'url',
				'conditional_logic' => [
					[ [ 'field' => 'field_sjok_tc_mode', 'operator' => '==', 'value' => 'text' ] ],
				],
			],
			[
				'key'          => 'field_sjok_tc_services',
				'name'         => 'services',
				'label'        => 'Tjenester',
				'type'         => 'repeater',
				'button_label' => 'Legg til behandling',
				'instructions' => 'Navn og varighet/pris for hver behandling.',
				'conditional_logic' => [
					[ [ 'field' => 'field_sjok_tc_mode', 'operator' => '==', 'value' => 'services' ] ],
				],
				'sub_fields' => [
					[
						'key'          => 'field_sjok_tc_svc_name',
						'name'         => 'service_name',
						'label'        => 'Navn',
						'type'         => 'text',
						'required'     => 1,
						'column_width' => 50,
					],
					[
						'key'          => 'field_sjok_tc_svc_meta',
						'name'         => 'service_meta',
						'label'        => 'Varighet / pris',
						'type'         => 'text',
						'placeholder'  => '60 min · fra 890 kr',
						'column_width' => 50,
					],
				],
			],
			[
				'key'          => 'field_sjok_tc_contact_btn_label',
				'name'         => 'contact_btn_label',
				'label'        => 'Kontaktknapp – tekst',
				'type'         => 'text',
				'placeholder'  => 'Bestill time',
				'conditional_logic' => [
					[ [ 'field' => 'field_sjok_tc_mode', 'operator' => '==', 'value' => 'services' ] ],
				],
			],
			[
				'key'          => 'field_sjok_tc_contact_btn_url',
				'name'         => 'contact_btn_url',
				'label'        => 'Kontaktknapp – URL (mailto: eller tel:)',
				'type'         => 'text',
				'placeholder'  => 'mailto:hei@sjokoladerommet.no',
				'conditional_logic' => [
					[ [ 'field' => 'field_sjok_tc_mode', 'operator' => '==', 'value' => 'services' ] ],
				],
			],
			[
				'key'          => 'field_sjok_tc_contact_extra',
				'name'         => 'contact_extra',
				'label'        => 'Ekstra kontaktinfo',
				'type'         => 'text',
				'placeholder'  => 'eller ring 76 08 23 14',
				'conditional_logic' => [
					[ [ 'field' => 'field_sjok_tc_mode', 'operator' => '==', 'value' => 'services' ] ],
				],
			],
		],
		'location' => [ [ [ 'param' => 'block', 'operator' => '==', 'value' => 'acf/two-column' ] ] ],
	] );
} );
