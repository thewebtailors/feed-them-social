<?php
/**
 * Facebook Additional Options Class
 *
 * This class has the options for building and saving on the Custom Meta Boxes
 *
 * @class    Feed_CPT_Options
 * @version  1.0.0
 * @package  FeedThemSocial/Admin
 * @category Class
 * @author   SlickRemix
 */

namespace feedthemsocial;

// Exit if accessed directly!
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Facebook_Add_Options
 */
class Facebook_Additional_Options {

	/**
	 * All Gallery Options
	 *
	 * @var array
	 */
	public $all_options;

	/**
	 * Facebook_Add_Options constructor.
	 */
	public function __construct() {
		$this->reviews_text_styles();
		$this->reviews_overall_rating_styles();
		$this->language_options();
		$this->like_button_box_options();
		$this->global_facebook_style_options();
        $this->global_facebook_grid_style_options();
		$this->error_messages_options();
        $this->load_more_options();
	}

	/**
	 * All Facebook Additional Options
	 *
	 * Function to return all Gallery options
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_all_options() {
		return $this->all_options;
	}

	/**
	 * Reviews: Style and Text Options
	 *
	 * Options for the Reviews: Style and Text Options.
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function reviews_text_styles() {
		$this->all_options['facebook_reviews_text_styles'] = array(
			'section_attr_key'   => 'facebook_reviews_text_styles_',
            'section_title'      => esc_html__( 'Reviews: Style and Text Options', 'feed_them_social' ),
			// 'section_wrap_id' => 'fts-tab-content1',
			'section_wrap_class' => 'fts-tab-content fts-fb-reviews-styles',
			// Form Info.
			'form_wrap_classes'  => 'fb-page-shortcode-form',
			'form_wrap_id'       => 'fts-fb-page-form',
			'main_options'       => array(

				// Stars Background Color
				array(
					'input_wrap_class' => 'fb-reviews-title-color-label ',
					'option_type'      => 'input',
					'label'            =>
						sprintf(
							esc_html__( 'Stars Background Color%1$sApplies to Overall Rating too.%2$s', 'feed-them-social' ),
							'<br/><small>',
							'</small>'
						),
					'type'             => 'text',
					'id'               => 'fb-reviews-backg-color',
					'name'             => 'fb_reviews_backg_color',
					'placeholder'      => '#4791ff',
					'default_value'    => '',
				),
				// Stars & Text Background Color
				array(
					'input_wrap_class' => 'fb-reviews-text-color',
					'option_type'      => 'input',
					'label'            =>
						sprintf(
							esc_html__( 'Stars & Text Color%1$sApplies to Overall Rating too.%2$s', 'feed-them-social' ),
							'<br/><small>',
							'</small>'
						),
					'type'             => 'text',
					'id'               => 'fb-reviews-text-color',
					'name'             => 'fb-reviews-text-color',
					'placeholder'      => '#fff',
					'default_value'    => '',
				),
				// Text for word Star.
				array(
					'input_wrap_class' => 'fb_reviews_star_language',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Text for the word "star"', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_reviews_star_language',
					'name'             => 'fb_reviews_star_language',
					'placeholder'      => 'star',
					'default_value'    => '',
				),
				// Text for word Recommended.
				array(
					'input_wrap_class' => 'fb_reviews_recommended_language',
					'option_type'      => 'input',
					'label'            => esc_html__( '"Recommended" text', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_reviews_recommended_language',
					'name'             => 'fb_reviews_recommended_language',
					'placeholder'      => 'Recommended',
					'default_value'    => '',
				),
                // Text for word Recommended.
                array(
                    'input_wrap_class' => 'fb_reviews_see_more_reviews_language',
                    'option_type'      => 'input',
                    'label'            => esc_html__( '"See More Reviews" text', 'feed_them_social' ),
                    'type'             => 'text',
                    'id'               => 'fb_reviews_see_more_reviews_language',
                    'name'             => 'fb_reviews_see_more_reviews_language',
                    'placeholder'      => 'See More Reviews',
                    'default_value'    => '',
                ),
				// Remove See More Reviews.
				array(
					'input_wrap_class' => 'fb_reviews_remove_see_reviews_link',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Remove "See More Reviews"', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_reviews_remove_see_reviews_link',
					'name'             => 'fb_reviews_remove_see_reviews_link',
					'default_value'    => 'yes',
					'options'          => array(
						array(
							'label' => esc_html__( 'Yes', 'feed_them_social' ),
							'value' => 'yes',
						),
						array(
							'label' => esc_html__( 'No', 'feed_them_social' ),
							'value' => 'no',
						),
					),
				),

			),
		);

		return $this->all_options['facebook_reviews_text_styles'];
	} //END Reviews: Style and Text Options.

	/**
	 * Reviews: Overall Rating Style Options
	 *
	 * Options for the Reviews: Overall Rating Style Options.
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function reviews_overall_rating_styles() {
		$this->all_options['facebook_reviews_overall_rating_styles'] = array(
			'section_attr_key'   => 'facebook_reviews_overall_rating_styles_',
			'section_title'      => esc_html__( 'Reviews: Overall Rating Style Options', 'feed_them_social' ),
			// 'section_wrap_id' => 'fts-tab-content1',
			'section_wrap_class' => 'fts-tab-content  fts-fb-reviews-styles',
			// Form Info.
			'form_wrap_classes'  => 'fb-page-shortcode-form',
			'form_wrap_id'       => 'fts-fb-page-form',
			//Options Wrap Class
			'options_wrap_class'       => 'fts-cpt-additional-options',

			// Token Check // We'll use these option for premium messages in the future.
			'premium_msg_boxes'  => array(
				'album_videos' => array(
					'req_plugin' => 'fts_premium',
					'msg'        => '',
				),
				'reviews'      => array(
					'req_plugin' => 'facebook_reviews',
					'msg'        => '',
				),
			),

			'main_options'       => array(

				// Hide Overall Rating Background & Border.
				array(
					'input_wrap_class' => 'fb_reviews_overall_rating_background_border_hide',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Hide Background & Border', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_reviews_overall_rating_background_border_hide',
					'name'             => 'fb_reviews_overall_rating_background_border_hide',
					'default_value'    => 'yes',
					'options'          => array(
						array(
							'label' => esc_html__( 'Yes', 'feed_them_social' ),
							'value' => 'yes',
						),
						array(
							'label' => esc_html__( 'No', 'feed_them_social' ),
							'value' => 'no',
						),
					),
				),

				// Overall Rating Background Color.
				array(
					'input_wrap_class' => 'fb-reviews-title-color-label ',
					'option_type'      => 'input',
					'label'            =>
						sprintf(
							esc_html__( 'Background Color', 'feed-them-social' ),
							'<br/><small>',
							'</small>'
						),
					'type'             => 'text',
					'id'               => 'fb_reviews_overall_rating_background_color',
					'name'             => 'fb_reviews_overall_rating_background_color',
					'placeholder'      => '#fff',
					'default_value'    => '',
				),


				// Overall Rating Text Color.
				array(
					'input_wrap_class' => 'fb-reviews-text-color',
					'option_type'      => 'input',
					'label'            =>
						sprintf(
							esc_html__( 'Text Color', 'feed-them-social' ),
							'<br/><small>',
							'</small>'
						),
					'type'             => 'text',
					'id'               => 'fb_reviews_overall_rating_text_color',
					'name'             => 'fb_reviews_overall_rating_text_color',
					'placeholder'      => '#fff',
					'default_value'    => '',
				),

				// Overall Rating Border Color.
				array(
					'input_wrap_class' => 'fb-reviews-text-color',
					'option_type'      => 'input',
					'label'            =>
						sprintf(
							esc_html__( 'Border Color', 'feed-them-social' ),
							'<br/><small>',
							'</small>'
						),
					'type'             => 'text',
					'id'               => 'fb_reviews_overall_rating_border_color',
					'name'             => 'fb_reviews_overall_rating_border_color',
					'placeholder'      => '#ddd',
					'default_value'    => '',
				),

				// Overall Rating Background Padding.
				array(
					'input_wrap_class' => 'fb_reviews_overall_rating_background_padding',
					'option_type'      => 'input',
					'label'            =>
						sprintf(
							esc_html__( 'Background Padding', 'feed-them-social' ),
							'<br/><small>',
							'</small>'
						),
					'type'             => 'text',
					'id'               => 'fb_reviews_overall_rating_background_padding',
					'name'             => 'fb_reviews_overall_rating_background_padding',
					'placeholder'      => '10px 10px 15px 10px',
					'default_value'    => '',
				),

                // Overall Rating Background Padding.
                array(
                    'input_wrap_class' => 'fb_reviews_overall_rating_of_5_stars_text',
                    'option_type'      => 'input',
                    'label'            =>
                        sprintf(
                            esc_html__( '"of 5 stars" text', 'feed-them-social' ),
                            '<br/><small>',
                            '</small>'
                        ),
                    'type'             => 'text',
                    'id'               => 'fb_reviews_overall_rating_of_5_stars_text',
                    'name'             => 'fb_reviews_overall_rating_of_5_stars_text',
                    'placeholder'      => 'of 5 stars',
                    'default_value'    => '',
                ),

                // Overall Rating Background Padding.
                array(
                    'input_wrap_class' => 'fb_reviews_overall_rating_reviews_text',
                    'option_type'      => 'input',
                    'label'            =>
                        sprintf(
                            esc_html__( '"reviews" text', 'feed-them-social' ),
                            '<br/><small>',
                            '</small>'
                        ),
                    'type'             => 'text',
                    'id'               => 'fb_reviews_overall_rating_reviews_text',
                    'name'             => 'fb_reviews_overall_rating_reviews_text',
                    'placeholder'      => 'Reviews',
                    'default_value'    => '',
                ),
			),
		);

		return $this->all_options['facebook_reviews_overall_rating_styles'];
	} //END Reviews: Overall Rating Style Options


	/**
	 * Language Options
	 *
	 * Language Options
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function language_options() {
		$this->all_options['facebook_languages_options'] = array(
			'section_attr_key'   => 'facebook_languages_options_',
			'section_title'      => esc_html__( 'Language Options', 'feed_them_social' ),

			// 'section_wrap_id' => 'fts-tab-content1',
			'section_wrap_class' => 'fts-tab-content  fts-fb-language-options',
			// Form Info.
			'form_wrap_classes'  => 'fb-page-shortcode-form',
			'form_wrap_id'       => 'fts-fb-page-form',
			//Options Wrap Class
			'options_wrap_class'       => 'fts-cpt-additional-options',

			// Token Check // We'll use these option for premium messages in the future.
			'premium_msg_boxes'  => array(
				'album_videos' => array(
					'req_plugin' => 'fts_premium',
					'msg'        => '',
				),
				'reviews'      => array(
					'req_plugin' => 'facebook_reviews',
					'msg'        => '',
				),
			),

			'main_options'       => array(

				// Language For Facebook Feeds.
				array(
					'input_wrap_class' => 'fb_language',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Facebook Language', 'feed_them_social' ),
                    'instructional-text' => sprintf(
                        esc_html__( 'You must have your Facebook Access Token saved above before this feature will work. This option will translate the FB Titles and Like Button or Box Text. It will not translate your actual post. To translate the Feed Them Social parts of this plugin just set your language on the %1$sWordPress settings%2$s page. If would like to help translate please %3$sClick Here.%4$s', 'feed-them-social' ),
                        '<a href="' . esc_url( 'options-general.php' ) . '" target="_blank">',
                        '</a>',
                        '<a href="' . esc_url( 'http://translate.slickremix.com/glotpress/projects/feed-them-social/' ) . '" target="_blank">',
                        '</a>'
                    ),
					'type'             => 'text',
					'id'               => 'fb-lang-btn',
					'name'             => 'fb_language',
					'default_value'    => 'yes',
					'options'          => array(
						array(
							'label' => esc_html__( 'Yes', 'feed_them_social' ),
							'value' => 'yes',
						),
						array(
							'label' => esc_html__( 'No', 'feed_them_social' ),
							'value' => 'no',
						),
					),
				),
				// Hide Notice on Front End for Facebook Feed.
				array(
					'input_wrap_class' => 'fb_hide_no_posts_message',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Hide Notice on Front End', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_hide_no_posts_message',
					'name'             => 'fb_hide_no_posts_message',
					'default_value'    => 'yes',
					'options'          => array(
						array(
							'label' => esc_html__( 'Yes', 'feed_them_social' ),
							'value' => 'yes',
						),
						array(
							'label' => esc_html__( 'No', 'feed_them_social' ),
							'value' => 'no',
						),
					),
				),

				// View on Facebook Text.
				array(
					'input_wrap_class' => 'fb_view_on_fb_fts',
					'option_type'      => 'input',
					'label'            => esc_html__( 'View on Facebook text', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'facebook_view_on_facebook',
					'name'             => 'facebook_view_on_facebook',
					'placeholder'      => 'View on Facebook',
					'default_value'    => esc_html__( 'View on Facebook text', 'feed_them_social' ),
				),
			),
		);

		return $this->all_options['facebook_languages_options'];
	} //END Language Options.

	/**
	 * Like Button or Box Options
	 *
	 * Like Button or Box Options.
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function like_button_box_options() {
		$this->all_options['facebook_like_button_box_options'] = array(
			'section_attr_key'   => 'facebook_like_button_box_options_',
			'section_title'      => esc_html__( 'Like Button or Box', 'feed_them_social' ),
			// 'section_wrap_id' => 'fts-tab-content1',
			'section_wrap_class' => 'fts-tab-content',
			// Form Info.
			'form_wrap_classes'  => 'fb-page-shortcode-form',
			'form_wrap_id'       => 'fts-fb-page-form',
			//Options Wrap Class
			'options_wrap_class'       => 'fts-cpt-additional-options',

			// Token Check // We'll use these option for premium messages in the future.
			'premium_msg_boxes'  => array(
				'album_videos' => array(
					'req_plugin' => 'fts_premium',
					'msg'        => '',
				),
				'reviews'      => array(
					'req_plugin' => 'facebook_reviews',
					'msg'        => '',
				),
			),

			'main_options'       => array(

				// Show Follow Button.
				array(
					'input_wrap_class' => 'fb_language',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Show Follow Button', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb-lang-btn',
					'name'             => 'fb_language',
					'default_value'    => 'dont-display',
					'options'          => array(
						array(
							'optgroup' => array(
								'label' => '',

							),
							'label' => esc_html__( 'Don\'t Display a Button', 'feed_them_social' ),
							'value' => 'dont-display',
						),
						array(
							'label' => esc_html__( 'Like Box', 'feed_them_social' ),
							'value' => 'like-box',
						),
						array(
							'label' => esc_html__( 'Like Box with Faces', 'feed_them_social' ),
							'value' => 'like-box-faces',
						),
						array(
							'label' => esc_html__( 'Like Button', 'feed_them_social' ),
							'value' => 'like-button',
						),
                        array(
                            'label' => esc_html__( 'Like Button and Share Button', 'feed_them_social' ),
                            'value' => 'like-button-share',
                        ),
                        array(
                            'label' => esc_html__( 'Like Button with Faces', 'feed_them_social' ),
                            'value' => 'like-button-faces',
                        ),
                        array(
                            'label' => esc_html__( 'Like Button and Share Button with Faces', 'feed_them_social' ),
                            'value' => 'like-button-share-faces',
                        ),
					),
				),

				// Like Button Color.
				array(
					'input_wrap_class' => 'fb_like_btn_color',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Like Button Color', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_like_btn_color',
					'name'             => 'fb_like_btn_color',
					'default_value'    => 'light',
					'options'          => array(
						array(
							'label' => esc_html__( 'Light', 'feed_them_social' ),
							'value' => 'light',
						),
						array(
							'label' => esc_html__( 'Dark', 'feed_them_social' ),
							'value' => 'dark',
						),
					),
				),

				// Placement of Like Button.
				array(
					'input_wrap_class' => 'fb-show-follow-btn-where',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Placement of the Button(s)', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb-show-follow-btn-where',
					'name'             => 'fb-show-follow-btn-where',
					'default_value'    => 'fb-like-top-above-title',
					'options'          => array(
						array(
							'label' => esc_html__( 'Show Top of Feed Above Title', 'feed_them_social' ),
							'value' => 'fb-like-top-above-title',
						),
						array(
							'label' => esc_html__( 'Show Top of Feed Below Title', 'feed_them_social' ),
							'value' => 'fb-like-top-below-title',
						),
						array(
							'label' => esc_html__( 'Show Bottom of Feed', 'feed_them_social' ),
							'value' => 'fb-like-below',
						),
					),
				),
			),
		);

		return $this->all_options['facebook_like_button_box_options'];
	} //END Like Button or Box Options.


	/**
	 * Global Facebook Style Options
	 *
	 * Global Facebook Style Options
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function global_facebook_style_options() {
		$this->all_options['facebook_style_options'] = array(
			'section_attr_key'   => 'facebook_style_options_',
			'section_title'      => esc_html__( 'Facebook Styles', 'feed_them_social' ),
			// 'section_wrap_id' => 'fts-tab-content1',
			'section_wrap_class' => 'fts-tab-content  fts-fb-styles',
			// Form Info.
			'form_wrap_classes'  => 'fb-page-shortcode-form',
			'form_wrap_id'       => 'fts-fb-page-form',
			//Options Wrap Class
			'options_wrap_class'       => 'fts-cpt-additional-options',

			// Token Check // We'll use these option for premium messages in the future.
			'premium_msg_boxes'  => array(
				'album_videos' => array(
					'req_plugin' => 'fts_premium',
					'msg'        => '',
				),
				'reviews'      => array(
					'req_plugin' => 'facebook_reviews',
					'msg'        => '',
				),
			),

			'main_options'       => array(

				// Page Title Tag.
				array(
					'input_wrap_class' => 'fb_title_htag',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Page Title Tag', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'facebook_title_htag',
					'name'             => 'facebook_title_htag',
					'default_value'    => 'h1',
					'options'          => array(
						array(
							'label' => esc_html__( 'h1 (Default)', 'feed_them_social' ),
							'value' => 'h1',
						),
						array(
							'label' => esc_html__( 'h2', 'feed_them_social' ),
							'value' => 'h2',
						),
						array(
							'label' => esc_html__( 'h2', 'feed_them_social' ),
							'value' => 'h3',
						),
						array(
							'label' => esc_html__( 'h2', 'feed_them_social' ),
							'value' => 'h4',
						),
						array(
							'label' => esc_html__( 'h2', 'feed_them_social' ),
							'value' => 'h5',
						),
						array(
							'label' => esc_html__( 'h2', 'feed_them_social' ),
							'value' => 'h6',
						),
					),
				),

				// Page Title Size.
				array(
					'input_wrap_class' => 'fb_title_htag_size',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Page Title Size', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'facebook_title_htag_size',
					'name'             => 'facebook_title_htag_size',
					'placeholder'      => '16px',
					'default_value'    => '',
				),

				// Text after your FB name.
				array(
					'input_wrap_class' => 'fb_hide_shared_by_etc_text',
					'option_type'      => 'select',
					'label'            =>
						sprintf(
							esc_html__( 'Text after your FB name %1$sie* Shared by or New Photo Added etc.%2$s', 'feed-them-social' ),
							'<br/><small>',
							'</small>'
						),
					'type'             => 'text',
					'id'               => 'facebook_hide_shared_by_etc_text',
					'name'             => 'facebook_hide_shared_by_etc_text',
					'default_value'    => 'no',
					'options'          => array(
						array(
							'label' => esc_html__( 'No', 'feed_them_social' ),
							'value' => 'no',
						),
						array(
							'label' => esc_html__( 'Yes', 'feed_them_social' ),
							'value' => 'yes',
						),
					),
				),

				// Hide Images in Posts.
				array(
					'input_wrap_class' => 'fb_hide_images_in_posts',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Hide Images in Posts', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'facebook_hide_images_in_posts',
					'name'             => 'facebook_hide_images_in_posts',
					'default_value'    => 'no',
					'options'          => array(
						array(
							'label' => esc_html__( 'No', 'feed_them_social' ),
							'value' => 'no',
						),
						array(
							'label' => esc_html__( 'Yes', 'feed_them_social' ),
							'value' => 'yes',
						),
					),
				),

				// Max-width for Images & Videos.
				array(
					'input_wrap_class' => 'fb_max_image_width',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Max-width for Images & Videos', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'facebook_max_image_width',
					'name'             => 'facebook_max_image_width',
					'placeholder'      => '500px',
					'default_value'    => '',
				),

				// Feed Header Extra Text Color.
				array(
					'input_wrap_class' => 'fb_header_extra_text_color',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Feed Header Extra Text Color', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_header_extra_text_color',
					'name'             => 'fb_header_extra_text_color',
					'placeholder'      => '#222',
					'default_value'    => '',
				),

				// Feed Description Text Size.
				array(
					'input_wrap_class' => 'fb_text_size',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Feed Description Text Size', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_text_size',
					'name'             => 'fb_text_size',
					'placeholder'      => '12px',
					'default_value'    => '',
				),

				// Feed Text Color.
				array(
					'input_wrap_class' => 'fb_text_color',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Feed Text Color', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_text_color',
					'name'             => 'fb_text_color',
					'placeholder'      => '#222',
					'default_value'    => '',
				),

				// Feed Link Color.
				array(
					'input_wrap_class' => 'fb_link_color',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Feed Link Color', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_link_color',
					'name'             => 'fb_link_color',
					'placeholder'      => '#222',
					'default_value'    => '',
				),

				// Feed Link Color.
				array(
					'input_wrap_class' => 'fb_link_color_hover',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Feed Link Color Hover', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_link_color_hover',
					'name'             => 'fb_link_color_hover',
					'placeholder'      => '#ddd',
					'default_value'    => '',
				),

				// Feed Width.
				array(
					'input_wrap_class' => 'fb_feed_width',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Feed Width', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_feed_width',
					'name'             => 'fb_feed_width',
					'placeholder'      => '500px',
					'default_value'    => '',
				),

				// Feed Margin.
				array(
					'input_wrap_class' => 'fb_feed_margin',
					'option_type'      => 'input',
					'label'            =>
						sprintf(
							esc_html__( 'Feed Margin %1$sTo center feed type auto%2$s', 'feed-them-social' ),
							'<br/><small>',
							'</small>'
						),
					'type'             => 'text',
					'id'               => 'fb_feed_margin',
					'name'             => 'fb_feed_margin',
					'placeholder'      => '10px',
					'default_value'    => '',
				),

				// Feed Padding.
				array(
					'input_wrap_class' => 'fb_feed_padding',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Feed Padding', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_feed_padding',
					'name'             => 'fb_feed_padding',
					'placeholder'      => '10px',
					'default_value'    => '',
				),

                // Post Background Color.
                array(
                    'input_wrap_class' => 'fb_post_background_color',
                    'option_type'      => 'input',
                    'label'            =>
                        sprintf(
                            esc_html__( 'Post Background Color %1$sOnly works when show_media=top%2$s', 'feed-them-social' ),
                            '<br/><small>',
                            '</small>'
                        ),
                    'type'             => 'text',
                    'id'               => 'fb_post_background_color',
                    'name'             => 'fb_post_background_color',
                    'placeholder'      => '',
                    'default_value'    => '',
                ),

				// Feed Background Color.
				array(
					'input_wrap_class' => 'fb_feed_background_color',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Feed Background Color', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_feed_background_color',
					'name'             => 'fb_feed_background_color',
					'placeholder'      => '#ddd',
					'default_value'    => '',
				),

				// Border Bottom Color.
				array(
					'input_wrap_class' => 'fb_border_bottom_color',
					'option_type'      => 'input',
					'label'            => esc_html__( 'Border Bottom Color', 'feed_them_social' ),
					'type'             => 'text',
					'id'               => 'fb_border_bottom_color',
					'name'             => 'fb_border_bottom_color',
					'placeholder'      => '#ddd',
					'default_value'    => '',
				),

			),
		);

		return $this->all_options['facebook_style_options'];
	} //END Global Facebook Style Options.


    /**
     * Facebook Grid Style Options
     *
     * Facebook Grid Style Options
     *
     * @return mixed
     * @since 1.0.0
     */
    public function global_facebook_grid_style_options() {
        $this->all_options['facebook_grid_style_options'] = array(
            'section_attr_key'   => 'facebook_grid_style_options_',
            'section_title'      => esc_html__( 'Grid Format', 'feed_them_social' ),
            // 'section_wrap_id' => 'fts-tab-content1',
            'section_wrap_class' => 'fts-tab-content fts-fb-grid-styles',
            // Form Info.
            'form_wrap_classes'  => 'fb-page-shortcode-form',
            'form_wrap_id'       => 'fts-fb-page-form',
            //Options Wrap Class
            'options_wrap_class'       => 'fts-cpt-additional-options',

            // Token Check // We'll use these option for premium messages in the future.
            'premium_msg_boxes'  => array(
                'album_videos' => array(
                    'req_plugin' => 'fts_premium',
                    'msg'        => '',
                ),
            ),

            'main_options'       => array(

                // Feed Background Color.
                array(
                    'input_wrap_class' => 'fb_feed_background_color',
                    'option_type'      => 'input',
                    'label'            => esc_html__( 'Feed Background Color', 'feed_them_social' ),
                    'type'             => 'text',
                    'id'               => 'fb_grid_posts_background_color',
                    'name'             => 'fb_grid_posts_background_color',
                    'placeholder'      => '#ddd',
                    'default_value'    => '',
                ),

                // Border Bottom Color.
                array(
                    'input_wrap_class' => 'fb_border_bottom_color',
                    'option_type'      => 'input',
                    'label'            => esc_html__( 'Border Bottom Color', 'feed_them_social' ),
                    'type'             => 'text',
                    'id'               => 'fb_grid_border_bottom_color',
                    'name'             => 'fb_grid_border_bottom_color',
                    'placeholder'      => '#ddd',
                    'default_value'    => '',
                ),

            ),
        );

        return $this->all_options['facebook_style_options'];
    } //END Global Facebook Style Options.

