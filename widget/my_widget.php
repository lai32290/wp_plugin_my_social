<?php

class My_Widget extends WP_Widget
{
    public function __construct()
    {
//        parent::__construct('my_widget', "Visite minhas redes sociais");
        parent::__construct('my_widget', "This is my first widget");
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        $urlFacebook = $instance['urlFacebook'];
        $urlYoutube = $instance['urlYoutube'];
        $urlInstagram = $instance['urlInstagram'];
        $urlTwitter = $instance['urlTwitter'];

        echo $args['before_widget'];

        if ($title) {
            echo $args['before_widget'] . $title . $args['after_widget'];

            echo "<a href='$urlFacebook' target='_blank'>
                <img src='" . plugin_dir_url(__FILE__) . "../images/Facebook.png' alt='Facebook'></a>";

            echo "<a href='$urlInstagram' target='_blank'>
                <img src='" . plugin_dir_url(__FILE__) . "../images/Instagram.png' alt='Instagram'></a>";

            echo "<a href='$urlTwitter' target='_blank'>
                <img src='" . plugin_dir_url(__FILE__) . "../images/Twitter.png' alt='Twitter'></a>";

            echo "<a href='$urlYoutube' target='_blank'>
                <img src='" . plugin_dir_url(__FILE__) . "../images/Youtube.png' alt='Youtube'></a>";
        }

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = wp_strip_all_tags($new_instance['title']);
        $instance['urlFacebook'] = wp_strip_all_tags($new_instance['urlFacebook']);
        $instance['urlYoutube'] = wp_strip_all_tags($new_instance['urlYoutube']);
        $instance['urlInstagram'] = wp_strip_all_tags($new_instance['urlInstagram']);
        $instance['urlTwitter'] = wp_strip_all_tags($new_instance['urlTwitter']);

        return $instance;
    }

    public function form($instance)
    {
        if(!array_key_exists('title', $instance)) $instance['title'] = '';
        if(!array_key_exists('urlFacebook', $instance)) $instance['urlFacebook'] = '';
        if(!array_key_exists('urlYoutube', $instance)) $instance['urlYoutube'] = '';
        if(!array_key_exists('urlInstagram', $instance)) $instance['urlInstagram'] = '';
        if(!array_key_exists('urlTwitter', $instance)) $instance['urlTwitter'] = '';

        $title = esc_attr($instance['title']);
        $urlFacebook = esc_attr($instance['urlFacebook']);
        $urlYoutube = esc_attr($instance['urlYoutube']);
        $urlInstagram = esc_attr($instance['urlInstagram']);
        $urlTwitter = esc_attr($instance['urlTwitter']);
        ?>
<!--        <p>-->
<!--            <label for="--><?php //echo $this->get_field_id('title'); ?><!--">--><?php //echo _e('Titulo') ?><!--</label>-->
<!--            <input type="text" class="widefat" id="--><?php //echo $this->get_field_id('title'); ?><!--"-->
<!--                name="--><?php //echo $this->get_field_name('title'); ?><!--" value="--><?php //echo $title; ?><!--">-->
<!--        </p>-->
<!--        <p>-->
<!--            <label for="--><?php //echo $this->get_field_id('urlFacebook'); ?><!--">--><?php //echo _e('Facebook') ?><!--</label>-->
<!--            <input type="text" class="widefat" id="--><?php //echo $this->get_field_id('urlFacebook'); ?><!--"-->
<!--                name="--><?php //echo $this->get_field_name('urlFacebook'); ?><!--" value="--><?php //echo $urlFacebook; ?><!--">-->
<!--        </p>-->
<!--        <p>-->
<!--            <label for="--><?php //echo $this->get_field_id('urlTwitter'); ?><!--">--><?php //echo _e('Twitter') ?><!--</label>-->
<!--            <input type="text" class="widefat" id="--><?php //echo $this->get_field_id('urlTwitter'); ?><!--"-->
<!--                name="--><?php //echo $this->get_field_name('urlTwitter'); ?><!--" value="--><?php //echo $urlTwitter; ?><!--">-->
<!--        </p>-->
<!--        <p>-->
<!--            <label for="--><?php //echo $this->get_field_id('urlYoutube'); ?><!--">--><?php //echo _e('Youtube') ?><!--</label>-->
<!--            <input type="text" class="widefat" id="--><?php //echo $this->get_field_id('urlYoutube'); ?><!--"-->
<!--                name="--><?php //echo $this->get_field_name('urlYoutube'); ?><!--" value="--><?php //echo $urlYoutube; ?><!--">-->
<!--        </p>-->
<!--        <p>-->
<!--            <label for="--><?php //echo $this->get_field_id('urlInstagram'); ?><!--">--><?php //echo _e('Instagram') ?><!--</label>-->
<!--            <input type="text" class="widefat" id="--><?php //echo $this->get_field_id('urlInstagram'); ?><!--"-->
<!--                name="--><?php //echo $this->get_field_name('urlInstagram'); ?><!--" value="--><?php //echo $urlInstagram; ?><!--">-->
<!--        </p>-->
        <p>
            <label>Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>">
        </p>
    <?php
    }
}