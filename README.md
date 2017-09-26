# My Social Plugin

This is a WordPress plugin sample to creating a WidGet.

### Don't use it!!

WordPress already has a simple API to let you create your Widget.

To create a Widget is necessary create a class and extend `WP_Widget`, like what's did in `widget/my_widget.php`.

After extended `WP_Widget` is necessary implement constructor, passing an alias for your plugin and a description.
 
```php
<?php
class Your_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('your_widget', "This is my first widget");
    }
}
```

![Widget Preview](readme/widget_preview.png)

To implement the configuration form like this is necessary implement the `form` function:
 
```php
<?php
class Your_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('your_widget', "This is my first widget");
    }
    
    public function form($instance)
    {
    ?>
        <p>
            <label>Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>">
        </p>
    <?php
    }
}
```
This code will result like this: 

![Widget Form](readme/widget_form.png)

Since we have a form, is necessary save it as well, so is necessary to implement `update` function, that's also a `WP_Widget`'s function:

```php
<?php
class Your_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('your_widget', "This is my first widget");
    }
    
    public function form($instance)
    {
    ?>
        <p>
            <label>Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>">
        </p>
    <?php
    }
    
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = wp_strip_all_tags($new_instance['title']);
        return $instance;
    }
}
```

Is very important to use `wp_strip_all_tags` to remove all the HTML tags in the content, depends the context of you widget.

And finally, is necessary implement the `widget` function to show the widget on the front page:

```php
<?php
class Your_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('your_widget', "This is my first widget");
    }
    
    public function form($instance)
    {
    ?>
        <p>
            <label>Title</label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>">
        </p>
    <?php
    }
    
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = wp_strip_all_tags($new_instance['title']);
        return $instance;
    }
    
    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];

        if ($title) {
            echo $args['before_widget'] . $title . $args['after_widget'];
        }

        echo $args['after_widget'];
    }
}
```