    /**
     * Facebook Load More Button Styles & Options
     *
     * Load More Button Styles & Options.
     *
     * @return mixed
     * @since 1.0.0
     */
    public function load_more_options() {
        $this->all_options['facebook_load_more_options'] = array(
            'section_attr_key'   => 'facebook_load_more_options_',
            'section_title'      => esc_html__( 'Load More Button', 'feed_them_social' ),
            'section_wrap_id' => 'fts-tab-content1',
            'section_wrap_class' => 'fts-tab-content',
            // Form Info.
            'form_wrap_classes'  => 'fb-page-shortcode-form',
            'form_wrap_id'       => 'fts-fb-page-form',
            //Options Wrap Class
            'options_wrap_class'       => 'fts-cpt-additional-options',


            'main_options'       => array(

                // Button Color
                array(
                    'input_wrap_class' => 'fb_loadmore_background_color',
                    'option_type'      => 'input',
                    'label'            => esc_html__( 'Button Color', 'feed-them-social' ),
                    'type'             => 'text',
                    'id'               => 'fb_loadmore_background_color',
                    'name'             => 'fb_loadmore_background_color',
                    'placeholder'      => '#ddd',
                    'default_value'    => '',
                ),

                // Text Color
                array(
                    'input_wrap_class' => 'fb_loadmore_text_color',
                    'option_type'      => 'input',
                    'label'            => esc_html__( 'Text Color', 'feed-them-social' ),
                    'type'             => 'text',
                    'id'               => 'fb_loadmore_text_color',
                    'name'             => 'fb_loadmore_text_color',
                    'placeholder'      => '#ddd',
                    'default_value'    => '',
                ),

                // "Load More" Text
                array(
                    'input_wrap_class' => 'fb_load_more_text',
                    'option_type'      => 'input',
                    'label'            => esc_html__( '"Load More" Text', 'feed-them-social' ),
                    'type'             => 'text',
                    'id'               => 'fb_load_more_text',
                    'name'             => 'fb_load_more_text',
                    'placeholder'      => 'Load More',
                    'default_value'    => '',
                ),

                // No More Posts Text
                array(
                    'input_wrap_class' => 'fb_no_more_posts_text',
                    'option_type'      => 'input',
                    'label'            => esc_html__( '"No More Posts" Text', 'feed-them-social' ),
                    'type'             => 'text',
                    'id'               => 'fb_no_more_posts_text',
                    'name'             => 'fb_no_more_posts_text',
                    'placeholder'      => 'No More Posts',
                    'default_value'    => '',
                ),

                // No More Photos Text
                array(
                    'input_wrap_class' => 'fb_no_more_photos_text',
                    'option_type'      => 'input',
                    'label'            => esc_html__( '"No More Photos" Text', 'feed-them-social' ),
                    'type'             => 'text',
                    'id'               => 'fb_no_more_photos_text',
                    'name'             => 'fb_no_more_photos_text',
                    'placeholder'      => 'No More Photos',
                    'default_value'    => '',
                ),

                // No More Videos Text
                array(
                    'input_wrap_class' => 'fb_no_more_videos_text',
                    'option_type'      => 'input',
                    'label'            => esc_html__( '"No More Videos" Text', 'feed-them-social' ),
                    'type'             => 'text',
                    'id'               => 'fb_no_more_videos_text',
                    'name'             => 'fb_no_more_videos_text',
                    'placeholder'      => 'No More Videos',
                    'default_value'    => '',
                ),

                // No More Reviews Text
                array(
                    'input_wrap_class' => 'fb_no_more_reviews_text',
                    'option_type'      => 'input',
                    'label'            => esc_html__( '"No More Reviews" Text', 'feed-them-social' ),
                    'type'             => 'text',
                    'id'               => 'fb_no_more_reviews_text',
                    'name'             => 'fb_no_more_reviews_text',
                    'placeholder'      => 'No More Reviews',
                    'default_value'    => '',
                ),
            ),
        );

        return $this->all_options['facebook_load_more_options'];
    } //END Twitter Grid Styles

