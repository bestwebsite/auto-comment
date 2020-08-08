<?php


class CommentIQ_Shortcode_bestwebsiteCommentShortcode implements CommentIQ_Shortcode_ShortcodeInterface
{
    /**
     * The bestwebsite comment generator.
     *
     * @var CommentIQ_Generator_bestwebsiteCommentGenerator
     */
    private $bestwebsite_comment_generator;

    /**
     * The post types that can use the bestwebsite comment shortcode.
     *
     * @var array
     */
    private $post_types;

    /**
     * Constructor.
     *
     * @param CommentIQ_Generator_bestwebsiteCommentGenerator $bestwebsite_comment_generator
     * @param array                                        $post_types
     */
    public function __construct(CommentIQ_Generator_bestwebsiteCommentGenerator $bestwebsite_comment_generator, array $post_types = array())
    {
        $this->bestwebsite_comment_generator = $bestwebsite_comment_generator;
        $this->post_types = $post_types;
    }

    /**
     * {@inheritdoc}
     */
    public static function get_name()
    {
        return 'bestwebsite-comment';
    }

    /**
     * {@inheritdoc}
     */
    public function generate_output($attributes, $content = '')
    {
        if (!is_main_query()) {
            return '';
        }

        $post = get_post();

        if (!$post instanceof WP_Post || !in_array($post->post_type, $this->post_types)) {
            return '';
        }

        return $this->bestwebsite_comment_generator->generate($post);
    }
}