	/**
	 * Facebook Error Messages
	 *
	 * Facebook Error Messages
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function error_messages_options() {
		$this->all_options['facebook_error_messages_options'] = array(
			'section_attr_key'   => 'facebook_error_messages_options_',
			'section_title'      => esc_html__( 'Facebook Error Messages', 'feed_them_social' ),
			// 'section_wrap_id' => 'fts-tab-content1',
			'section_wrap_class' => 'fts-tab-content',
			// Form Info.
			'form_wrap_classes'  => 'fb-page-shortcode-form',
			'form_wrap_id'       => 'fts-fb-page-form',
			//Options Wrap Class
			'options_wrap_class'       => 'fts-cpt-additional-options',

			// Token Check // We'll use these option for premium messages in the future.
			'premium_msg_boxes'  => array(
				'album_videos' => array(
					'req_plugin' => 'fts_premium',
					'msg'        => '',
				),
				'reviews'      => array(
					'req_plugin' => 'facebook_reviews',
					'msg'        => '',
				),
			),

			'main_options'       => array(

				// Hide Error Handler Message.
				array(
					'input_wrap_class' => 'fb_hide_error_handler_message',
					'option_type'      => 'select',
					'label'            => esc_html__( 'Hide Error Handler Message', 'feed_them_social' ),
                    'instructional-text' => sprintf(
                        esc_html( 'If your feed is displaying a notice or error message at times you can utilize this option to hide them from displaying. Make sure and delete the %1$sCache%2$s to see the change. %3$sNOTE: This does not hide any php warnings that may come up. To remove those go to the wp-config.php file on root of your WordPress install and set the wp_debug option to FALSE. Having that option set to TRUE is really only necessary when developing.%4$s', 'feed-them-social' ),
                        '<a href="' . esc_url( 'admin.php?page=feed-them-settings-page&tab=global_options' ) . '">',
                        '</a>',
                        '<p><small>',
                        '</small></p>'
                    ),
					'type'             => 'text',
					'id'               => 'fb_hide_error_handler_message',
					'name'             => 'fb_hide_error_handler_message',
					'default_value'    => 'no',
					'options'          => array(
						array(
							'label' => esc_html__( 'No', 'feed_them_social' ),
							'value' => 'no',
						),
						array(
							'label' => esc_html__( 'Yes', 'feed_them_social' ),
							'value' => 'yes',
						),
					),
				),
			),
		);

		return $this->all_options['facebook_error_messages_options'];
	} //END Like Button or Box Options.
}